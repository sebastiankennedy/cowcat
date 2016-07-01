<?php
return [
    /* 后台登录页面背景图片 */
    'background-images'            => [
        '/assets/images/background/1.jpg',
        '/assets/images/background/2.jpg',
        '/assets/images/background/3.jpg',
        '/assets/images/background/4.jpg',
        '/assets/images/background/5.jpg',
        '/assets/images/background/8.jpg',
        '/assets/images/background/9.jpg',
        '/assets/images/background/10.jpg',
        '/assets/images/background/11.jpg',
        '/assets/images/background/12.jpg',
        '/assets/images/background/13.jpg',
        '/assets/images/background/14.jpg',
    ],
    /* 权限管理类型 */
    'permission-type'              => [
        'menu'   => '菜单权限',
        'action' => '操作权限',
    ],
    /* 操作管理类型 */
    'action-group'                 => [
        'menu'       => '菜单管理',
        'user'       => '用户管理',
        'role'       => '角色管理',
        'permission' => '权限管理',
        'action'     => '操作管理',
        'log'        => '日志管理',
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
];