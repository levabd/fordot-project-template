<?php
return array(
    'name'=>'local.providers.com.ua',
    'modules'=>array(
        'gii'=>array(
            //'generatorPaths' => array('bootstrap.gii'),
            'generatorPaths' => array('booster.gii', 'application.vendor.gii-template-collection'),
            'class'=>'system.gii.GiiModule',
            'password'=>'root',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters'=>array('127.0.0.1','::1'),
        ),

    ),
    'components' => array(
        'db' => array(
            'username' => 'local_user',
            'password' => 'local_pass',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning, trace, info',
                ),
                array(
                    'class'=>'CProfileLogRoute',
                    'report'=>'summary',
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

    'params'=>array(
        'siteURL'=>'localhost',
        'indexationRights' => 'noindex, nofollow',
        // this is used in contact page
        'adminEmail'=>'developer@email.com',
        'emailSent' => array(
            'mailHost' => 'smtp.gmail.com',
            'mailPort' => 465, // Optional
            'ssl' => true, //Optional
            'user' => 'smtp.user@of.site',
            'pass' => 'smtp.pass',
            'defaultFrom' => array('support@of.site' => 'default title'), //Optional
        ),

        //additional mail settings scope
        'emailToName' => 'default title',
        'emailTo' => array('sell@of.site' => Yii::app()->params['emailToName']),
    ),
);