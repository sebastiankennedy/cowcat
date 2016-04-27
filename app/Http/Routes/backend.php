<?php
$router->get('menu/search',['as'=>'menu.search','uses'=>'MenuController@search','middleware'=>['search']]);
$router->resource('menu','MenuController');
