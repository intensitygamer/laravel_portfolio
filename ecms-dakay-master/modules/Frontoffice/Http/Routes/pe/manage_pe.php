<?php

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {

    Route::get('pe/{page}/{type}', [
        'as' => 'users.manage.pe',
        'uses' => 'PE\PEController@index'
    ]);

    Route::post('pe/{page}/{type}', [
        'as' => 'users.manage.process',
        'uses' => 'PE\PEController@process'
    ]);

    Route::get('pe/complete', [
        'as' => 'users.manage.get.process',
        'uses' => 'PE\PEController@complete'
    ]);
});