<?php

/**
 * This is the model class for table "rel_status_nconf".
 *
 * The followings are the available columns in table 'rel_status_nconf':
 * @property integer $idstatus
 * @property integer $idnconf
 * @property integer $iduser
 * @property string $data
 */
class RelStatusNconf extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return RelStatusNconf the static model class
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
		return 'rel_status_nconf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idstatus, idnconf, iduser, data', 'required'),
			array('idstatus, idnconf, iduser', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idstatus, idnconf, iduser, data', 'safe', 'on'=>'search'),
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
			'status'=>array(self::HAS_ONE, 'Status', 'idstatus'),
			'usuario'=>array(self::BELONGS_TO, 'User', 'iduser'),
			'nconf'=>array(self::BELONGS_TO, 'Nconf', 'idnconf'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idstatus' => 'Idstatus',
			'idnconf' => 'Idnconf',
			'iduser' => 'Iduser',
			'data' => 'Data',
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

		$criteria->compare('idstatus',$this->idstatus);
		$criteria->compare('idnconf',$this->idnconf);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('data',$this->data,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}