<?php

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {

    Route::get('/subcontractors', [
        'as' => 'users.manage.subcontractors',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\SubContractorsController@index'
    ]);

    Route::get('/subcontractor', [
        'as' => 'users.manage.subcontractor.create',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\SubContractorsController@create'
    ]);

    Route::post('/subcontractor', [
        'as' => 'users.manage.subcontractor.store',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\SubContractorsController@store'
    ]);

    Route::get('/subcontractor/{id}', [
        'as' => 'users.manage.subcontractor.edit',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\SubContractorsController@edit'
    ]);

    Route::post('subcontractor/{id}', [
        'as' => 'users.manage.subcontractor.update',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\SubContractorsController@update'
    ]);

    Route::get('/subcontractor/{id}/destroy', [
        'as' => 'users.manage.subcontractor.destroy',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\SubContractorsController@destroy'
    ]);

});