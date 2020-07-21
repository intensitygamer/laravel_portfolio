<?php

Route::group(['middleware' => 'auth', 'prefix' => 'self'], function() {

    Route::get('/profile', 'Auth\ProfileController@profile')->name('users.self.profile');
    Route::get('/password', 'Auth\ProfileController@change_password')->name('users.self.change_password');


    Route::post('/profile', 'Auth\ProfileController@update_profile')->name('users.self.update_profile');
    Route::post('/password', 'Auth\ProfileController@update_password')->name('users.self.update_password');

});