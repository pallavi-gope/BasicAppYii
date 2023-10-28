<?php

use yii\helpers\Url;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$db2 = require __DIR__ . '/db2.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),

    'layoutPath' => '@app/views/layouts',
    'layout' => 'main2',

    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],  
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'CQHdroxXKyIVlVdTtJpXjA6yMMMMY3JT',
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
        'db2' => $db2,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'index' => 'first/index',
                'info' => 'first/info',
                //PASS PARAMETERS IN THE ROUTE
                [
                    'pattern' => 'info/<category>/<key>/<other>',
                    'route' => 'first/info',
                    'defaults' => [
                        'category' => 'demo',
                        'key' => '123'
                    ]
                ],
                'dbconnection' => 'first/dbconnection'
            ],
        ],
        'common' => [
            'class' => 'app\components\CommonComponent',
            // 'class' => 'app\components\CommonComponent2',
        ],
      
    ],
    'params' => $params,
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
    //ATTACH BEHAVIOURS TO ALL THE CONTROLLERS
    // 'as MyBehavior' => [
    //     'class' => 'app\components\MyBehavior',
    //     'prop1' => '1',
    //     'prop2' => '2'
    // ],
   
    //RUN BEFORE ACTION GLOBALLY FOR ALL THE CONTROLLERS
    'on beforeAction' => function($event){
        echo 'Action id: ' . $event->action->id.'<br>';
        echo 'Action Controller: ' . $event->action->controller->id.'<br>';
        // if($event->action->controller->id == 'site'){
        //     Yii::$app->response->redirect(['first']);;
        // }
    },
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
