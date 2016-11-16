<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'language' => 'ru-RU',
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'mymessages' => [
            //Обязательно
            'class'    => 'frontend\modules\msg\components\MyMessages',
            //не обязательно
            //класс модели пользователей
            //по-умолчанию \Yii::$app->user->identityClass
            'modelUser' => 'frontend\models\user\UserDec',
            //имя контроллера где разместили action
            'nameController' => 'msg/default',
            //не обязательно
            //имя поля в таблице пользователей которое будет использоваться в качестве имени
            //по-умолчанию username
            'attributeNameUser' => 'username',
            //не обязательно
            //можно указать роли и/или id пользователей которые будут видны в списке контактов всем кто не подпадает
            //в эту выборку, при этом указанные пользователи будут и смогут писать всем зарегестрированным пользователям
            'admins' => [],
            //не обязательно
            //включение возможности дублировать сообщение на email
            //для работы данной функции в проектк должна быть реализована отправка почты штатными средствами фреймворка
            'enableEmail' => false,
            //задаем функцию для возврата адреса почты
            //в качестве аргумента передается объект модели пользователя
            'getEmail' => function($user_model) {
                return $user_model->email;
            },
            //задаем функцию для возврата лого пользователей в списке контактов (для виджета cloud)
            //в качестве аргумента передается id пользователя
            'getLogo' => function($user_id) {
                return '\img\ghgsd.jpg';
            },
            //указываем шаблоны сообщений, в них будет передаваться сообщение $message
            'templateEmail' => [
                'html' => 'private-message-text',
                'text' => 'private-message-html'
            ],
            //тема письма
            'subject' => 'Private message'
        ],
        /*'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],*/

        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],

        'authClientCollection' => [
            'class'   => \yii\authclient\Collection::className(),

            'clients' => [
                'vkontakte' => [
                    'class'        => 'dektrium\user\clients\VKontakte',
                    'clientId'     => '5729753',
                    'clientSecret' => 'nLJvTIrdxPmPCBd4C3KH',
                    'title' => '',
                ],
                'facebook' => [
                    'class'        => 'dektrium\user\clients\Facebook',
                    'clientId'     => '196876797387091',
                    'clientSecret' => 'f098d493aed54505227d4ef1f094ef32',
                    'title' => '',
                ],
                'twitter' => [
                    'class'          => 'dektrium\user\clients\Twitter',
                    'consumerKey'    => 'kMykWSokfmYUhNwCuRTAPQUpO',
                    'consumerSecret' => 'vvAFL8lpYugctQ5IiRV5ohGNXs7ojK0IAZNCDTJiodZPNciY2M',
                    'title'          => '',
                ],
                'google' => [
                    'class'        => 'dektrium\user\clients\Google',
                    'clientId'     => '153414607886-k1ddcest7dkg37fjvg8a3m0d2c0plmkk.apps.googleusercontent.com',
                    'clientSecret' => 'X0KKXjsMgeYsnhXKT3YqfGlo',
                    'title'          => '',
                ],
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request'      => [
            'baseUrl' => '',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'mainpage/mainpage',
                'registration' => '/user/registration/register',
                'forgot' => '/user/recovery/request',
                'resend' => '/user/registration/resend',
                'profile' => '/user/settings/profile',
                'login' => '/user/security/login',

                'ads-add' => 'adsmanager/adsmanager/create',

                'all-ads' => 'adsmanager/adsmanager/index',
                'all-ads/<page:\d+>' => 'adsmanager/adsmanager/index',
                'all-ads/<slug>' => 'adsmanager/adsmanager/index',
                'all-ads/<slug>/<page:\d+>' => 'adsmanager/adsmanager/index',
                'ads/<slug>' => 'adsmanager/adsmanager/view',
                'help' => 'help/default',
                'help/<slug>' => 'help/default/view',
                'help/category/<id>' => 'help/default/category'
            ]
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],
    ],

    'modules' => [
        'mainpage' => [
            'class' => 'frontend\modules\mainpage\Mainpage',
        ],
        'adsmanager' => [
            'class' => 'frontend\modules\adsmanager\Adsmanager',
        ],
        'favorites' => [
            'class' => 'frontend\modules\favorites\Favorites',
        ],
        'personal_area' => [
            'class' => 'frontend\modules\personal_area\PersonalArea',
        ],
        'msg' => [
            'class' => 'frontend\modules\msg\Msg',
        ],
        'help' => [
            'class' => 'frontend\modules\help\Help',
        ],
    ],
    'params' => $params,
];
