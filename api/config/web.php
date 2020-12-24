<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'DjFpGGOHox1RrsCfouiH_t6pvshTQ_0x',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                [ 'class' => 'yii\rest\UrlRule',
                    'controller' => 'cliente',
                    'extraPatterns' => [
                        'GET total' => 'total',//Total de clientes
                        'GET {id}/morada' => 'morada',//Morada de um certo cliente
                        'GET {id}/username' => 'username',//Username de um certo cliente
                        'GET datacr' => 'datacr',//Visualização da data em ordem crescente
                        'GET datadecr' => 'datadecr',//Visualização da data em ordem descrescente
                        'GET usernamecr' => 'usernamecr', //Visualização do username em ordem descrescente
                        'GET usernamedecr' => 'usernamedecr', //Visualização do username em ordem descrescente
                    ]
                ],
                [ 'class' => 'yii\rest\UrlRule', 'controller' => 'pedido'],
                [ 'class' => 'yii\rest\UrlRule', 'controller' => 'prato'],
                [ 'class' => 'yii\rest\UrlRule', 'controller' => 'restaurante'],
                [ 'class' => 'yii\rest\UrlRule', 'controller' => 'reserva'],
                [ 'class' => 'yii\rest\UrlRule', 'controller' => 'user']
            ],
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
    ];
}

return $config;
