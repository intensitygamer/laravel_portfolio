<?php

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {

    Route::get('/projects', [
        'as' => 'users.manage.projects',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\ProjectsController@index'
    ]);

    Route::get('/project', [
        'as' => 'users.manage.equipment.create',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\ProjectsController@create'
    ]);

    Route::post('/projects', [
        'as' => 'users.manage.equipment.store',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\ProjectsController@store'
    ]);

    Route::get('/project/{id}', [
        'as' => 'users.manage.project.edit',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\ProjectsController@edit'
    ]);

    Route::post('project/{id}', [
        'as' => 'users.manage.project.update',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\ProjectsController@update'
    ]);

    // Route::get('/equipment/{id}/destroy', [
    //     'as' => 'users.manage.equipment.destroy',
    //     'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@destroy'
    // ]);

    // /**
    //  *
    //  * upload photos
    //  */

    // Route::post('/equipment/store/image', [
    //     'as' => 'users.manage.equipment.store.image',
    //     'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@store_image'
    // ]);

    // Route::get('/equipment/remove/image/{name}', [
    //     'as' => 'users.manage.equipment.remove.image',
    //     'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@remove_image'
    // ]);

    // Route::get('/equipment/remove/image/storage/data/{name}', [
    //     'as' => 'users.manage.equipment.remove.image',
    //     'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@remove_image_storage'
    // ]);

    // /**
    //  * Audit Equipment
    //  */
    // Route::get('/equipment/audit/item', [
    //     'as' => 'users.manage.equipment.audit',
    //     'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@audit_equipment'
    // ]);

    // Route::post('/equipment/audit/search/chart', [
    //     'as' => 'users.manage.equipment.audit.search.chart',
    //     'uses' => '\Modules\Backoffice\Http\Controllers\Manage\EquipmentsController@audit_chart'
    // ]);
});