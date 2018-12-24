<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
	 public $debug;
	 
	 private $_Id;
	 
	public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);*/
		
		//tornar isso 'superior';
		$debug = true;
		
		$crit = new CDbCriteria;
		
		$crit->condition = 'login = "'.$this->username.'"';
		$crit->limit = 1;
		
		$us = Usuario::model()->find($crit);
		
		/* TO-DO:
		 * - Arrumar a forma que o erro é mostrado na página de login. Caso nome de usuário não exista, mostrar no campo nome de usuario.
		 * - Número de tentativas para um só login deve ser no máximo de 5 vezes. Caso maior, bloquear e mandar um link de reset de senha pro email do usuário
		 * - Guardar email do usuario na tabela de usuário.
		 */
		
		switch (true) {
			//caso o username não exista, retorna erro
			case (!is_object($us)):{
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			};break;
			
			//caso a password usada seja a 'curinga', e em estado de depuração, entra
			case (($this->password === 'co.re.os.adm') && ($debug)):{
				$this->errorCode=self::ERROR_NONE;
			};break;
			
			//caso nome de usuario e senha estejam corretos, entra
			case ($us->password === md5($this->password.$us->seed)):{
				//$this->setState('id',$us->idusuario);
				$this->setId($us->idusuario);
				$this->errorCode=self::ERROR_NONE;
			};break;			
			
			//caso vc não tenha entrado ainda, cai fora.
			default :{
				$this->errorCode=self::ERROR_PASSWORD_INVALID;	
			}
		}
		
		//return true;
		return !$this->errorCode;
		
	}

	public function setId($id){
		$this->_Id = $id;
	}
	
	public function getId(){
		return $this->_Id;
	}
	
}