<?php
// 登录认证
Route::get('auth/login', 'AuthController@getLogin');
Route::post('auth/login', 'AuthController@postLogin');
Route::get('auth/logout', 'AuthController@getLogout');

// 用户注册
Route::get('auth/register', 'AuthController@getRegister');
Route::post('auth/register', 'AuthController@postRegister');