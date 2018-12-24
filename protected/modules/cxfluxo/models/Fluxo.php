Eu <?php

Yii::import('application.modules.cxfluxo.models._base.BaseFluxo');

class Fluxo extends BaseFluxo {

	public $f_valor_fatura;

	public $f_valor_pagamento;

	public $f_valor_juros;

	public $f_valor_multa;

	public $file;

	public $curr_criteria;
	
	public $df_inicial;
	
	public $df_final;
	
	public $dv_inicial;
	
	public $dv_final;
	
	public $doc;

	public static function model($className = __CLASS__) {

		return parent::model($className);
	}

	public function attributeLabels() {

		return array(
				'idfluxo' => Yii::t('app', 'ID'),
				'iduser' => Yii::t('app', 'Usuario'),
				'idempresa_origem' => Yii::t('app', 'Empresa Pagadora'),
				'idempresa_destino' => Yii::t('app', 'Empresa Recebedora'),
				'idconta' => Yii::t('app', 'Conta'),
				'idccusto' => Yii::t('app', 'Centro de custo'),
				'data_sistema' => Yii::t('app', 'Data Sistema'),
				'idformaspg' => Yii::t('app', 'Forma de Pagamento'),
				'data_faturamento' => Yii::t('app', 'Data Nota Fiscal'),
				'data_vencimento' => Yii::t('app', 'Data Vencimento'),
				'data_pagamento' => Yii::t('app', 'Data Pgto'),
				'data_cancelado' => Yii::t('app', 'Data Cancelamento'),
				'doc_numero' => Yii::t('app', 'Identificação do documento'),
				'valor_fatura' => Yii::t('app', 'Valor Nota Fiscal'),
				'valor_pagamento' => Yii::t('app', 'Valor Pgto'),
				'valor_multa' => Yii::t('app', 'Valor Multa'),
				'valor_juros' => Yii::t('app', 'Valor Juros'),
				'observacao' => Yii::t('app', 'Observacao'),
				'id_sisfat' => Yii::t('app', 'Id Sisfat'),
				'tipo_sisfat' => Yii::t('app', 'Tipo Sisfat'),
				'filename' => Yii::t('app', 'Filename'),
				'file' => 'Arquivo',
				'nf' => 'Número da Nota Fiscal',
				'formaspg' => "Forma de Pagamento"
		);
	}

	public function relations() {

		return array(
				'iduser0' => array(
					self::BELONGS_TO, 'User', 'iduser'
				),
				'iduserPgto' => array(
					self::BELONGS_TO, 'User', 'iduser_pgto'
				),
				'idIdformaspg' => array(
					self::BELONGS_TO, 'Formaspg', 'idformaspg'
				),
				'idempresaOrigem' => array(
					self::BELONGS_TO, 'Empresa', 'idempresa_origem'
				),
				'idccusto0' => array(
					self::BELONGS_TO, 'Ccusto', 'idccusto'
				),
				'idconta0' => array(
					self::BELONGS_TO, 'Conta', 'idconta'
				),
				'idempresaDestino' => array(
					self::BELONGS_TO, 'Empresa', 'idempresa_destino'
				),
		);
	}

	public function check_empresa_igual($attribute, $params) {

		if ($this->idempresa_origem == $this->idempresa_destino) $this->addError(
				$attribute,
				'Empresas de origem e destino não podem ser iguais.');
		if (!is_object($this->idempresaOrigem)) $this->addError($attribute,
				'Selecione uma Empresa');
		else if ($this->idempresaOrigem->dogrupo
				or $this->idempresaDestino->dogrupo) {

		} else $this->addError($attribute,
				'Pelo menos uma das empresas precisa ser do grupo.');
	}

	public function check_conta_empresa($attribute, $params) {

		if (!$this->idempresaDestino->recebeConta($this->idconta)) $this->addError(
				$attribute, 'Empresa não recebe este tipo de conta.');
	}

	public function check_empresa_conta($attribute, $params) {

		if (!is_object($this->idconta0)
				or !$this->idconta0->recebeConta($this->idempresa_destino)) $this->addError(
				$attribute,
				'Esta conta não é recebida pela empresa de destino.');
	}

	public function check_documento($attribute, $params) {

		if (is_object($this->idIdformaspg) and $this->idIdformaspg->detalha
				and !$this->observacao) $this->addError($attribute,
				'Esta forma de pagamento exige uma identificação.');
	}

	public function rules() {

		return CMap::mergeArray(parent::rules(),
				array(
						//array('idempresa_destino,idempresa_origem','check_empresa_igual','on'=>'Create'),
						//array('idempresa_destino','check_conta_empresa','on'=>'Update'),
						//array('idconta','check_empresa_conta'),
						array(
							'file', 'unsafe'
						),
						array('valor_fatura, valor_pagamento', 'match', 'pattern'=>'/^[ ]?[-]?[ ]?[0-9]*[.,]{0,1}[0-9]{0,2}[ ]?/'),
						array(
							'doc_numero', 'required'
						),
						array(
							'idformaspg,observacao', 'check_documento'
						),
						array('data_faturamento,data_pagamento,data_vencimento','date','format'=>'dd/MM/yyyy'),
						array(
								'file',
								'file',
								'types' => 'doc,docx,xls,xlsx,xml,pdf,jpg,png',
								'on' => 'Create'
						),
						array(
							'file', 'required', 'on' => 'Create'
						),
						array(
								'valor_pagamento,data_pagamento,idformaspg',
								'required',
								'on' => 'baixa'
						),
						array(
							'df_inicial,df_final,dv_inicial,dv_final,f_valor_fatura,f_valor_pagamento,f_valor_juros,f_valor_multa',
							'safe',
							'on'=>'search'
						)
				));
	}

	protected function afterFind() {

		$this->f_valor_fatura = Yii::app()->NumberFormatter->formatCurrency($this->valor_fatura, 'BRL');
		
		$this->f_valor_pagamento = Yii::app()->NumberFormatter->formatCurrency($this->valor_pagamento, 'BRL');
		
		$this->f_valor_juros = Yii::app()->NumberFormatter->formatCurrency($this->valor_juros, 'BRL');
		
		$this->df_inicial = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->df_inicial, 'yyyy-MM-dd'),'medium',null);
		
		$this->df_final = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->df_final, 'yyyy-MM-dd'),'medium',null);
		
		$this->dv_inicial = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->dv_inicial, 'yyyy-MM-dd'),'medium',null);
		
		$this->dv_final = Yii::app()->dateFormatter->formatDateTime(CDateTimeParser::parse($this->dv_final, 'yyyy-MM-dd'),'medium',null);
		
		//$this->doc = substr($this->doc_numero,0,20);

		return parent::afterFind();
	}

	protected function moedaToSql($valor){
		
		//$a = Yii::app()->numberFormatter->format('?9.99', $valor);
		$a = str_replace('.', '', $valor);
		$a =  str_replace(',', '.', $a);
		
		return $a;
	}
	
	protected function beforeFind(){
		
		$this->valor_fatura =  $this->moedaToSql($this->valor_fatura);
		$this->valor_pagamento = $this->moedaToSql($this->valor_pagamento);
		$this->valor_multa = $this->moedaToSql($this->valor_multa);
		$this->valor_juros = $this->moedaToSql($this->valor_juros);
		
		return parent::beforeFind();
	}
	
	protected function beforeSave() {

		if ($this->data_pagamento === null) {
			$this->iduser_pgto = null;
		}
		
		$this->valor_fatura = str_replace('.', '', $this->valor_fatura);
		$this->valor_fatura = str_replace(',', '.', $this->valor_fatura);
		
		$this->valor_pagamento = str_replace('.', '', $this->valor_pagamento);
		$this->valor_pagamento = str_replace(',', '.', $this->valor_pagamento);
		
		$this->valor_juros = str_replace('.', '', $this->valor_juros);
		$this->valor_juros = str_replace(',', '.', $this->valor_juros);
		
		$this->valor_multa = str_replace('.', '', $this->valor_multa);
		$this->valor_multa = str_replace(',', '.', $this->valor_multa);

		return parent::beforeSave();
	}

	public function historico() {

		$c = $this->getSearchCriteria();

		$c->addCondition("((valor_pagamento > valor_fatura * 0.95) and (valor_pagamento < valor_fatura * 1.05))");

		$c->addCondition("valor_pagamento is not null", 'and');

		return new CActiveDataProvider($this, array(
			'criteria' => $c,
		));
	}
	
	public function totValor() {
	
		$c = clone $this->curr_criteria;
	
		$c->select = 'sum(valor_fatura)';
	
		return Yii::app()->NumberFormatter->formatCurrency(
				$this->commandBuilder->createFindCommand(
						$this->getTableSchema(), $c)->queryScalar(), 'BRL');
	}

	public function totVpgto() {

		$c = clone $this->curr_criteria;

		$c->select = 'sum(valor_pagamento)';

		return Yii::app()->NumberFormatter->formatCurrency(
				$this->commandBuilder->createFindCommand(
						$this->getTableSchema(), $c)->queryScalar(), 'BRL');
	}

	public function getSearchCriteria() {

			$criteria = new CDbCriteria;
			
			$criteria->compare('idfluxo', $this->idfluxo);
			$criteria->compare('iduser', $this->iduser);
			$criteria->compare('idempresa_origem', $this->idempresa_origem);
			$criteria->compare('idempresa_destino', $this->idempresa_destino);
			$criteria->compare('idconta', $this->idconta);
			$criteria->compare('idccusto', $this->idccusto);
			$criteria->compare('iduser_pgto', $this->iduser_pgto);
			$criteria->compare('idformaspg', $this->idformaspg);
			$criteria->compare('data_sistema', $this->data_sistema, true);
			
			if((isset($this->df_inicial) && trim($this->df_final) != "") && (isset($this->df_inicial) && trim($this->df_final) != "")) {
				$criteria->addBetweenCondition('data_faturamento', ''.date('Y-m-d', CDateTimeParser::parse($this->df_inicial, Yii::app()->locale->dateFormat)).'', ''.date('Y-m-d', CDateTimeParser::parse($this->df_final, Yii::app()->locale->dateFormat)).'');				
			}
			
				
			//$criteria->compare('data_faturamento', $this->data_faturamento, true);
			//$criteria->compare('data_vencimento', $this->data_vencimento, true);
			if((isset($this->dv_inicial) && trim($this->dv_final) != "") && (isset($this->dv_inicial) && trim($this->dv_final) != "")) {
				$criteria->addBetweenCondition('data_vencimento', ''.date('Y-m-d', CDateTimeParser::parse($this->dv_inicial, Yii::app()->locale->dateFormat)).'', ''.date('Y-m-d', CDateTimeParser::parse($this->dv_final, Yii::app()->locale->dateFormat)).'');
			}
			$criteria->compare('data_pagamento', $this->data_pagamento, true);
			$criteria->compare('data_cancelado', $this->data_cancelado, true);
			$criteria->compare('doc_numero', $this->doc_numero, true);
			$criteria->compare('valor_fatura', $this->moedaToSql($this->f_valor_fatura), true);
			$criteria->compare('valor_pagamento', $this->moedaToSql($this->f_valor_pagamento), true);
			$criteria->compare('valor_multa', $this->moedaToSql($this->f_valor_multa), true);
			$criteria->compare('valor_juros', $this->moedaToSql($this->f_valor_juros), true);
			$criteria->compare('observacao', $this->observacao, true);
			$criteria->compare('id_sisfat', $this->id_sisfat);
			$criteria->compare('tipo_sisfat', $this->tipo_sisfat, true);
			$criteria->compare('filename', $this->filename, true);
			$criteria->compare('nf', $this->nf, true);

			$this->curr_criteria = $criteria;

			return $criteria;

	}

	public function baixa() {

		$c = $this->getSearchCriteria();

		$c->addCondition("not((valor_pagamento > valor_fatura * 0.95) and (valor_pagamento < valor_fatura * 1.05))");

		$c->addCondition("valor_pagamento is null", 'or');

		return new CActiveDataProvider($this, array(
			'criteria' => $c,
		));
	}

	public function search($criteria = false) {

		$criteria = $this->getSearchCriteria();

		return new CActiveDataProvider($this,
				array(
					'criteria' => $criteria,
				));
	}

}
