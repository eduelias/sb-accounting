<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Auxiliar WEB Solbrilhante',
	'language'=>'pt_br',
	'sourceLanguage'=>'en_us',
	'localeDataPath'=>'protected/i18n/data',
	
	//'locale'=>'pt_br',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
		'application.modules.rights.components.*',
		'application.modules.user.*',
		'application.modules.user.models.*', 
		'application.modules.nc.*',
		'application.modules.nc.models.*',
		'application.modules.arquivo.*',
		'application.modules.arquivo.models,*',
		'application.modules.cad_produto.*',
		'application.modules.cad_produto.models.*',
		'application.modules.cad_produto.components.*',
		'application.modules.clifor.*',
		'application.modules.clifor.models.*',
		'application.modules.clifor.components.*',
		'application.modules.pedido.*',
		'application.modules.pedido.models.*',
		'application.modules.pedido.components.*',	
		'application.modules.cxfluxo.*',
		'application.modules.cxfluxo.models.*',
		'application.modules.cxfluxo.components.*',
		'application.widgets.*',
		'application.extensions.*',
		'ext.giix-components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'user',
		
		'cad_produto',
		
		'cxfluxo',
		
		'clifor',
		
		'svn',
		
		'nc',
		
		'arquivo',
		
		'pedido',
		
		'rights'=>array(
		   'install'=>false,	   
		   //'superUserRole'=>'Admin',
		   'authenticatedName'=>'Authenticated',		  
		   'superuserName'=>'admin',
		   'userIdColumn'=>'iduser',
		   'userNameColumn'=>'login',
		   'userClass'=>'User',
		   'enableBizRule'=>'false',
		   'debug'=>true
		),
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii.senha', 
			'generatorPaths' => array(
				'ext.giix-core',
			),
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('*'),

		//	'ipFilters'=>array('192.168.2.201','::1','192.168.2.214', '187.13.167.23','189.*'),

		),  
	),
 
	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'class'=>'RWebUser',
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'coreMessages'=>array('basePath'=>'protected/messages'),
		/*'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),*/
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=eduardo_siged',
			'emulatePrepare' => true,
			'username' => 'eduardo_siged',
			'password' => 'siged01',
			'charset' => 'utf8',
		),
		
		'authManager'=>array(
			'class'=>'RDbAuthManager',
			'connectionID'=>'db',
			'defaultRoles'=>array('Guest')
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'ti@solbrilhante.ind.br',
	),
);