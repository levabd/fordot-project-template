<?php
$pathLocalConfig = dirname(__FILE__) . '/console.local.php';
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
    array(
        'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
        'name' => 'My Console Application',

        // preloading 'log' component
        'preload' => array('log'),

        'modules' => array(
            #...
            'user' => array(
                # encrypting method (php hash function)
                'hash' => 'md5',

                # send activation email
                'sendActivationMail' => true,

                # allow access for non-activated users
                'loginNotActiv' => false,

                # activate user on registration (only sendActivationMail = false)
                'activeAfterRegister' => false,

                # automatically login from registration
                'autoLogin' => true,

                # registration path
                'registrationUrl' => array('/user/registration'),

                # recovery password path
                'recoveryUrl' => array('/user/recovery'),

                # login form path
                'loginUrl' => array('/user/login'),

                # page after login
                'returnUrl' => array('/user/profile'),

                # page after logout
                'returnLogoutUrl' => array('/user/login'),
            ),
            #...
        ),

        // application components
        'components' => array(
            'db' => array(
                'tablePrefix' => '',
                'connectionString' => 'mysql:host=localhost;dbname=providers',
                'emulatePrepare' => true,
                'username' => 'prod_user',
                'password' => 'prod_pass',
                'charset' => 'utf8',
                'enableParamLogging' => true,
                'enableProfiling' => true,
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
            'log' => array(
                'class' => 'CLogRouter',
                'routes' => array(
                    array(
                        'class' => 'CFileLogRoute',
                        'levels' => 'error, warning',
                    ),
                ),
            ),
        ),
    ),
    file_exists($pathLocalConfig) ? require $pathLocalConfig : array()
);