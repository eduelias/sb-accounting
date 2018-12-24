<?php

/**
 * This is the model class for table "status".
 *
 * The followings are the available columns in table 'status':
 * @property integer $idstatus
 * @property string $descricao
 * @property string $envia_email
 *
 * The followings are the available model relations:
 * @property Nconf[] $nconfs
 */
class Status extends CActiveRecord
{
	private static $_list;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Status the static model class
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
		return 'status';
	}
	
	public static function getList()
	{
		if (self::$_list === null) {
			$a = self::model()->findAll();
			
			foreach ($a as $k=>$v) {
				self::$_list[$v->idstatus] = $v->descricao;
			}
		}
		
		return self::$_list;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descricao', 'length', 'max'=>255),
			array('envia_email', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idstatus, descricao, envia_email', 'safe', 'on'=>'search'),
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
			'nconfs' => array(self::MANY_MANY, 'Nconf', 'rel_status_nconf(idstatus, idnconf)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idstatus' => 'Idstatus',
			'descricao' => 'Descrição',
			'envia_email' => 'Envia Email',
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
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('envia_email',$this->envia_email,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}