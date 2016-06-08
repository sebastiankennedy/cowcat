<?php

$router->get('menu/search', ['as' => 'menu.search', 'uses' => 'MenuController@search', 'middleware' => ['search']]);
$router->resource('menu', 'MenuController');

$router->get('user/search', ['as' => 'user.search', 'uses' => 'UserController@search', 'middleware' => ['search']]);
$router->resource("user", 'UserController');

$router->get('role/search', ['as' => 'role.search', 'uses' => 'RoleController@search', 'middleware' => ['search']]);
$router->resource("role", 'RoleController');

$router->get('permission/search', ['as'         => 'permission.search', 'uses' => 'PermissionController@search',
                                   'middleware' => ['search'],
]);
$router->resource("permission", 'PermissionController');