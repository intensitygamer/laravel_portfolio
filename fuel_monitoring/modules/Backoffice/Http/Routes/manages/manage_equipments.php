<?php

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {

    Route::get('/equipments', [
        'as' => 'admin.manage.equipments',
        'uses' => 'Manage\EquipmentsController@index'
    ]);

    Route::get('/equipment', [
        'as' => 'admin.manage.equipment.create',
        'uses' => 'Manage\EquipmentsController@create'
    ]);

    Route::post('/equipment', [
        'as' => 'admin.manage.equipment.store',
        'uses' => 'Manage\EquipmentsController@store'
    ]);

    Route::get('/equipment/{id}', [
        'as' => 'admin.manage.equipment.edit',
        'uses' => 'Manage\EquipmentsController@edit'
    ]);

    Route::post('equipment/{id}', [
        'as' => 'admin.manage.equipment.update',
        'uses' => 'Manage\EquipmentsController@update'
    ]);

    Route::get('/equipment/{id}/destroy', [
        'as' => 'admin.manage.equipment.destroy',
        'uses' => 'Manage\EquipmentsController@destroy'
    ]);

    /**
     *
     * upload photos
     */

    Route::post('/equipment/store/image', [
        'as' => 'admin.manage.equipment.store.image',
        'uses' => 'Manage\EquipmentsController@store_image'
    ]);

    Route::get('/equipment/remove/image/{name}', [
        'as' => 'admin.manage.equipment.remove.image',
        'uses' => 'Manage\EquipmentsController@remove_image'
    ]);
});