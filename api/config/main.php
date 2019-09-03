<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser'
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-api', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the api
            'name' => 'advanced-api',
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
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'GET /api/lichnost' => 'lichnost/get-lichnost',
                'POST /api/lichnost' => 'lichnost/add-lichnost',
                'GET /api/lichnost/<id>' => 'lichnost/get-lichnost-by-id',
                'PUT /api/lichnost/<id>' => 'lichnost/update-lichnost',
                'DELETE /api/lichnost/<id>' => 'lichnost/delete-lichnost',

                'GET /api/lichnost/<id>/dokument' => 'dokument/get-lichnost-documents',
                'POST /api/lichnost/<id>/dokument' => 'dokument/add-lichnost-document',
                'GET /api/lichnost/<lid>/dokument/<did>' => 'dokument/get-lichnost-document-by-id',
                'PUT /api/lichnost/<lid>/dokument/<did>' => 'dokument/update-lichnost-document',
                'DELETE /api/lichnost/<lid>/dokument/<did>' => 'dokument/delete-lichnost-document',
            ],
        ],
    ],
    'params' => $params,
];
