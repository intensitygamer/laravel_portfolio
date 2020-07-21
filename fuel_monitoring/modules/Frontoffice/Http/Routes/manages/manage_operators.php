<?php

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {

    Route::get('/operators', [
        'as' => 'users.manage.operators',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\OperatorsController@index'
    ]);

    Route::get('/operator', [
        'as' => 'users.manage.operator.create',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\OperatorsController@create'
    ]);

    Route::post('/operator', [
        'as' => 'users.manage.operator.store',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\OperatorsController@store'
    ]);

    Route::get('/operator/{id}', [
        'as' => 'users.manage.operator.edit',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\OperatorsController@edit'
    ]);

    Route::post('operator/{id}', [
        'as' => 'users.manage.operator.update',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\OperatorsController@update'
    ]);

    Route::get('/operator/{id}/destroy', [
        'as' => 'users.manage.operator.destroy',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\OperatorsController@destroy'
    ]);

});