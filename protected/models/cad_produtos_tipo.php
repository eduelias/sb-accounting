<?php

/**
 * This is the model class for table "cad_produtos_tipo".
 *
 * The followings are the available columns in table 'cad_produtos_tipo':
 * @property integer $idprodutos_tipo
 * @property string $descricao
 */
class cad_produtos_tipo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return cad_produtos_tipo the static model class
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
		return 'cad_produtos_tipo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descricao', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idprodutos_tipo, descricao', 'safe', 'on'=>'search'),
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
			'cad_produtoses' => array(self::HAS_MANY, 'CadProdutos', 'idprodutos_tipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idprodutos_tipo' => 'Idprodutos Tipo',
			'descricao' => 'Descricao',
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

		$criteria->compare('idprodutos_tipo',$this->idprodutos_tipo);

		$criteria->compare('descricao',$this->descricao,true);

		return new CActiveDataProvider('cad_produtos_tipo', array(
			'criteria'=>$criteria,
		));
	}
}