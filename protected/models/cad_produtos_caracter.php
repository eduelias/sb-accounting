<?php

/**
 * This is the model class for table "cad_produtos_caracter".
 *
 * The followings are the available columns in table 'cad_produtos_caracter':
 * @property integer $idprodutos_caracter
 * @property integer $idprodutos
 * @property string $dim_x
 * @property string $dim_y
 * @property string $dim_z
 * @property string $peso_bruto
 * @property string $peso_liquido
 */
class cad_produtos_caracter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return cad_produtos_caracter the static model class
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
		return 'cad_produtos_caracter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idprodutos', 'required'),
			array('idprodutos', 'numerical', 'integerOnly'=>true),
			array('dim_x, dim_y, dim_z', 'length', 'max'=>7),
			array('peso_bruto, peso_liquido', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idprodutos_caracter, idprodutos, dim_x, dim_y, dim_z, peso_bruto, peso_liquido', 'safe', 'on'=>'search'),
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
			'idprodutos0' => array(self::BELONGS_TO, 'CadProdutos', 'idprodutos'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idprodutos_caracter' => 'Idprodutos Caracter',
			'idprodutos' => 'Produtos',
			'dim_x' => 'Dimensão X',
			'dim_y' => 'Dimensão Y',
			'dim_z' => 'Dimensão Z',
			'peso_bruto' => 'Peso Bruto',
			'peso_liquido' => 'Peso Líquido',
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

		$criteria->compare('idprodutos_caracter',$this->idprodutos_caracter);

		$criteria->compare('idprodutos',$this->idprodutos);

		$criteria->compare('dim_x',$this->dim_x,true);

		$criteria->compare('dim_y',$this->dim_y,true);

		$criteria->compare('dim_z',$this->dim_z,true);

		$criteria->compare('peso_bruto',$this->peso_bruto,true);

		$criteria->compare('peso_liquido',$this->peso_liquido,true);

		return new CActiveDataProvider('cad_produtos_caracter', array(
			'criteria'=>$criteria,
		));
	}
}