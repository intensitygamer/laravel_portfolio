<?php

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {

    Route::get('/locations', [
        'as' => 'users.manage.locations',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\LocationsController@index'
    ]);

    Route::get('/location', [
        'as' => 'users.manage.location.create',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\LocationsController@create'
    ]);

    Route::post('/location', [
        'as' => 'users.manage.location.store',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\LocationsController@store'
    ]);

    Route::get('/location/{id}', [
        'as' => 'users.manage.location.edit',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\LocationsController@edit'
    ]);

    Route::post('location/{id}', [
        'as' => 'users.manage.location.update',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\LocationsController@update'
    ]);

    Route::get('/location/{id}/destroy', [
        'as' => 'users.manage.location.destroy',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\LocationsController@destroy'
    ]);

});