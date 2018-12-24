<?php

/**
 * This is the model class for table "cad_estado".
 *
 * The followings are the available columns in table 'cad_estado':
 * @property integer $idestado
 * @property integer $idpais
 * @property string $sigla
 * @property string $descricao
 *
 * The followings are the available model relations:
 * @property Cidade[] $cidades
 * @property Pais $idpais0
 */
class Estado extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Estado the static model class
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
		return 'cad_estado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idpais', 'required'),
			array('idpais', 'numerical', 'integerOnly'=>true),
			array('sigla', 'length', 'max'=>2),
			array('descricao', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idestado, idpais, sigla, descricao', 'safe', 'on'=>'search'),
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
			'cidades' => array(self::HAS_MANY, 'Cidade', 'idestado'),
			'pais' => array(self::BELONGS_TO, 'Pais', 'idpais'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idestado' => 'Idestado',
			'idpais' => 'País',
			'sigla' => 'Sigla',
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

		$criteria->compare('idestado',$this->idestado);
		$criteria->compare('idpais',$this->idpais);
		$criteria->compare('sigla',$this->sigla,true);
		$criteria->compare('descricao',$this->descricao,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}