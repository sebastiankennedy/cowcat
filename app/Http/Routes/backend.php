<?php

/* 菜单管理模块 */
Route::get('menu/search', [
    'as'         => 'backend.menu.search',
    'uses'       => 'MenuController@search',
    'middleware' => ['search'],
]);
Route::resource('menu', 'MenuController');

/* 用户管理模块 */
Route::get('user/search', [
    'as'         => 'backend.user.search',
    'uses'       => 'UserController@search',
    'middleware' => ['search'],
]);
Route::resource("user", 'UserController');

/* 角色管理模块 */
Route::get('role/search', [
    'as'         => 'backend.role.search',
    'uses'       => 'RoleController@search',
    'middleware' => ['search'],
]);
Route::get('role/permission/{id}', [
    'as'   => 'backend.role.permission',
    'uses' => 'RoleController@permission',
]);
Route::post('role/associatePermission', [
    'as'   => 'backend.role.associate.permission',
    'uses' => 'RoleController@associatePermission',
]);
Route::resource("role", 'RoleController');

/* 权限管理模块 */
Route::get('permission/associate/{id}', [
    'as'   => 'backend.permission.associate',
    'uses' => 'PermissionController@associate',
]);
Route::post('permission/associateMenus', [
    'as'   => 'backend.permission.associate.menus',
    'uses' => 'PermissionController@associateMenus',
]);
Route::post('permission/associateActions', [
    'as'   => 'backend.permission.associate.actions',
    'uses' => 'PermissionController@associateActions',
]);
Route::get('permission/search', [
    'as'         => 'backend.permission.search',
    'uses'       => 'PermissionController@search',
    'middleware' => ['search'],
]);
Route::resource("permission", 'PermissionController');

/* 操作管理模块 */
Route::get('action/search', [
    'as'         => 'backend.action.search',
    'uses'       => 'ActionController@search',
    'middleware' => ['search'],
]);
Route::resource('action', 'ActionController');

