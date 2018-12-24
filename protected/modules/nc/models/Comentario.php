<?php

/**
 * This is the model class for table "comentario".
 *
 * The followings are the available columns in table 'comentario':
 * @property integer $idcomentario
 * @property integer $iduser
 * @property integer $idnconf
 * @property string $publico
 * @property string $comentario
 * @property string $data
 *
 * The followings are the available model relations:
 * @property User $iduser0
 * @property Nconf $idnconf0
 */
class Comentario extends SActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Comentario the static model class
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
		return 'comentario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comentario', 'length', 'max'=>1024),
			array('idnconf', 'numerical', 'integerOnly'=>true),
			array('publico', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcomentario, iduser, idnconf, publico, comentario, data', 'safe', 'on'=>'search'),
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
			'autor' => array(self::BELONGS_TO, 'User', 'iduser'),
			'nc' => array(self::BELONGS_TO, 'Nconf', 'idnconf'),
		);
	}
	
	protected function beforeSave()
	{
		$this->iduser = Yii::app()->user->id;
		
		return parent::beforeSave();
	}
	
	protected function afterSave(){
		
		$this->nc->setNlida();
		
		return parent::afterSave();
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcomentario' => 'Idcomentario',
			'iduser' => 'Iduser',
			'idnconf' => 'Idnconf',
			'publico' => 'Público',
			'comentario' => 'Comentário',
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

		$criteria->compare('idcomentario',$this->idcomentario);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('idnconf',$this->idnconf);
		$criteria->compare('publico',$this->publico,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('data',$this->data,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	public function comentarios()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->order = 'data DESC';
		
		$criteria->compare('idcomentario',$this->idcomentario);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('idnconf',$this->idnconf);
		$criteria->compare('publico',$this->publico,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('data',$this->data,true);
	
		return new CActiveDataProvider(get_class($this), array(
				'criteria'=>$criteria,
				'pagination' => array('pageSize'=>7)
		));
	}
}