<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-home',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    /* 默认路由 */
    'defaultRoute' => 'index',
    /* 控制器默认命名空间 */
    'controllerNamespace' => 'home\controllers',
    /* 子模块 */
    'modules' => [
        'user' => [
            'class' => 'home\modules\user\Module',
            'defaultRoute' => 'index',
        ],
        'weixin' => [
            'class' => 'home\modules\weixin\Module',
            'defaultRoute' => 'index',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'home\models\User',
            'enableAutoLogin' => true,
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
        'errorHandler' => [
            'errorAction' => 'public/404',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

    ],
    'params' => $params,
];
