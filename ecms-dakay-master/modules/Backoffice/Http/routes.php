<?php

Route::group(['middleware' => 'web', 'domain' => env('BACKOFFICE_DOMAIN'), 'namespace' => 'Modules\Backoffice\Http\Controllers'], function()
{

    /**
     * Get captcha function
     */
    // Route::get('/captcha', function (){
    //     return captcha_src('login');
    // });


    /**
     * Global frontend routes only
     */
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/', [
            'uses' => 'BackofficeController@index',
            'as' => 'admin.home'
        ]);

        Route::get('/dashboard', [
            'uses' => 'BackofficeController@index',
            'as' => 'admin.dashboard'
        ]);

        /**
         * temporary
         */
        //fuel button
        Route::get('/use/fuel', function(){
            return view('modules.frontoffice.fuel.use_fuel');
        })->name('admin.use.fuel');
        Route::get('/stock/fuel', function(){
            return view('modules.frontoffice.fuel.stock_fuel');
        })->name('admin.stock.fuel');

        //lubricant button
        Route::get('/use/lube', function(){
            return view('modules.frontoffice.lubricant.use_lube');
        })->name('admin.use.lube');
        Route::get('/stock/lube', function(){
            return view('modules.frontoffice.lubricant.stock_lube');
        })->name('admin.stock.lube');
    });

    /**
     * Monitoring routes
     */
    require "Routes/pages/stock.php";
    require "Routes/pages/fuel.php";
    require "Routes/pages/lubricant.php";
    require "Routes/pages/subcontractor.php";
    require "Routes/pages/equipment_analytics.php";

    /**
     * Managing routes
     */
    require "Routes/manages/manage_locations.php";
    require "Routes/manages/manage_operators.php";
    require "Routes/manages/manage_equipments.php";

    /**
     * User Routes
     */
    require "Routes/users/auth.php";
    require "Routes/users/manage_users.php";
});