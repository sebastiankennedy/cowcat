<?php
/* 菜单管理模块 */
Route::get('menu/search', [
    'as'         => 'menu.search',
    'uses'       => 'MenuController@search',
    'middleware' => ['search'],
]);
Route::resource('menu', 'MenuController');

/* 用户管理模块 */
Route::get('user/search', [
    'as'         => 'user.search',
    'uses'       => 'UserController@search',
    'middleware' => ['search'],
]);
Route::resource("user", 'UserController');

/* 角色管理模块 */
Route::get('role/search', [
    'as'         => 'role.search',
    'uses'       => 'RoleController@search',
    'middleware' => ['search'],
]);
Route::get('role/permission', [
    'as'   => 'role.permission',
    'uses' => 'RoleController@permission',
]);
Route::post('role/savePermission', [
    'as'   => 'role.save.permission',
    'uses' => 'RoleController@savePermission',
]);
Route::resource("role", 'RoleController');

/* 权限管理模块 */
Route::post('permission/associateMenus', [
    'as'   => 'permission.associate.menus',
    'uses' => 'PermissionController@associateMenus',
]);
Route::get('permission/search', [
    'as'         => 'permission.search',
    'uses'       => 'PermissionController@search',
    'middleware' => ['search'],
]);
Route::resource("permission", 'PermissionController');