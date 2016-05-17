<?php
$router->get('/', function () {
    return view('backend.layout.main');
});

$router->group(['namespace'=>'Auth'],function($router){
    require_once __DIR__.'/Routes/auth.php';
});

$router->group(['namespace'=>'Frontend'],function($router){
	require_once __DIR__.'/Routes/frontend.php';
});

$router->group(['namespace'=>'Backend','middleware'=>[]], function ($router) {
	require_once __DIR__.'/Routes/backend.php';
});
