<?php

Route::group(['middleware' => 'api', 'domain' => env('API_DOMAIN'), 'namespace' => 'Modules\Api\Http\Controllers'], function()
{
    Route::get('/', 'ApiController@index');
});
