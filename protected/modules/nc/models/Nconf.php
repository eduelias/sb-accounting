<?php

/**
 * This is the model class for table "nconf".
 *
 * The followings are the available columns in table 'nconf':
 * @property integer $idnconf
 * @property integer $idsetor
 * @property integer $iduser_cad
 * @property integer $iduser_direcionado
 * @property integer $idnconf_tipo
 * @property string $publica
 * @property string $relevancia
 * @property string $enviou_email
 *
 * The followings are the available model relations:
 * @property Comentario[] $comentarios
 * @property Setor $idsetor0
 * @property User $iduserCad
 * @property User $iduserDirecionado
 * @property TipoNaoConformidade $idnconfTipo
 * @property Status[] $statuses
 */
class Nconf extends SActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Nconf the static model class
	 */
		
	private static $_list;
	
	public $idstatus = 0;
	
	public $cssRelevancia = 'flash-success';
	
	public $idnconf_string = '';
	
	public $previsao;
	
	public $relevancia_desc;
	
	public $data_user;
	
	public $status;
	
	public $coment_count;
	
	public $old_iduser_cad;
	
	public $old_idsetor;
	
	public $descricao;
	
	public $last_com_info;
	
	public $dt_inicio;
	
	public $dt_fim;
	
	public $lida = false;
	
	public $nc_tipo_descricao;

	
	private $tempo_relevancia = array(
		'0'=>'960000',
		'1'=>'480000',
		'2'=>'120000',
		'3'=>'080000',
		'4'=>'020000',
		'5'=>'003000'
	);
	
	public $resumo = '';
	
	public static function model($className=__CLASS__)
	{ 
		return parent::model($className);
	}
	
	public static function getPeriodos()
	{
		return array(
			date('Y-m-d')=>'Hoje',
			date('Y-m')=>'Este Mês',
			date('Y')=>'Este Ano',			
		);
	}
	
	public static function getRelevanciaList()
	{
		return array(
			0=>'Irrelevante',
			1=>'Normal',
			2=>'Relevante',
			3=>'Muito Relevante',
			4=>'Urgente'
		);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nconf';
	}
	
	public static function getList()
	{
		if (self::$_list === null) {
			$a = self::model()->findAll();
			
			foreach ($a as $k=>$v) {
				self::$_list[$v->idnconf] = $v->descricao;
			}
		}
		
		return self::$_list;
	}
	
	private function getIdStatus()
	{
		$sql = 'select idstatus,data from rel_status_nconf where idnconf = '.$this->idnconf.' order by data DESC limit 1';
		$conn = Yii::app()->db;
		$command = $conn->createCommand($sql);
		unset($res);
		$res = $command->queryRow();
		
		if (!is_array($res))
			$res = array('idstatus'=>'1','data'=>'2011-01-01 00:00:00');
		
		return $res;
	}
	
	public function getStatus()
	{
		$id = array('idstatus'=>'1','data'=>'2011-01-01 00:00:00');
		if ($this->idnconf !== null)
			$id = $this->getIdStatus();
		$st = Status::model()->findByPk($id['idstatus']);

		return $st->descricao;
	}
	
	protected function salvaPrevisao()
	{
		$np = new NconfPrevisao;
		
		$np->data_previsao_min = $this->tempo_relevancia[1+$this->relevancia];
		
		$np->data_previsao_max = $this->tempo_relevancia[$this->relevancia];
		
		$np->idnconf = $this->idnconf;
		
		$np->iduser_inseriu = Yii::app()->user->numid;
		
		if (!$np->validate()) {
			$this->addError('relevancia','Algum erro ocorreu ao gerar previsão.');
			return false;
		}
		
		return $np->save(); 
	}
	
	protected function trataModelo()
	{
		if (((!isset($this->idnconf_tipo)) or ($this->idnconf_tipo == '0')))
		{			
			$tnconf = new TipoNaoConformidade;
			
			$tnconf->descricao = $this->idnconf_string;
			
			if ($tnconf->save())
				$this->idnconf_tipo = $tnconf->idnconf;
			else {
				$this->addError('idnconf_tipo','Erro ao salvar o modelo de Não conformidade.');				
				return false;
			}
			
			return true;
		} else {
			return true;
		}
	}
	
	protected function beforeSave()
	{
		parent::beforeSave();
		
		$old = Nconf::model()->findByPk($this->idnconf);
		
		if (!$this->isNewRecord){
			
			if ($this->iduser_direcionado != $old->iduser_direcionado) $this->addComent('[Automatico] Responsável alterado para: '.$this->alvo->nome);
			
			if ($this->idsetor != $old->idsetor) $this->addComent('[Automatico] Setor modificado para: '.$this->setor->descricao);
		
		}
		
		$ret = true;
		//tratando a caixa 'publica'
		$this->publica = ($this->publica)?'S':'N';
		
		//tratando o autocomplete da nc
		if(!$this->trataModelo()) {
			$this->addError('idnconf_tipo','Erro ao salvar o modelo de Não conformidade.');
			return false;
		}			
		
		//tratando da previsão				
		return $ret;	
	}

	public function changeStatus($idstatus)
	{
		$sql = 'insert into rel_status_nconf (iduser,idstatus,idnconf) values ('.Yii::app()->user->numid.','.$idstatus.','.$this->idnconf.')';
		$conn = Yii::app()->db;
		$command = $conn->createCommand($sql);
		
		$st = Status::model()->findByPk($idstatus);
		
		if (($st->envia_historico) and $this->historico == 'N') {
			$this->historico = 'S';
			$this->save(false);
		} else if ($this->historico == 'S'){
			$this->historico = 'N';
			$this->save(false);
		}

		if ($command->execute()) {
			if ($st->envia_email) $this->enviaEmail('[NC#'.str_pad($this->idnconf, 4,'0',STR_PAD_LEFT).'] Status alterado para: '.$st->descricao,$this->getResumo());
			return true;
		}
		return false;
	}
	
	public function addComent($comentario){
		
		$com = new Comentario;
		
		$com->iduser = Yii::app()->user->id;
		
		$com->idnconf = $this->idnconf;
		
		$com->comentario = $comentario;
		
		$ret = $com->save(false);
		
		if ($ret)
			$this->getComentCount();
		
		return $ret;
	}
	
	
	public function getResumo()
	{
		if ($this->resumo == '') {
			$s = '';
			$s .= 'De: '.$this->autor->nome."\r\nPara:".$this->alvo->nome."\r\n";
			$s .= $this->nc->descricao."\r\n";
			$s .= $this->previsao."\r\n";
			//$s .= "Status atual: ".$this->status."\r\n";
			$s .= (!$this->publica || $this->publica == 'N')?'Esta NC é PRIVADA':'Esta NC foi colocada como pública';
			
			$this->resumo = $s;
		}
		
		return $this->resumo;
	}
	
	protected function enviaEmailCriacao(){
		
		$headers="From: auto@solbrilhante.ind.br\r\nReply-To: {$this->autor->email}";
		mail($this->getEmails(),'[NC SB] '.CHtml::encode($this->setor->descricao),$this->getResumo()."\r\n",$headers);

		return true; 
	}
	
	protected function enviaEmail($assunto = 'SB', $corpo = 'SB')
	{
		$assunto = ($assunto == 'SB')?'[NCSB]'.Yii::app()->user->name.' enviou uma NC.':$assunto;
		$corpo = ($corpo == 'SB')?'[NCSB]'.Yii::app()->user->name.' enviou uma NC.':$corpo;
		
		$headers="From: auto@solbrilhante.ind.br\r\nReply-To: {$this->autor->email}";
		mail($this->getEmails(),CHtml::encode($assunto),$corpo,$headers);

		return true; 
	}
	
	public function getEmails(){
		//$a = array('nc@solbrilhante.ind.br;'.$this->alvo->email);
		$n = Setor::model()->findByPk($this->idsetor);
		if ($this->publica) {
			if (is_array($n->users)){
				$a = array('nc@solbrilhante.ind.br');
				foreach ($n->users as $k=>$v){
					if ($v->email != $this->alvo->email)
						$a[] = $v->email;
				}
				return implode(';',$a);
			}
		}
		return $this->publica.'nc@solbrilhante.ind.br;'.$this->alvo->email;
	}
	
	protected function afterSave()
	{
		if (!$this->salvaPrevisao()) {
			$this->addError('relevancia','Erro ao salvar previsao.');
			return false;
		}
		
		if ($this->isNewRecord){
			if (!$this->changeStatus('1')) {
				$this->addError('relevancia','Erro ao criar Status.');
				return false;
			}
			if (!$this->enviaEmailCriacao()) {
				$this->addError('relevancia','Erro ao enviar email ao alvo.');
				return false;
			}
		}
		
		return parent::afterSave();
	}
	
	private function trataPrevisao()
	{
		$critp = new CDBCriteria;
		$critp->select = 'ADDTIME(data_inserido, data_previsao_min) as data_previsao_min';
		$critp->condition = "idnconf = :id";
		$critp->limit = 1;
		$critp->order = 'data_inserido DESC';
        $critp->params = array(":id"=>"$this->idnconf");
		$prev = NconfPrevisao::model()->find($critp);
		
		$this->previsao = (isset($prev->data_previsao_min))?$prev->data_previsao_min:'24:00:00';
		$this->previsao = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->previsao, 'yyyy-MM-dd hh:mm:ss'));
	}	
	
	private function trataCssRelevancia()
	{
		if ($this->relevancia > 3)
			$this->cssRelevancia = 'flash-error';
		 else if ($this->relevancia > 1)
		 	$this->cssRelevancia = 'flash-notice'; 
	}

	protected function getComentCount()
	{
		if (!isset($this->coment_count))
		{
			$crit = new CDbCriteria();
			$crit->select = 'Count(*) as idcomentario';
			$crit->group = 'idnconf';
			$crit->condition = 'idnconf='.$this->idnconf;
			
			$res = Comentario::model()->find($crit);
			
			$this->coment_count = (is_object($res))?$res->idcomentario:'0';
		}
		
		return $this->coment_count;
	}
	
	public function getDescricao()
	{
		$c = new CDbCriteria;
		
		$c->addCondition('idnconf = '.$this->idnconf);
		
		$c->addCondition('iduser = '.$this->iduser_cad);
		
		$c->order = 'data ASC';
		
		$c->limit = 1;
		
		$com = Comentario::model()->find($c);
		
		return $com;
	}
	
	public function setNlida(){
		
		if ($this->idnconf == null)
			return false;
		
		$sql = 'delete from nconf_user_leu where idnconf ='.$this->idnconf;
		
		$con = Yii::app()->db;
		
		$com = $con->createCommand($sql);
		
		$a = $com->execute();
		
		$this->setLeu();
		
		return $a;
	}
	
	public function setLeu(){
		
		if (!$this->getLida()) {
			
			$lida = new NconfUserLeu;
			
			$lida->idnconf = $this->idnconf;
			
			$lida->iduser = Yii::app()->user->id;
			
			$lida->data_lido = date('Y-m-d H:i:s');
			
			return $lida->save();
			
		}
		
	}
	
	public function getLida(){
		
		if ($this->idnconf == null)
			return false;
		 
		$c = new CDbCriteria;
		
		$c->addCondition('iduser ='.Yii::app()->user->id);
		
		$c->addCondition('idnconf ='.$this->idnconf);
		
		$lida = NconfUserLeu::model()->find($c);
		
		return ($lida != null);
		
	}
	
	protected function getComentColumn()
	{
		$com = $this->getDescricao();
		
		$s = '<div style="font-wheight:normal">';
		$s .= '[<b>'.$this->getComentCount().'</b>] Comentário(s)<br>';
		if ($this->getComentCount() >= 1) {	
			$s .= '<b>Ultimo: </b>'.$this->comentarios[$this->getComentCount()-1]->autor->nome.'<br>';
			$s .= '<b>em </b>'.$this->comentarios[$this->getComentCount()-1]->data;
		}
		//else $s .= 'Não há comentários nesta NC.';
		
		$s .= '</div>';
		
		
		return $s;
	}
	
	protected function afterFind()
	{
		$this->trataCssRelevancia();
		
		$this->getComentCount();
		
		$this->last_com_info = $this->getComentColumn();
		
		$this->publica = ($this->publica === 'S')?true:false;
		
		$this->idstatus = $this->getIdStatus();
		
		$this->status = $this->getStatus();
		
		$com_desc = $this->getDescricao();
		
		$this->descricao = 'Não há descrição associada.';
		
		if ($this->getComentCount() != 0 and is_object($com_desc)) { 
			$this->descricao = $com_desc->comentario;
		}
		
		$this->trataPrevisao();
		
		$aux = $this->getRelevanciaList();
		
		$this->relevancia_desc = $aux[$this->relevancia];
		
		$this->status = $this->getStatus(); 
		
		$this->coment_count = $this->getComentCount();
		
		$this->lida = $this->getLida();
		
		$this->dt_inicio = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->dt_inicio, 'yyyy-MM-dd'),'medium',null);
		
		$this->dt_fim = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->dt_fim, 'yyyy-MM-dd'),'medium',null);
		
		$this->nc_tipo_descricao = 'Eduardo'; 
		
		//$this->setLeu();
		
		return parent::afterFind();
		
	}
	
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idsetor, iduser_cad, iduser_direcionado, idnconf_tipo, idnconf_string', 'required'),
			array('idsetor, iduser_cad, iduser_direcionado, idnconf_tipo', 'numerical', 'integerOnly'=>true),
			array('publica, relevancia, enviou_email', 'length', 'max'=>1),
			array('idnconf_string','length','max'=>255),
			array('data_cadastro,dt_inicio,dt_fim,nc_tipo_descricao, status','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idnconf, idsetor, iduser_cad, nc_tipo_descricao, iduser_direcionado, idnconf_tipo, publica, relevancia, enviou_email, data_cadastro, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'comentarios' => array(self::HAS_MANY, 'Comentario', 'idnconf'),
			'previsao' => array(self::HAS_MANY, 'NconfPrevisao', 'idnconf'),
			'setor' => array(self::BELONGS_TO, 'Setor', 'idsetor'),
			'Setor' => array(self::BELONGS_TO, 'Setor', 'idsetor'),
			'autor' => array(self::BELONGS_TO, 'User', 'iduser_cad'),
			'alvo' => array(self::BELONGS_TO, 'User', 'iduser_direcionado'),
			'nc' => array(self::BELONGS_TO, 'TipoNaoConformidade', 'idnconf_tipo'),
			//'status' => array(self::MANY_MANY, 'Status', 'rel_status_nconf(idnconf, idstatus)','order'=>'data DESC', 'limit'=>'1'),
			'lido' => array(self::MANY_MANY, 'User', 'nconf_user_leu(idnconf, iduser)'),
			'sts' => array(self::HAS_MANY, 'RelStatusNconf', 'idnconf')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idnconf' => 'Idnconf',
			'idsetor' => 'Setor',
			'iduser_cad' => 'Autor',
			'iduser_direcionado' => 'Responsável',
			'idnconf_tipo' => 'Não Conformidade',
			'publica' => 'Público',
			'last_com_info'=> 'Atividade',
			'relevancia' => 'Relevância',
			'enviou_email' => 'Enviou Email',
			'previsao'=>'Previsão Mínima',
			'idnconf_string'=>'Não Conformidade',
			'status'=>'Status Atual'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function cxEntrada()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->condition = '((iduser_direcionado = '.Yii::app()->user->id.') and (historico = "N"))';
		
		
		return $this->search($criteria);

	}
	
	public function cxSaida(){
			
		$criteria=new CDbCriteria;
		
		$criteria->condition = '((iduser_cad = '.Yii::app()->user->id.') and (historico = "N"))';
		
		return $this->search($criteria);
	}
	
	public function cxPublica(){
			
		$criteria=new CDbCriteria;
		
		if (!User::isGerente()) $criteria->addCondition('publica = "S"');
		
		$criteria->addCondition('historico = "N" and iduser_cad <> '.Yii::app()->user->id.' and iduser_direcionado <> '.Yii::app()->user->id);
		
		return $this->search($criteria);
	}
	
	public function cxHistorico(){
		
		$criteria=new CDbCriteria;
		
		if (!User::isGerente()) $criteria->addCondition('iduser_cad = '.Yii::app()->user->id.' or iduser_direcionado = '.Yii::app()->user->id);
		
		$criteria->addCondition('historico = "S"');
		
		//$criteria->condition = '((iduser_cad = '.Yii::app()->user->id.' or iduser_direcionado = '.Yii::app()->user->id.') and (historico = "S"))';
		
		return $this->search($criteria);
	}

	public function search($criteria){
		
		$criteria->compare('idnconf',$this->idnconf);
		$criteria->compare('idsetor',$this->idsetor);
		$criteria->compare('iduser_cad',$this->iduser_cad,true);
		$criteria->compare('iduser_direcionado',$this->iduser_direcionado,true);
		$criteria->compare('nc.descricao',$this->nc_tipo_descricao,true);
		//$criteria->compare('status.descricao',$this->status,true);
		$criteria->compare('publica',$this->publica,true);
		$criteria->compare('relevancia',$this->relevancia,true);
		$criteria->compare('enviou_email',$this->enviou_email,true);
		
		if((isset($this->dt_inicio) && trim($this->dt_fim) != "") && (isset($this->dt_inicio) && trim($this->dt_fim) != "")) {
			$criteria->addBetweenCondition('data_cadastro', ''.date('Y-m-d', CDateTimeParser::parse($this->dt_inicio, Yii::app()->locale->dateFormat)).'', ''.date('Y-m-d', CDateTimeParser::parse($this->dt_fim, Yii::app()->locale->dateFormat)).'');
		}
		
		//$criteria->compare('data_cadastro',$this->data_cadastro,true);
		$criteria->compare('historico',$this->historico,true);
		//$criteria->order = 'relevancia DESC';
		
		$criteria->with = array('nc');
		
		$criteria->together = true;

		return new CActiveDataProvider(get_class($this), array(
			'sort'=>array(
				'defaultOrder'=>'relevancia DESC,data_cadastro DESC',
			),
			'pagination'=>array(
				//
				// please check how we get the
				// the pageSize from user's state
				'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
			),
			'criteria'=>$criteria,
		));
	}
}