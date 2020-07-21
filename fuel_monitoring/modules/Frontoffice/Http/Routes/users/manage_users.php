<?php

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {

    Route::get('/users', [
        'as' => 'users.manage.users',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\UsersController@index'
    ]);

    Route::get('/user', [
        'as' => 'users.manage.user.create',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\UsersController@create'
    ]);

    Route::post('/user', [
        'as' => 'users.manage.user.store',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\UsersController@store'
    ]);

    Route::get('/user/{username}', [
        'as' => 'users.manage.user.edit',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\UsersController@edit'
    ]);

    // @todo should be put
    Route::post('user/{username}', [
        'as' => 'users.manage.user.update',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\UsersController@update'
    ]);

    Route::post('user/{username}/status', [
        'as' => 'users.manage.update.status',
        'uses' => '\Modules\Backoffice\Http\Controllers\Manage\UsersController@update_status'
    ]);
});
