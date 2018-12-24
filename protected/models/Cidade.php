<?php

/**
 * This is the model class for table "cad_cidade".
 *
 * The followings are the available columns in table 'cad_cidade':
 * @property integer $idcidade
 * @property integer $idestado
 * @property string $siglaestado
 * @property string $descricao
 *
 * The followings are the available model relations:
 * @property Estado $idestado0
 */
class Cidade extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cidade the static model class
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
		return 'cad_cidade';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idestado', 'required'),
			array('idestado', 'numerical', 'integerOnly'=>true),
			array('siglaestado', 'length', 'max'=>2),
			array('descricao', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcidade, idestado, siglaestado, descricao', 'safe', 'on'=>'search'),
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
			'estado' => array(self::BELONGS_TO, 'Estado', 'idestado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcidade' => 'Idcidade',
			'idestado' => 'Idestado',
			'siglaestado' => 'Estado',
			'descricao' => 'Nome',
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

		$criteria->compare('idcidade',$this->idcidade);
		$criteria->compare('idestado',$this->idestado);
		$criteria->compare('siglaestado',$this->siglaestado,true);
		$criteria->compare('descricao',$this->descricao,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}