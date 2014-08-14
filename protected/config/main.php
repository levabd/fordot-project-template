<?php
$pathLocalConfig = dirname(__FILE__) . '/main.local.php';
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
    array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'Providers.com.ua',
        'language' => 'ru',
        'defaultController' => 'site',
        'timeZone' => 'Europe/Kiev',

        // preloading 'log' and 'booster' component
        'preload'=>array('log', 'booster'),

        // path aliases
        'aliases' => array(
            //'booster' => realpath(__DIR__ . '/../extensions/yiibooster'),
        ),

        // import paths
        'import'=>array(
            'application.models.*',
            'application.components.*',
        ),

        'modules'=>array(
            'admin',
            'usr'=>array(
                'layout' => '//layouts/admin',
                'formClass'=>'booster.widgets.TbActiveForm',
                'detailViewClass'=>'booster.widgets.TbDetailView',
                'gridViewClass' => 'booster.widgets.TbGridView',
                /*'pictureUploadRules' => array(
                        array(
                            'file',
                            'allowEmpty' => true,
                            'types'=>'jpg, gif, png',
                            'maxSize'=>2*1024*1024,
                            'safe' => false,
                            'maxFiles' => 1),
                ),*/
                'mailerConfig' => array(
                    'SetLanguage' => array('ru'),
                    'SetFrom' => array('registration@providers.com.ua', 'Робот'),
                    'AddReplyTo' => array('registration@providers.com.ua','Робот'),
                    'IsMail' => array(),
                    // SMTP options from params of application
                    // extension properties
                    'setPathViews' => array('usr.views.emails'),
                    'setPathLayouts' => array('usr.views.layouts'),
                ),
                'formCssClass'=>'form well',
                'loginFormCssClass'=>'form',
                'afterLoginStaticAction' => true,
                'afterLoginUrl' => 'admin',
                'alertCssClassPrefix'=>'alert alert-',
                'submitButtonCssClass'=>'btn btn-primary',
                'htmlCss' => array(
                    'errorSummaryCss' => 'alert alert-error',
                    'errorMessageCss' => 'text-error',
                ),
                'registrationEnabled' => false,
                'hybridauthProviders' => array(
                    'OpenID' => array('enabled'=>false),
                    'Facebook' => array('enabled'=>false, 'keys'=>array('id'=>'', 'secret'=>''), 'scope'=>'email'),
                ),
                'userIdentityClass' => 'UserIdentity',
            ),
        ),

        // application components
        'components'=>array(
            //'bootstrap' => array(
            //    'class' => 'bootstrap.components.BsApi',
            //),
            'booster' => array(
                'class' => 'ext.yiibooster.components.Booster',
                'enableCdn' => true,
                'fontAwesomeCss' => true,
                'responsiveCss' => true,
            ),
            'swiftMailer' => array(
                'class' => 'ext.swiftMailer.SwiftMailer', ),
            'mailerSent' => array(
                'class' => 'ext.swiftMailer.MailerSent', ),
            'user'=>array(
                // enable cookie-based authentication
                'class' => 'WebUser',
                'allowAutoLogin'=>true,
            ),
            // uncomment the following to enable URLs in path-format

            'urlManager'=>array(
                'urlFormat'=>'path',
                'showScriptName' => false,
                'urlSuffix' => '/',
                'rules'=>array(
                    '' => 'site/index',
                    'site/login' => 'usr/default/login',
                    'login' => 'usr/default/login',
                    'logout' => 'usr/default/logout',
                    'admin' => 'admin/summary',
                    //'admin/<controller:\w+>' => 'admin/<controller>/index',
                    //'<controller:\w+>/<id:\d+>'=>'<controller>/view',
                    //'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                    //'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                ),
            ),
            'contentCompactor' => array(
                'class' => 'ext.contentCompactor.ContentCompactor',
                'options' => array(
                    'compress_css' => false, // Compress CSS
                    'strip_comments' => !YII_DEBUG, // Remove comments
                    'keep_conditional_comments' => !YII_DEBUG, // Remove conditional comments
                    'compress_horizontal' => !YII_DEBUG, // Compress horizontally
                    'compress_vertical' => !YII_DEBUG, // Compress vertically
                    'compress_scripts' => !YII_DEBUG, // Compress inline scripts using basic algorithm
                    'line_break' => PHP_EOL, // The type of rowbreak you use in your document
                    'preserved_tags' => array('textarea', 'pre', 'script', 'style', 'code'),
                    'preserved_boundry' => '@@PRESERVEDTAG@@',
                    'conditional_boundries' => array('@@IECOND-OPEN@@', '@@IECOND-CLOSE@@'),
                    'script_compression_callback' => false,
                    'script_compression_callback_args' => array(),
                ),
            ),
            'clientScript' => array(
                'class' => 'application.extensions.yii-EClientScript.EClientScript',
                'combineScriptFiles' => !YII_DEBUG, // By default this is set to true, set this to true if you'd like to combine the script files
                'combineCssFiles' => !YII_DEBUG, // By default this is set to true, set this to true if you'd like to combine the css files
                'optimizeScriptFiles' => false, // @since: 1.1
                'useOptimizedScriptFiles' => !YII_DEBUG, //when optimized script files already exist. 'optimizeScriptFiles' must be false and 'optimizedScriptFileSuffix' must be defined.
                'optimizedScriptFileSuffix' => 'min', //when optimized script files already exist. Define minimized file extension.For example "jquery.js" and "jquery.min.js" when variable is set to "min"
                'optimizeCssFiles' => !YII_DEBUG, // @since: 1.1
                'optimizeInlineScript' => !YII_DEBUG, // @since: 1.6, This may case response slower
                'optimizeInlineCss' => !YII_DEBUG, // @since: 1.6, This may case response slower
            ),

            /*'db'=>array(
                'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
            ),*/
            // uncomment the following to use a MySQL database

            'db'=>array(
                'tablePrefix' => '',
                'connectionString' => 'mysql:host=localhost;dbname=providers',
                'emulatePrepare' => true,
                'username' => 'prod_user',
                'password' => 'prod_pass',
                'charset' => 'utf8',
                'enableParamLogging'=>true,
                'enableProfiling'=>true,
            ),

            'errorHandler'=>array(
                'errorAction'=>'site/error',
            ),
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'CFileLogRoute',
                        'levels'=>'error, warning',
                    ),
                ),
            ),
        ),

        // application-level parameters that can be accessed
        // using Yii::app()->params['paramName']
        'params'=>array(
            'siteURL'=>'providers.com.ua',
            'indexationRights' => 'index,follow',
            // this is used in contact page
            'adminEmail'=>'support@providers.com.ua',
            //base mail settings scope
            'emailSent' => array(
                'mailHost' => 'smtp.providers.com.ua',
                'mailPort' => 465, // Optional
                'ssl' => true, //Optional
                'user' => 'smtp.user@providers.com.ua',
                'pass' => 'smtp.pass',
                'defaultFrom' => array('support@providers.com.ua' => 'providers.com.ua заявка с сайта'), //Optional
            ),

            'roles' => array('admin', 'user', 'editor', 'accountManager'),

            //additional mail settings scope
            'emailToName' => 'providers.com.ua заявка с сайта ',
            'emailTo' => array('sell@providers.com.ua' => Yii::app()->params['emailToName']),

            'pageSize' => 10,
            'lastModify' => date(DATE_ATOM),
            'releaseDate' => date(DATE_ATOM, mktime(12, 0, 0, 1, 9, 2014)),
        ),
    ),
    file_exists($pathLocalConfig) ? require $pathLocalConfig : array()
);