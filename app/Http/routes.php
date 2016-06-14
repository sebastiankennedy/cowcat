<?php
Route::get('/', function () {
    return view('backend.layout.main');
});

Route::group(['namespace' => 'Auth'], function () {
    require_once __DIR__ . '/Routes/auth.php';
});

Route::group(['namespace' => 'Frontend'], function () {
    require_once __DIR__ . '/Routes/frontend.php';
});

Route::group([
    'namespace'  => 'Backend',
    'middleware' => ['auth'],
], function () {
    require_once __DIR__ . '/Routes/backend.php';
});


