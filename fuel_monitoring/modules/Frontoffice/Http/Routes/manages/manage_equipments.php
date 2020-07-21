<?php

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {

    Route::get('/equipments', [
        'as' => 'users.manage.equipments',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@index'
    ]);

    Route::get('/equipment', [
        'as' => 'users.manage.equipment.create',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@create'
    ]);

    Route::post('/equipment', [
        'as' => 'users.manage.equipment.store',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@store'
    ]);

    Route::get('/equipment/{id}', [
        'as' => 'users.manage.equipment.edit',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@edit'
    ]);

    Route::post('equipment/{id}', [
        'as' => 'users.manage.equipment.update',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@update'
    ]);

    Route::get('/equipment/{id}/destroy', [
        'as' => 'users.manage.equipment.destroy',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@destroy'
    ]);

    /**
     *
     * upload photos
     */

    Route::post('/equipment/store/image', [
        'as' => 'users.manage.equipment.store.image',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@store_image'
    ]);

    Route::get('/equipment/remove/image/{name}', [
        'as' => 'users.manage.equipment.remove.image',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@remove_image'
    ]);

    Route::get('/equipment/remove/image/storage/data/{name}', [
        'as' => 'users.manage.equipment.remove.image',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@remove_image_storage'
    ]);

    /**
     * Audit Equipment
     */
    Route::get('/equipment/audit/item', [
        'as' => 'users.manage.equipment.audit',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@audit_equipment'
    ]);

    Route::post('/equipment/audit/search/chart', [
        'as' => 'users.manage.equipment.audit.search.chart',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@audit_chart'
    ]);

});