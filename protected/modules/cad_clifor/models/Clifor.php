<?php

/**
 * This is the model class for table "cad_clifor".
 *
 * The followings are the available columns in table 'cad_clifor':
 * @property integer $idclifor
 * @property integer $idtipo
 * @property string $razao_social
 * @property string $nome_fantasia
 * @property string $doc
 * @property string $ie
 * @property string $data_cadastro
 * @property string $data_atualizacao
 * @property string $ativo
 *
 * The followings are the available model relations:
 * @property CliforTipo $idtipo0
 * @property Usuario[] $usuarios
 */
class Clifor extends CActiveRecord
{
	public $nome;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Clifor the static model class
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
		return 'cad_clifor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idtipo', 'required'),
			array('idtipo', 'numerical', 'integerOnly'=>true),
			array('razao_social, nome_fantasia', 'length', 'max'=>255),
			array('doc, ie', 'length', 'max'=>20),
			array('ativo', 'length', 'max'=>1),
			array('data_cadastro, data_atualizacao', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idclifor, idtipo, razao_social, nome_fantasia, doc, ie, data_cadastro, data_atualizacao, ativo', 'safe', 'on'=>'search'),
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
			'tipo' => array(self::BELONGS_TO, 'CliforTipo', 'idtipo'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'idclifor'),
		);
	}
	
	protected function afterFind()
	{
		$this->nome = (isset($this->nome_fantasia))?$this->nome_fantasia:$this->razao_social;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idclifor' => 'Idclifor',
			'idtipo' => 'Idtipo',
			'razao_social' => 'Razao Social',
			'nome_fantasia' => 'Nome Fantasia',
			'doc' => 'Doc',
			'ie' => 'Ie',
			'data_cadastro' => 'Data Cadastro',
			'data_atualizacao' => 'Data Atualizacao',
			'ativo' => 'Ativo',
			'nome'=>'Nome'
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

		$criteria->compare('idclifor',$this->idclifor);
		$criteria->compare('idtipo',$this->idtipo);
		$criteria->compare('razao_social',$this->razao_social,true);
		$criteria->compare('nome_fantasia',$this->nome_fantasia,true);
		$criteria->compare('doc',$this->doc,true);
		$criteria->compare('ie',$this->ie,true);
		$criteria->compare('data_cadastro',$this->data_cadastro,true);
		$criteria->compare('data_atualizacao',$this->data_atualizacao,true);
		$criteria->compare('ativo',$this->ativo,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}