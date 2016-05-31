<?php

$router->get('menu/search', ['as' => 'menu.search', 'uses' => 'MenuController@search', 'middleware' => ['search']]);
$router->resource('menu', 'MenuController');

$router->get('user/search', ['as' => 'user.search', 'uses' => 'UserController@search', 'middleware' => ['search']]);
$router->resource("user", 'UserController');