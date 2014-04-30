<?php

// uncomment the following to define a path alias
Yii::setPathOfAlias('bootstrap','./modules/boostrap');

// Recordar Eliminar este bloque (se agregar para forzar la inclusion de clases para modulo boostrap
// se debe configurar de forma adecuada
include_once './protected/modules/boostrap/helpers/BsArray.php';
include_once './protected/modules/boostrap/helpers/BsHtml.php';
include_once './protected/modules/boostrap/widgets/BsNav.php';
include_once './protected/modules/boostrap/widgets/BsNavbar.php';
include_once './protected/modules/boostrap/widgets/BsPanel.php';
include_once './protected/modules/boostrap/widgets/BsCollapse.php';
include_once './protected/modules/boostrap/widgets/BsBreadcrumb.php';
include_once './protected/modules/boostrap/behaviors/BsWidget.php';
include_once './protected/modules/boostrap/components/BsApi.php';

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Test Web Service I',
                  'theme'=>'kongoon',
                  
                  'aliases' => array(
                        //'bootstrap' => realpath(__DIR__.'/../../../../../../modules/bootstrap'),
                        'bootstrap' => './modules/bootstrap/',
                        //'chartjs' => 'application.modules.bootstrap.extensions.yii-chartjs-master'
                  ),

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
                                   'bootstrap.*',
                                   'bootstrap.components.*',
                                   'bootstrap.behaviors.*',
                                   'bootstrap.helpers.*',
                                   'bootstrap.widgets.*',
                                   /*'chartjs.*',
                                   'chartjs.widgets.*',
                                   'chartjs.components.*',*/
                                   'application.models.*',
		'application.components.*',
                                   'application.extensions.coco.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'bootstrap' => array(
                                        'class' => 'bootstrap.BootStrapModule'
                                    ),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'tesws',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
                                                     'generatorPaths' => array('bootstrap.gii'),
		),
	),

	// application components
	'components'=>array(
                                   //boostrap 4 of 4 specific components
                                   'bsHtml' => array('class' => 'bootstrap.helpers.BSHtml'),
                                   //'chartjs'=>array('class' => 'chartjs.components.ChartJs'),
                                   'bsApi'=>array('class' => 'bootstrap.components.BsApi'),
                                   /*'bootstrap' => array(
                                        //'class' => 'ext.bootstrap.components.Bootstrap'),
                                        'class'=>'bootstrap.components.Bootstrap'
                                   ),*/
		'user'=>array(
			// enable cookie-based authentication
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
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
                                   'request'=>array(
                                            'enableCsrfValidation'=>false,
                                            'enableCookieValidation'=>true
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
		'adminEmail'=>'webmaster@example.com',
	),
);