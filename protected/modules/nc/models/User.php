<?php

Yii::import('application.modules.nc.models._base.BaseUser');

class User extends BaseUser
{
	
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	
	public static function isGerente(){
		$x = Rights::getAssignedRoles(Yii::app()->user->id);
		return (in_array('Gestor do Sistema',array_keys($x)));
	}
	
	private static $_userlist;
	
	private static $_users;
	

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
	
	public function relations() {
		return array(
			'comentarios' => array(self::HAS_MANY, 'Comentario', 'iduser'),
			'nclidas' => array(self::MANY_MANY, 'Nconf', 'nconf_user_leu(iduser, idnconf)'),
			'ncamim' => array(self::HAS_MANY, 'Nconf', 'iduser_direcionado'),
			'previsoes' => array(self::HAS_MANY, 'NconfPrevisao', 'iduser_inseriu'),
			'setor' => array(self::MANY_MANY, 'Setor', 'rel_User_setor(iduser, idsetor)'),
			'responsavel' => array(self::HAS_MANY, 'Setor', 'iduser_responsavel'),
			'setor_responsavel'=>array(self::HAS_MANY, 'Setor', 'iduser'),
		);
	}
	
	public function pivotModels() {
		return array(
			'nclidas' => 'NconfUserLeu',
			'setor' => 'RelUserSetor',
		);
	}
	
	public function rules() {
		return array(
			array('nome, login', 'required'),
			array('password,password2','required','on'=>'create'),
			array('nome, password, seed, email', 'length', 'max'=>255),
			array('login', 'length', 'max'=>45),
			array('password2', 'compare', 'compareAttribute'=>'password'),
			array('password, seed, email', 'default', 'setOnEmpty' => true, 'value' => null),
			array('iduser, nome, login, password, seed, email', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels() {
		return array(
			'iduser' => Yii::t('app', 'Iduser'),
			'nome' => Yii::t('app', 'Nome'),
			'login' => Yii::t('app', 'Login'),
			'password' => Yii::t('app', 'Password'),
			'password2' => 'Confirmação',
			'seed' => Yii::t('app', 'Seed'),
			'email' => Yii::t('app', 'Email'),
		);
	}
	
	protected function beforeSave(){
    		
    	if ($this->seed === null) {
    		$this->seed = md5(uniqid(rand(), true));
    	}
		
		if ($this->password != '') {
			$this->password = md5($this->password.$this->seed);
		}
		
		return true;
	}
}