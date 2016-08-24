<?php
Route::get('/', [
    'as'   => 'frontend.index.index',
    'uses' => 'IndexController@index',
]);

Route::post('/contact-us', [
    'as'   => 'frontend.index.contact-us',
    'uses' => 'IndexController@contactUs',
]);
