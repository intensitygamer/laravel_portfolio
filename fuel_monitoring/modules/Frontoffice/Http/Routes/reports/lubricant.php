<?php

// Lubricants Routes...
Route::group(['middleware' => 'auth', 'prefix' => 'lubricant'], function() {

    Route::get('/', 'Lubricant\LubricantController@index')->name('users.reports.lubricant.index');

    Route::get('use', 'Lubricant\LubricantController@use_lube')->name('users.reports.lubricant.use');
    Route::post('store/use', 'Lubricant\LubricantController@store_use_lube')->name('users.reports.lubricant.store_use');

    Route::get('stock', 'Lubricant\LubricantController@stock_lube')->name('users.reports.lubricant.stock');
    Route::post('store/stock', 'Lubricant\LubricantController@store_stock_lube')->name('users.reports.lubricant.store_stock');

    Route::get('edit/{id}/{type}', 'Lubricant\LubricantController@edit')->name('users.reports.lubricant.edit');
    Route::post('edit/{id}/{type}', 'Lubricant\LubricantController@update')->name('users.reports.lubricant.update');

    Route::get('transaction/regenerate', 'Lubricant\LubricantController@regenerate_transaction')->name('users.reports.lubricant.regenerate_transaction');

});