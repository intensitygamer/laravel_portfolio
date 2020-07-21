<?php

/**
 * Authentication Routes
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

Route::post('login', 'Auth\LoginController@login');