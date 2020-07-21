<?php

Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {

    Route::get('/users', [
        'as' => 'admin.manage.users',
        'uses' => 'Manage\UsersController@index'
    ]);

    Route::get('/user', [
        'as' => 'admin.manage.user.create',
        'uses' => 'Manage\UsersController@create'
    ]);

    Route::post('/user', [
        'as' => 'admin.manage.user.store',
        'uses' => 'Manage\UsersController@store'
    ]);

    Route::get('/user/{username}', [
        'as' => 'admin.manage.user.edit',
        'uses' => 'Manage\UsersController@edit'
    ]);

    // @todo should be put
    Route::post('user/{username}', [
        'as' => 'admin.manage.user.update',
        'uses' => 'Manage\UsersController@update'
    ]);

    Route::post('user/{username}/status', [
        'as' => 'admin.manage.update.status',
        'uses' => 'Manage\UsersController@update_status'
    ]);
});
