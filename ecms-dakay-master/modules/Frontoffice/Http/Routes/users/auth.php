<?php

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('user.login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('user.logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
Route::post('register', 'Auth\RegisterController@register');

// registration verification routes
Route::get('/user/activation/{code}', [
    'uses' => 'Auth\RegistrationActivateController@activate'
])->name('web.activation_url');

Route::post('/user/activation/{code}', [
    'uses' => 'Auth\RegistrationActivateController@activate_confirm'
]);

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('user.password_reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');