<?php

/**
 * This is the model class for table "cad_produtos_categoria".
 *
 * The followings are the available columns in table 'cad_produtos_categoria':
 * @property integer $idprodutos_categoria
 * @property integer $idcategoria_pai
 * @property string $descricao
 * @property string $fator_corr
 * @property string $ativo
 */
class cad_produtos_categoria extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return cad_produtos_categoria the static model class
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
		return 'cad_produtos_categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcategoria_pai', 'numerical', 'integerOnly'=>true),
			array('descricao', 'length', 'max'=>100),
			array('fator_corr', 'length', 'max'=>5),
			array('ativo', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idprodutos_categoria, idcategoria_pai, descricao, fator_corr, ativo', 'safe', 'on'=>'search'),
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
			'cad_produtoses' => array(self::HAS_MANY, 'CadProdutos', 'idprodutos_categoria'),
			'idcategoria_pai0' => array(self::BELONGS_TO, 'cad_produtos_categoria', 'idcategoria_pai'),
			'cad_produtos_categorias' => array(self::HAS_MANY, 'cad_produtos_categoria', 'idcategoria_pai'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idprodutos_categoria' => 'Idprodutos Categoria',
			'idcategoria_pai' => 'Idcategoria Pai',
			'descricao' => 'Descricao',
			'fator_corr' => 'Fator Corr',
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

		$criteria->compare('idprodutos_categoria',$this->idprodutos_categoria);

		$criteria->compare('idcategoria_pai',$this->idcategoria_pai);

		$criteria->compare('descricao',$this->descricao,true);

		$criteria->compare('fator_corr',$this->fator_corr,true);

		$criteria->compare('ativo',$this->ativo,true);

		return new CActiveDataProvider('cad_produtos_categoria', array(
			'criteria'=>$criteria,
		));
	}
}