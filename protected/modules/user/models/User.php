<?php

/**
 * This is the model class for table "cad_usuario".
 *
 * The followings are the available columns in table 'cad_usuario':
 * @property integer $idusuario
 * @property integer $idclifor
 * @property string $ativo
 * @property string $password
 * @property string $login
 * @property string $seed
 *
 * The followings are the available model relations:
 * @property CadClifor $idclifor0
 */
class User extends CActiveRecord
{
	public $password2;
	
	private static $_userlist;
	
	private static $_users;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return CadUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getUserlist()
	{
		self::loadUserlist();
		
		return self::$_userlist;
		
	}
	
	private static function loadUserlist()
	{					
		foreach (self::getUsers() as $t)
		{
			self::$_userlist[$t->iduser] = $t->nome;
		}
	}
	
	public static function getUsers()
	{
		if (self::$_users === null)
			self::loadUsers();
		
		return self::$_users;
		
	}
	
	private static function loadUsers()
	{
		
		$users = self::model()->findAll();
		
		self::$_users = $users;
		
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('password, seed', 'length', 'max'=>255),
			array('login,nome,email','required'),
			array('login','unique'),  
			array('login', 'length', 'max'=>15),
			array('password2', 'compare', 'compareAttribute'=>'password'),
			array('email,nome','length','max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('iduser, email, password, login, seed', 'safe', 'on'=>'search'),
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
			'setor'=>array(self::MANY_MANY, 'Setor', 'rel_User_setor(iduser, idsetor)'),
			'setor_responsavel'=>array(self::HAS_MANY, 'Setor', 'iduser'),
			//'clifor' => array(self::BELONGS_TO, 'Clifor', 'idclifor'),
		);
	}

	//BEFORE SAVE: Fazendo um seed e arrumando a password pro formato do BD
    protected function beforeSave(){
    		
    	if ($this->seed === null) {
    		$this->seed = md5(uniqid(rand(), true));
    	}
		
		if ($this->password != '') {
			$this->password = md5($this->password.$this->seed);
		}
		
		return true;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iduser' => 'Idusuario',
			'nome'=>'Nome',
			'password' => 'Senha',
			'password2' => 'Confirmação',
			'login' => 'Login',
			'seed' => 'Seed',
			'email'=>'Email'
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

		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('seed',$this->seed,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}