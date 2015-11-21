<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(

    'basePath'=> dirname(__FILE__).DIRECTORY_SEPARATOR.'../',

    'theme'=>'frontend',

    'name'=>'Goodlynx Deals',

    // preloading 'log' component
    'preload'=>array(
        'log',
    ),

    // autoloading model and component classes
    'import'=>array(
        'application.models.*',

		'application.vendors.*',
 			
        'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.deals.models.*',
    ),

    'modules'=>array(

        'gallery'=>array(
            'defaultController' => 'gallery',
        ),
        'event'=>array(
            'defaultController' => 'event',
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

        'webPageOnFly'=>array(
            'defaultController' => 'PageOnFly',
        ),

        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),
    ),
    // application components
    'components'=>array(

        'cache'=>array(
            'class'=>'system.caching.CFileCache',
            //'class'=>'system.caching.CDummyCache',
            //other cache class
        ),

        'user'=>array(
            // enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
        ),

        // uncomment the following to enable URLs in path-format
        'urlManager'=>array(
            'urlFormat'=>'path',
            'useStrictParsing'=>false,
            //'showScriptName'=>false,
            'rules'=>array(
                     '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                    '<state:[\w\-]+>/<city:[\w\-]+>/<profile:[\w\-]+>' => array('webPageOnFly/PageOnShow/page', 'urlSuffix'=>'.html'),
                    '<state:[\w\-]+>/<city:[\w\-]+>/<category:[\w\-]+>/<id:[\w\-]+>' => array('site/DealDetails'),

                    '<controller:\w+>/<id:\d+>'=>'<controller>/view',
					'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
					'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
               //'<module:\w+><controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
            ),
        ),

        // uncomment the following to use a MySQL database
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=testdb',
            'emulatePrepare' => true,
            'schemaCachingDuration' => 3600,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
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
        'adminEmail'=>'admin@goodlynx.com',
    ),
);