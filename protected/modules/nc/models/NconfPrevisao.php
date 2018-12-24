<?php

/**
 * This is the model class for table "nconf_previsao".
 *
 * The followings are the available columns in table 'nconf_previsao':
 * @property integer $idprevisao
 * @property integer $idnconf
 * @property integer $iduser_inseriu
 * @property string $data_inserido
 * @property string $data_previsao_min
 * @property string $data_previsao_max
 *
 * The followings are the available model relations:
 * @property Nconf $idnconf0
 * @property User $iduserInseriu
 */
class NconfPrevisao extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return NconfPrevisao the static model class
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
		return 'nconf_previsao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iduser_inseriu', 'required'),
			array('iduser_inseriu', 'numerical', 'integerOnly'=>true),
			array('data_previsao_min, data_previsao_max', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idprevisao, idnconf, iduser_inseriu, data_inserido, data_previsao_min, data_previsao_max', 'safe', 'on'=>'search'),
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
			'idnconf0' => array(self::BELONGS_TO, 'Nconf', 'idnconf'),
			'iduserInseriu' => array(self::BELONGS_TO, 'User', 'iduser_inseriu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idprevisao' => 'Idprevisao',
			'idnconf' => 'Idnconf',
			'iduser_inseriu' => 'Iduser Inseriu',
			'data_inserido' => 'Data Inserido',
			'data_previsao_min' => 'Data Previsão Min',
			'data_previsao_max' => 'Data Previsão Max',
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

		$criteria->compare('idprevisao',$this->idprevisao);
		$criteria->compare('idnconf',$this->idnconf);
		$criteria->compare('iduser_inseriu',$this->iduser_inseriu);
		$criteria->compare('data_inserido',$this->data_inserido,true);
		$criteria->compare('data_previsao_min',$this->data_previsao_min,true);
		$criteria->compare('data_previsao_max',$this->data_previsao_max,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}