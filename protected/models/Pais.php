<?php

/**
 * This is the model class for table "cad_pais".
 *
 * The followings are the available columns in table 'cad_pais':
 * @property integer $idpais
 * @property string $descricao
 * @property string $codarea
 *
 * The followings are the available model relations:
 * @property Estado[] $estados
 */
class Pais extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pais the static model class
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
		return 'cad_pais';
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
			array('codarea', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpais, descricao, codarea', 'safe', 'on'=>'search'),
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
			'estado' => array(self::HAS_MANY, 'Estado', 'idpais'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpais' => 'Idpais',
			'descricao' => 'Nome',
			'codarea' => 'Código de Área',
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

		$criteria->compare('idpais',$this->idpais);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('codarea',$this->codarea,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}