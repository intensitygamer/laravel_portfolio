<?php

// Sub Contractor Works Routes...
Route::group(['middleware' => 'auth', 'prefix' => 'subcontractor/work'], function() {

    Route::get('/', 'SubContractorWork\SubContractorWorkController@index')->name('users.reports.subcontractorwork.index');

    Route::get('create', 'SubContractorWork\SubContractorWorkController@create_subcontractor_work')->name('users.reports.subcontractorwork.create');

    Route::post('store', 'SubContractorWork\SubContractorWorkController@store_subcontractor_work')->name('users.reports.subcontractorwork.store');

    Route::get('edit/{id}', 'SubContractorWork\SubContractorWorkController@edit_subcontractor_work')->name('users.reports.subcontractorwork.edit');
    
    // Route::post('edit/payment', 'SubContractorWork\SubContractorWorkController@update_subcontractor_work_payment')->name('users.reports.subcontractorwork.payment.update');

    Route::post('edit/{id}', 'SubContractorWork\SubContractorWorkController@update_subcontractor_work')->name('users.reports.subcontractorwork.update');

    Route::get('transaction/regenerate', 'SubContractorWork\SubContractorWorkController@regenerate_transaction')->name('users.reports.subcontractorwork.regenerate_transaction');


    Route::get('audit', 'SubContractorWork\SubContractorWorkController@audit')->name('users.reports.subcontractorwork.audit');
});