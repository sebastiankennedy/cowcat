<?php
$router->get('/', function () {
    return view('backend.layout.main');
});

$router->group(['namespace'=>'Frontend'],function($router){
	require_once __DIR__.'/Routes/frontend.php';
});

$router->group(['namespace'=>'Backend', 'prefix'=>'admin', 'middleware'=>[]], function ($router) {
	require_once __DIR__.'/Routes/backend.php';
});
