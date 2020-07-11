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

    //Seller
// INDEX
    Route::get('seller', ['as' => 'seller.index', 'uses' => 'SellerController@index']);

// CREATE | STORE
    Route::get('seller/create', ['as' => 'seller.create', 'uses' => 'SellerController@create']);
    Route::post('seller', ['as' => 'seller.store', 'uses' => 'SellerController@store']);

// SHOW
    /*Route::get('seller/{id}', ['as' => 'seller.show', 'uses' => 'SellerController@show'])->where('id',
        '[0-9]+');*/

// EDIT | UPDATE
    Route::get('seller/{id}/edit', ['as' => 'seller.edit', 'uses' => 'SellerController@edit'])->where('id',
        '[0-9]+');
    Route::put('seller/{id}', ['as' => 'seller.update', 'uses' => 'SellerController@update'])->where('id',
        '[0-9]+');

// DELETE
    Route::delete('seller', ['as' => 'seller.destroy', 'uses' => 'SellerController@destroy']);

    Route::get('seller/status', ['as' => 'seller.status', 'uses' => 'SellerController@status']);


    //cities
// INDEX
    Route::get('office', ['as' => 'office.index', 'uses' => 'OfficeController@index']);

// CREATE | STORE
    Route::get('office/create', ['as' => 'office.create', 'uses' => 'OfficeController@create']);
    Route::post('office', ['as' => 'office.store', 'uses' => 'OfficeController@store']);

// SHOW
    /*Route::get('seller/{id}', ['as' => 'seller.show', 'uses' => 'OfficeController@show'])->where('id',
        '[0-9]+');*/

// EDIT | UPDATE
    Route::get('office/{id}/edit', ['as' => 'office.edit', 'uses' => 'OfficeController@edit'])->where('id',
        '[0-9]+');
    Route::put('office/{id}', ['as' => 'office.update', 'uses' => 'OfficeController@update'])->where('id',
        '[0-9]+');

// DELETE
    Route::delete('office', ['as' => 'office.destroy', 'uses' => 'OfficeController@destroy']);

    Route::get('office/status', ['as' => 'office.status', 'uses' => 'OfficeController@status']);

     //Product
// INDEX
    Route::get('product', ['as' => 'product.index', 'uses' => 'ProductController@index']);

// CREATE | STORE
    Route::get('product/create', ['as' => 'product.create', 'uses' => 'ProductController@create']);
    Route::post('product', ['as' => 'product.store', 'uses' => 'ProductController@store']);

// SHOW
    /*Route::get('seller/{id}', ['as' => 'seller.show', 'uses' => 'SellerController@show'])->where('id',
        '[0-9]+');*/

// EDIT | UPDATE
    Route::get('product/{id}/edit', ['as' => 'product.edit', 'uses' => 'ProductController@edit'])->where('id',
        '[0-9]+');
    Route::put('product/{id}', ['as' => 'product.update', 'uses' => 'ProductController@update'])->where('id',
        '[0-9]+');

// DELETE
    Route::delete('product', ['as' => 'product.destroy', 'uses' => 'ProductController@destroy']);

    Route::get('product/status', ['as' => 'product.status', 'uses' => 'ProductController@status']);
});
