<?php

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {

    Route::get('/operators', [
        'as' => 'admin.manage.operators',
        'uses' => 'Manage\OperatorsController@index'
    ]);

    Route::get('/operator', [
        'as' => 'admin.manage.operator.create',
        'uses' => 'Manage\OperatorsController@create'
    ]);

    Route::post('/operator', [
        'as' => 'admin.manage.operator.store',
        'uses' => 'Manage\OperatorsController@store'
    ]);

    Route::get('/operator/{id}', [
        'as' => 'admin.manage.operator.edit',
        'uses' => 'Manage\OperatorsController@edit'
    ]);

    Route::post('operator/{id}', [
        'as' => 'admin.manage.operator.update',
        'uses' => 'Manage\OperatorsController@update'
    ]);

    Route::get('/operator/{id}/destroy', [
        'as' => 'admin.manage.operator.destroy',
        'uses' => 'Manage\OperatorsController@destroy'
    ]);

});