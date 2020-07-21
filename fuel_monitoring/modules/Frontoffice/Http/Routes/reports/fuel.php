<?php

// Fuels Routes...
Route::group(['middleware' => 'auth', 'prefix' => 'fuel'], function() {

    Route::get('/', 'Fuel\FuelController@index')->name('users.reports.fuel.index');

    Route::get('use', 'Fuel\FuelController@use_fuel')->name('users.reports.fuel.use');
    Route::post('store/use', 'Fuel\FuelController@store_use_fuel')->name('users.reports.fuel.store_use');

    Route::get('stock', 'Fuel\FuelController@stock_fuel')->name('users.reports.fuel.stock');
    Route::post('store/stock', 'Fuel\FuelController@store_stock_fuel')->name('users.reports.fuel.store_stock');

    Route::get('edit/{id}/{type}', 'Fuel\FuelController@edit')->name('users.reports.fuel.edit');
    Route::post('edit/{id}/{type}', 'Fuel\FuelController@update')->name('users.reports.fuel.update');

    Route::get('transaction/regenerate', 'Fuel\FuelController@regenerate_transaction')->name('users.reports.fuel.regenerate_transaction');

    Route::get('delete/{id}', 'Fuel\FuelController@delete')->name('users.fuel.delete');

});