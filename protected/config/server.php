<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(

    'basePath'=> dirname(__FILE__).DIRECTORY_SEPARATOR.'../',

    'theme'=>'frontend',

    'name'=>'Goodlynx Deals',

   // autoloading model and component classes
    'import'=>array(
        'application.models.*',
        'application.components.*',
        'application.lib.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',

    ),

    'modules'=>array(

        'gallery'=>array(
            'defaultController' => 'gallery',
        ),

        'deals'=>array(
            'defaultController' => 'deals',
        ),

        'user'=>array(
            'defaultController' => 'Login',
            # send activation email
            'sendActivationMail' => true,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on basic (only sendActivationMail = false)
            'activeAfterRegister' => false,
            # basic path
            'basic' => array('/user/basic'),
            'vip' => array('/user/vip'),
            'business' => array('/user/business'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('/user/login'),
//			# page after login
//			'returnUrl' => array('/user/profile'),
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),

        'EmailFormat'=>array(
            'defaultController' => 'EmailFormat',
        ),

        'businessProfile'=>array(
            'defaultController' => 'businessProfile',
        ),

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
//				'generatorPaths' => array(
//					'bootstrap.gii'
//				),
        ),
    ),
    // application components
    'components'=>array(

        'user'=>array(
            // enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin'=>false,
            'loginUrl' => array('/user/login'),
        ),

        'bootstrap' => array(
            'class' => 'ext.bootstrap.components.Bootstrap',
            'responsiveCss' => true,
        ),

        // uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'urlFormat'=>'path',
            'useStrictParsing'=>false,
            'rules'=>array(
                //'<profile:[\w\-]+>' => array('businessProfile/businessProfile/index', 'urlSuffix'=>'.html'),
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),

        // uncomment the following to use a MySQL database
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=deal_demo',
            'emulatePrepare' => true,
            'username' => 'deal_demo',
            'password' => 'deal_demo',
            'charset' => 'utf8',
//            'enableProfiling' => true,
//            'enableParamLogging' => true,
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
/*					 array(
						 'class'=>'CWebLogRoute',
					 ),*/
				),
			),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'webmaster@example.com',
    ),
);