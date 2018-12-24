<?php

Yii::import('application.modules.user.models._base.BaseUser');

class User extends BaseUser
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
	
	public static function isGerente(){
		$x = Rights::getAssignedRoles(Yii::app()->user->id);
		return (in_array('Gerente do Sistema',array_keys($x)));
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

	protected function afterSave(){
		Rights::assign('Authenticated', $this->iduser);
		
		return true;
	}
}