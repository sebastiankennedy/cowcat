<?php
return [
    /* 后台登录页面背景图片 */
    'background-images'            => [
        '/assets/images/background/1.jpg',
        '/assets/images/background/2.jpg',
        '/assets/images/background/3.jpg',
        '/assets/images/background/4.jpg',
        '/assets/images/background/5.jpg',
        '/assets/images/background/6.jpg',
        '/assets/images/background/7.jpg',
        '/assets/images/background/8.jpg',
        '/assets/images/background/9.jpg',
        '/assets/images/background/10.jpg',
        '/assets/images/background/11.jpg',
        '/assets/images/background/12.jpg',
        '/assets/images/background/13.jpg',
    ],
    /* 权限管理类型 */
    'permission-type'              => [
        'menu'   => '菜单权限',
        'action' => '操作权限',
    ],
    /* 操作管理类型 */
    'action-group'                 => [
        'backend'  => '后台操作',
        'frontend' => '前端操作',
        'api'      => '接口操作',
    ],
    /* 无需验证的操作 */
    'without-verification-actions' => [
        'Closure',
        'App\Http\Controllers\Auth\AuthController@getLogin',
        'App\Http\Controllers\Auth\AuthController@postLogin',
        'App\Http\Controllers\Auth\AuthController@getLogout',
        'App\Http\Controllers\Auth\AuthController@getRegister',
        'App\Http\Controllers\Auth\AuthController@postRegister',
        'Barryvdh\Debugbar\Controllers\OpenHandlerController@handle',
        'Barryvdh\Debugbar\Controllers\OpenHandlerController@clockwork',
        'Barryvdh\Debugbar\Controllers\AssetController@css',
        'Barryvdh\Debugbar\Controllers\AssetController@js',
    ],
    /* 禁用的控制器成员方法 */
    'without-verification-methods' => [

    ],
];