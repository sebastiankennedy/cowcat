<?php

// 登录认证
$router->get('auth/login', 'AuthController@getLogin');
$router->post('auth/login', 'AuthController@postLogin');
$router->get('auth/logout', 'AuthController@getLogout');

// 用户注册
$router->get('auth/register', 'AuthController@getRegister');
$router->post('auth/register', 'AuthController@postRegister');