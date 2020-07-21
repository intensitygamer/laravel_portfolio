<?php

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {

    Route::get('/locations', [
        'as' => 'admin.manage.locations',
        'uses' => 'Manage\LocationsController@index'
    ]);

    Route::get('/location', [
        'as' => 'admin.manage.location.create',
        'uses' => 'Manage\LocationsController@create'
    ]);

    Route::post('/location', [
        'as' => 'admin.manage.location.store',
        'uses' => 'Manage\LocationsController@store'
    ]);

    Route::get('/location/{id}', [
        'as' => 'admin.manage.location.edit',
        'uses' => 'Manage\LocationsController@edit'
    ]);

    Route::post('location/{id}', [
        'as' => 'admin.manage.location.update',
        'uses' => 'Manage\LocationsController@update'
    ]);

    Route::get('/location/{id}/destroy', [
        'as' => 'admin.manage.location.destroy',
        'uses' => 'Manage\LocationsController@destroy'
    ]);

});