<?php

use codemix\localeurls\UrlManager;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'sourceLanguage' => 'ru',
    'language' => 'ru',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'LKjmAuGCr3XVEWZmUEiqdFrBpUoV5dkH',
            'baseUrl' => '',
            'csrfParam' => '_csrf-app',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'user' => [
//            'identityClass' => 'app\models\User',
//            'enableAutoLogin' => true,
//            'loginUrl'=>['auth/login'],
//        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['auth/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '413438028153-7j7ogp33k4u93p29bjqkln3j9d5k2g1e.apps.googleusercontent.com',
                    'clientSecret' => 'VTaM2X1dIeNcegBlFiQsxvXl',
                ],
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '671984006835673',
                    'clientSecret' => 'a3f0a52345a72fea95fa1cec86c676ff',
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'admin' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'admin' => 'admin.php'
                    ]
                ],
                'app*' => [
                    'class' => 'yii \ i18n \ PhpMessageSource',
                    'basePath' => '@app / messages',
                    'sourceLanguage' => 'ru',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php'
                    ]
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
            'class' => 'codemix\localeurls\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableLanguageDetection' => false,
            'rules' => [
                'thumbs/<path:.*>' => 'mm/thumb/thumb',
                '<controller>/<action>' => '<controller>/<action>',
            ],
            'languages' => ['ru', 'en'],
        ],
        'fs' => [
            'class' => 'creocoder\flysystem\LocalFilesystem',
            'path' => '@webroot/upload',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => function(){
                return \Yii::$app->user->isGuest ? ['guest'] : ['user'];
            },
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'main'
        ],
        'rbac' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField' => 'id',
                    'usernameField' => 'username',
                ],
            ],
            'layout' => 'left-menu',
            'mainLayout' => '@app/modules/admin/views/layouts/main.php',
        ],
        'mm' => [
            'class' => 'iutbay\yii2\mm\Module',
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'auth/*',
        ]
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
    ];
}

return $config;
