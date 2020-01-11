<?php

use yii\helpers\Html;
use \yii\web\Request;
use app\components\Setting;

Yii::setAlias('@webapp', rtrim(str_replace("public_html", "", (new Request)->getBaseUrl()),'/'));

$baseUrl = (new Request)->getBaseUrl();

$params = require_once __DIR__ . '/params.php';
$db = require_once __DIR__ . '/db.php';
require_once(__DIR__ . '/../components/Setting.php');
require_once(__DIR__ . '/../yii_helper.php');

$config = [
    'id' => 'basic',
    'name' => 'Rezvan',
    'basePath' => dirname(__DIR__),
    'language' => 'ar',
    'timeZone' => Setting::get('timeZone'),
//    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        'jquery.min.js'
                    ],
                ],
                'yii\jui\JuiAsset' => [
                    'js' => [
                        'jquery-ui.min.js'
                    ],
                    'css' => [
                        'themes/smoothness/jquery-ui.min.css'
                    ],
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [
                        'css/bootstrap.min.css'
                    ]
                ]
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'j5stjE4_Z4MGofmiwRkw0mxmR2Do2RNq',
            'baseUrl' => $baseUrl,
            'enableCsrfValidation'=>true,
            'enableCookieValidation'=>true,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
//            'enableSession' => true,
            'authTimeout' =>3600,
            'identityCookie' => ['name' => '_identity', 'httpOnly' => true],
        ],
//        'session' => [
//            'class' => 'yii\web\Session',
//            'name' => 'basic',
//            'timeout' => 3,
//        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'server380.bertina.biz',
                'username' => 'noreply@rezvan.info',
                'password' => ',4E8JZ*#;OD=',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'urlManager' => [
            'class' => 'app\components\MultilingualUrlManager',
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/english' => '/site/coming-soon',
                'dashboard'=>'user/dashboard',
                '<language:\w{2}>'=>'site/change-lang',
                '<language:\w{2}>/<controller:\w+>' => 'site/change-lang',
                '<language:\w+>/<controller:\w+>/<action:\w+>' => 'site/change-lang',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>/<title:.*>' => '<controller>/<action>',
                'request' => 'request/new',
                '<controller:\w+>' => '<controller>/index',
                '<language:\w{2}>/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ],
        ],
        'view' => [
            'theme' => [
                'basePath' => '@webroot/themes/frontend',
                'baseUrl' => '@web/themes/frontend',
            ]
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'i18n' => [
            'translations' => [
                'actions' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
                'words' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                ],
            ],
        ],
        'html2pdf' => [
            'class' => 'yii2tech\html2pdf\Manager',
            'viewPath' => '@app/pdf',
            'converter' => [
                'class' => 'yii2tech\html2pdf\converters\Wkhtmltopdf',
                'defaultOptions' => [
                    'pageSize' => 'A4'
                ],
            ]
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
        'generators' => [ //here
            'controller' => [ // generator name
                'class' => 'app\giigenerators\controller\Generator', // generator class
                'templates' => [ //setting for out templates
                    'dyna-multilingual' => '@app/giigenerators/controller/dynamultilingual', // template name => path to template
                ]
            ],
            'crud' => [ // generator name
                'class' => 'app\giigenerators\crud\Generator', // generator class
                'templates' => [ //setting for out templates
                    'dyna-multilingual' => '@app/giigenerators/crud/dynamultilingual', // template name => path to template
                ]
            ],
            'model' => [ // generator name
                'class' => 'app\giigenerators\model\Generator', // generator class
                'templates' => [ //setting for out templates
                    'dyna-multilingual' => '@app/giigenerators/model/dynamultilingual', // template name => path to template
                ]
            ]
        ],
    ];
}

return $config;