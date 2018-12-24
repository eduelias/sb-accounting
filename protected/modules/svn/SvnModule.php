<?php

class SvnModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'svn.models.*',
			'svn.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			svn_auth_set_parameter(PHP_SVN_AUTH_PARAM_IGNORE_SSL_VERIFY_ERRORS,1);
    		svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_USERNAME, 'eduardo');
    		svn_auth_set_parameter(SVN_AUTH_PARAM_DEFAULT_PASSWORD, 'yf8mtfq2');
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
