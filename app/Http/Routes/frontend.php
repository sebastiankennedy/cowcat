<?php
Route::get('/', [
    'as'   => 'frontend.index.index',
    'uses' => 'IndexController@index'
]);
