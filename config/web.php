<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Hello World',
//    'language' => 'de',
//    'defaultRoute' => 'my-article/hello-world',
    'layout' => 'main',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'test'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'K26zDedkZAvyMfnnb8qp8REWXNGIUurx',
            'parsers' => [
                'application/json' => \yii\web\JsonParser::class
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
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
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
            ],
        ],
        'assetManager' => [
            'class' => 'app\components\AssetManager',
//            'appendTimestamp' => true
        ],
//        'test' => [
//            'class' => 'app\components\TestComponent',
//        ],
//        'test' =>  'app\components\TestComponent',
        'test' => function(){
            return new \app\components\TestComponent();
        }
    ],
    'params' => $params,
//    'on beforeRequest' => function(){
//        echo '<pre>';
//        var_dump("From before request");
//        echo '</pre>';
//    }
//    'on beforeAction' => function(){
//        echo '<pre>';
//        var_dump("Application before action");
//        echo '</pre>';
//
//        Yii::$app->controller->on(\yii\web\Controller::EVENT_BEFORE_ACTION, function() {
//            echo '<pre>';
//            var_dump("Controller before action from ->on method");
//            echo '</pre>';
//        });
//    }
//    'on beforeAction' => function(){
//    echo Yii::$app->view->render('@app/views/page/about');
//    }
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
