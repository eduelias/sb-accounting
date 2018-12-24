<?php

/**
 * This is the model class for table "tipo_nao_conformidade".
 *
 * The followings are the available columns in table 'tipo_nao_conformidade':
 * @property integer $idnconf
 * @property string $descricao
 *
 * The followings are the available model relations:
 * @property Nconf[] $nconfs
 * @property Setor[] $setors
 */
Yii::import('application.modules.nc.models._base.BaseTipoNaoConformidade');

class TipoNaoConformidade extends BaseTipoNaoConformidade
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TipoNaoConformidade the static model class
	 */
	 private static $_list;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tipo_nao_conformidade';
	}
	
	public static function getList()
	{
		if (self::$_list === null) {
			$a = self::model()->findAll();
			
			foreach ($a as $k=>$v) {
				self::$_list[$v->idnconf] = $v->descricao;
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
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idnconf, descricao', 'safe', 'on'=>'search'),
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
			'nconfs' => array(self::HAS_MANY, 'Nconf', 'idnconf_tipo'),
			'setors' => array(self::MANY_MANY, 'Setor', 'rel_setor_tnc(idnconf, idsetor)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idnconf' => 'Idnconf',
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

		$criteria->compare('idnconf',$this->idnconf);
		$criteria->compare('descricao',$this->descricao,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}