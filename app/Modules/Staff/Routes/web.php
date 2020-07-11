<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admins','admin','permission'], function () {

    
    
    //Staff

    // INDEX
    Route::get('staff', ['as' => 'staff.index', 'uses' => 'StaffController@index']);

// CREATE | STORE
    Route::get('staff/create', ['as' => 'staff.create', 'uses' => 'StaffController@create']);
    Route::post('staff', ['as' => 'staff.store', 'uses' => 'StaffController@store']);

// SHOW
    /*Route::get('seller/{id}', ['as' => 'seller.show', 'uses' => 'StaffController@show'])->where('id',
        '[0-9]+');*/

// EDIT | UPDATE
    Route::get('staff/{id}/edit', ['as' => 'staff.edit', 'uses' => 'StaffController@edit'])->where('id',
        '[0-9]+');
    Route::put('staff/{id}', ['as' => 'staff.update', 'uses' => 'StaffController@update'])->where('id',
        '[0-9]+');


// DELETE
    Route::delete('staff', ['as' => 'staff.destroy', 'uses' => 'StaffController@destroy']);

    Route::get('staff/status', ['as' => 'staff.status', 'uses' => 'StaffController@status']);























});
