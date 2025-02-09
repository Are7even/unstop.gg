<?php

use codemix\localeurls\UrlManager;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'simplechat'],
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
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['/'],
        ],
        'bbuser' => [
            'class' => 'PhpBBWebUser',
            'loginUrl' => ['/'],
            'allowAutoLogin' => true, 
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'google' => [
                    'class' => 'yii\authclient\clients\Google',
                    'clientId' => '',
                    'clientSecret' => '',
                ],
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '',
                    'clientSecret' => '',
                ],
            ],
        ],
        'i18n' => [
            'translations' => [
                'admin' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/locale',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'admin' => 'admin.php'
                    ]
                ],
                'app*' => [
                    'class' => 'yii \ i18n \ PhpMessageSource',
                    'basePath' => '@app / locale',
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
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username' => '*************@gmail.com',
                'password' => '**********',
                'port' => '465', // Port 25 is a very common port too
                'encryption' => 'ssl', // It is often used, check your provider or mail server specs
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
            'class' => 'codemix\localeurls\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableLanguageDetection' => false,
            'rules' => [
                'thumbs/<path:.*>' => 'mm/thumb/thumb',
                '<controller>/<action>' => '<controller>/<action>',
                [
                    'class' => \yii\rest\UrlRule::class,
                    'controller' => ['v1/tournament'],
                    'prefix' => 'api',
                    'tokens' => [
                        '{tournamentId}' => '<tournamentId:\\w+>',
                        '{fightId}' => '<fightId:\\w+>'
                    ],
                    'extraPatterns' => [
                        'GET /' => 'tournaments',
                        'GET {tournamentId}' => 'tournament',
                        'GET {tournamentId}/brackets' => 'brackets',
                        'POST {tournamentId}/start' => 'start',
                        'PUT {tournamentId}/fights/{fightId}/status' => 'update-fight-status',
                        'PATCH {tournamentId}/fights/{fightId}/scores' => 'update-score'
                    ]
                ],
                // [
                //     'class' => \yii\rest\UrlRule::class,
                //     'controller' => ['v1/league'],
                //     'prefix' => 'api',
                //     'tokens' => [
                //         '{leagueId}' => '<leagueId:\\w+>',
                //     ],
                //     'extraPatterns' => [
                //         'GET /' => 'leagues',
                //         'GET {leagueId}/fights' => 'fights',
                //     ]
                // ]
            ],
            'languages' => ['ru', 'en'],
        ],
        'fs' => [
            'class' => 'creocoder\flysystem\LocalFilesystem',
            'path' => '@webroot/upload',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => function () {
                return \Yii::$app->user->isGuest ? ['guest'] : ['user'];
            },
        ],
        'phpBB' => [
            'class' => 'ext.phpBB.phpBB',
            'path' => 'webroot.forum',
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => 'main'
        ],
        'v1' => [
            'class' => 'app\modules\v1\Module'
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
        'simplechat' => [
            'class' => '\bubasuma\simplechat\Module',
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'v1/*',
            'site/*',
            'auth/*',
            'mm/*',
            // 'rbac/*',
            //'debug/*',
            'cabinet/*',
            'tournament/*',
            'chat/*',
            'top/*',
            'forum/*',
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
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
