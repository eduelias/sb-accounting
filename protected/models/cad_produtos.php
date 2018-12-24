<?php

/**
 * This is the model class for table "cad_produtos".
 *
 * The followings are the available columns in table 'cad_produtos':
 * @property integer $idprodutos
 * @property integer $idunidade
 * @property integer $idprodutos_categoria
 * @property integer $idusuario
 * @property integer $idprodutos_tipo
 * @property integer $idprodutos_descricao
 * @property integer $idprodutos_validade
 * @property string $nomeprod
 * @property string $desc_max
 * @property string $desc_min
 * @property string $qtde_min
 * @property string $data_atualizacao
 * @property string $data_cadastro
 * @property string $ativo
 */
class cad_produtos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return cad_produtos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cad_produtos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idunidade, idprodutos_categoria, idusuario, idprodutos_tipo, idprodutos_descricao, idprodutos_validade', 'required'),
			array('idunidade, idprodutos_categoria, idusuario, idprodutos_tipo, idprodutos_descricao, idprodutos_validade', 'numerical', 'integerOnly'=>true),
			array('nomeprod', 'length', 'max'=>200),
			array('desc_max, desc_min', 'length', 'max'=>3),
			array('qtde_min', 'length', 'max'=>7),
			array('ativo', 'length', 'max'=>1),
			array('data_atualizacao, data_cadastro', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idprodutos, idunidade, idprodutos_categoria, idusuario, idprodutos_tipo, idprodutos_descricao, idprodutos_validade, nomeprod, desc_max, desc_min, qtde_min, data_atualizacao, data_cadastro, ativo', 'safe', 'on'=>'search'),
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
			'idprodutos_categoria0' => array(self::BELONGS_TO, 'CadProdutosCategoria', 'idprodutos_categoria'),
			'idprodutos_descricao0' => array(self::BELONGS_TO, 'CadProdutosDescricao', 'idprodutos_descricao'),
			'idprodutos_tipo0' => array(self::BELONGS_TO, 'CadProdutosTipo', 'idprodutos_tipo'),
			'idunidade0' => array(self::BELONGS_TO, 'CadProdutosUnidade', 'idunidade'),
			'idprodutos_validade0' => array(self::BELONGS_TO, 'CadProdutosValidade', 'idprodutos_validade'),
			'idusuario0' => array(self::BELONGS_TO, 'CadUsuario', 'idusuario'),
			'cad_produtos_caracters' => array(self::HAS_MANY, 'CadProdutosCaracter', 'idprodutos'),
			'cad_produtos_fiscals' => array(self::HAS_MANY, 'CadProdutosFiscal', 'idprodutos'),
			'cad_produtos_gruposes' => array(self::HAS_MANY, 'CadProdutosGrupos', 'idprodutos_master'),
			'cad_produtos_icms' => array(self::HAS_MANY, 'CadProdutosIcms', 'idprodutos'),
			'cad_produtos_imgs' => array(self::HAS_MANY, 'CadProdutosImg', 'idprodutos'),
			'cad_produtos_precoses' => array(self::HAS_MANY, 'CadProdutosPrecos', 'idprodutos'),
			'cad_produtos_precos_volumes' => array(self::HAS_MANY, 'CadProdutosPrecosVolume', 'idprodutos'),
			'cad_rel_produtos_preco_clifors' => array(self::HAS_MANY, 'CadRelProdutosPrecoClifor', 'idprodutos'),
			'fluxo_produtoses' => array(self::HAS_MANY, 'FluxoProdutos', 'idprodutos'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idprodutos' => 'ID',
			'idunidade' => 'Unidade',
			'idprodutos_categoria' => 'Categoria',
			'idusuario' => 'Usuário',
			'idprodutos_tipo' => 'Tipo',
			'idprodutos_descricao' => 'Descrição',
			'idprodutos_validade' => 'Validade',
			'nomeprod' => 'Nome',
			'desc_max' => 'Desconto Máximo',
			'desc_min' => 'Desconto Mínimo',
			'qtde_min' => 'Quantidade Mínima',
			'data_atualizacao' => 'Data Atualizacao',
			'data_cadastro' => 'Data Cadastro',
			'ativo' => 'Ativo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idprodutos',$this->idprodutos);

		$criteria->compare('idunidade',$this->idunidade);

		$criteria->compare('idprodutos_categoria',$this->idprodutos_categoria);

		$criteria->compare('idusuario',$this->idusuario);

		$criteria->compare('idprodutos_tipo',$this->idprodutos_tipo);

		$criteria->compare('idprodutos_descricao',$this->idprodutos_descricao);

		$criteria->compare('idprodutos_validade',$this->idprodutos_validade);

		$criteria->compare('nomeprod',$this->nomeprod,true);

		$criteria->compare('desc_max',$this->desc_max,true);

		$criteria->compare('desc_min',$this->desc_min,true);

		$criteria->compare('qtde_min',$this->qtde_min,true);

		$criteria->compare('data_atualizacao',$this->data_atualizacao,true);

		$criteria->compare('data_cadastro',$this->data_cadastro,true);

		$criteria->compare('ativo',$this->ativo,true);

		return new CActiveDataProvider('cad_produtos', array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeValidate(){
		if($this->scenario == 'create'){
			$this->idusuario = Yii::app()->user->id;
			$this->data_cadastro = date("Y-m-d H:i:s");
		} elseif($this->scenario == 'update') {
			$this->data_atualizacao = date("Y-m-d H:i:s");
		}
		return true;
	}
}