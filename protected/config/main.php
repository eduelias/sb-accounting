<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SiGED - Webdist',
	'language'=>'pt_br',
	'sourceLanguage'=>'pt_br',
	

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.rights.*',
		'application.modules.rights.components.*',
		'application.modules.cad_clifor.models.*',
		'application.modules.user.models.*',
		'application.modules.user.*',
		'ext.giix-components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'cad_clifor',
		'user',
		/*
		 'rights'=>array(
			'superuserName'=>'Admin', // Name of the role with super user privileges.
			'authenticatedName'=>'Authenticated', // Name of the authenticated user role.
			'guestName'=>'Guest', // Name of the guest role.
			'defaultRoles'=>null, // List of role names that are assigned to all users.
			'userClass'=>'User', // Name of the User model class.
			'userIdColumn'=>'id_number', // Name of the user id column in the database.
			'userNameColumn'=>'username', // Name of the user name column in the database.
			'enableBizRule'=>true, // Whether to enable authorization item business rules.
			'enableBizRuleData'=>false, // Whether to enable data for business rules.
			'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages.
			'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages.
			'layout'=>'rights.views.layouts.rights', // Layout to use for displaying Rights.
			'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested.
			'cssFile'=>'rights.css', // Style sheet file to use for Rights.
			'install'=>false, // Whether to enable installer.
		 	'superUsers'=>array(
		 * 		1=>admin
		 * 		2=>nsoq
		 * 	)
			),
		 */
		'rights'=>array(
		   'install'=>false,	   
		   //'superUserRole'=>'Admin',
		   'superuserName'=>'admin',
		   'userIdColumn'=>'idusuario',
		   'userNameColumn'=>'login',
		   'userClass'=>'Usuario',
		   'enableBizRule'=>'false',
		   //'layout'=>'webroot.themes.gui.views.layouts.main',
		   'debug'=>true
		),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'gii.senha',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('200.251.60.2','::1'),
			'ipFilters'=>array('189.107.147.74'),
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
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=webdist',
			'emulatePrepare' => true,
			'username' => 'webdist',
			'password' => 'webdist01',
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
					'levels'=>'info, error, warning',
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
		'adminEmail'=>'eduardo@coresolucoes.com.br',
	),
);