<?php

// Stock Routes...
Route::group(['middleware' => 'auth', 'prefix' => 'stock'], function() {

    Route::get('/', 'Stock\StockController@index')->name('users.reports.stock.index');

});

