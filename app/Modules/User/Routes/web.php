<?php

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
|
*/
// LOGIN
Route::get('/admin/login', ['as' => 'admin.login', 'uses' => 'AuthController@login']);
Route::post('admin/login', ['as' => 'admin.login.post', 'uses' => 'AuthController@authenticate']);

Route::get('/vendor/login', ['as' => 'vendor.login', 'uses' => 'AuthController@vendorLogin']);
Route::post('vendor/login', ['as' => 'vendor.login.post', 'uses' => 'AuthController@vendorAuthenticate']);

// LOGOUT
Route::get('admin/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

Route::get('/user-profile', ['as' => 'user.profile', 'uses' => 'UserController@profile'])->middleware('auth:admins');
Route::put('{id}/updateProfile', ['as' => 'user.updateProfile', 'uses' => 'UserController@updateProfile'])->where('id', '[0-9]+')->middleware('auth:admins');

//SOCIAL LOGIN
Route::get('/social-login/{provider}', ['as' => 'social.login', 'uses' => 'CustomerController@socialLogin']);
Route::get('/social-callback/{provider}', ['as' => 'social.callback', 'uses' => 'CustomerController@socialCallback']);


Route::group(['prefix' => 'admin', 'middleware' => ['auth:admins', 'admin', 'permission']], function () {
    Route::get('user-list-ajax', ['as' => 'user.list.ajax', 'uses' => 'UserController@getUserListAjax']);
    Route::group(['prefix' => 'role'], function () {
        //List
        Route::get('list', ['as' => 'role.index', 'uses' => 'RoleController@index']);

        ///CREATE
        Route::get('create', ['as' => 'role.create', 'uses' => 'RoleController@create']);
        Route::post('create', ['as' => 'role.store', 'uses' => 'RoleController@store']);

        // UPDATE
        Route::get('edit/{id}', ['as' => 'role.edit', 'uses' => 'RoleController@edit'])->where('id', '[0-9]+');
        Route::put('update/{id}', ['as' => 'role.update', 'uses' => 'RoleController@update'])->where('id', '[0-9]+');

        Route::get('delete/{id}', ['as' => 'role.delete', 'uses' => 'RoleController@delete']);
        Route::get('status', ['as' => 'role.status', 'uses' => 'RoleController@status']);

        // DELETE
        Route::delete('role', ['as' => 'role.destroy', 'uses' => 'RoleController@destroy']);

    });

    Route::group(['prefix' => 'user'], function () {

        Route::put('{id}/update', ['as' => 'user.update', 'uses' => 'UserController@update'])->where('id', '[0-9]+');
        //List
        Route::get('list', ['as' => 'user.index', 'uses' => 'UserController@index']);
        ///CREATE
        Route::get('create', ['as' => 'user.create', 'uses' => 'UserController@create']);
        Route::post('create', ['as' => 'user.store', 'uses' => 'UserController@store']);

        // UPDATE
        Route::get('{id}/edit', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
        Route::put('{id}/update', ['as' => 'user.update', 'uses' => 'UserController@update'])->where('id',
            '[0-9]+');
        // DELETE
        Route::delete('delete', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);
        Route::get('status', ['as' => 'user.status', 'uses' => 'UserController@status']);

        //change password
        Route::get('setting/change-password', ['as' => 'setting.change-password', 'uses' => 'AuthController@changePassword']);
        Route::POST('setting/update-password', ['as' => 'setting.update-password', 'uses' => 'AuthController@updatePassword']);

    });

    Route::group(['prefix' => 'customer'], function () {
        //List
        Route::get('list', ['as' => 'customer.index', 'uses' => 'CustomerController@index']);
        ///CREATE
        Route::get('create', ['as' => 'customer.create', 'uses' => 'CustomerController@create']);
        Route::post('create', ['as' => 'customer.store', 'uses' => 'CustomerController@store']);
        // UPDATE
        Route::get('{id}/edit', ['as' => 'customer.edit', 'uses' => 'CustomerController@edit']);
        Route::put('{id}/update', ['as' => 'customer.update', 'uses' => 'CustomerController@update'])->where('id', '[0-9]+');

        //View
        Route::get('{id}/view', ['as'=>'customer.view', 'uses'=>'CustomerController@show'])->where('id', '[0-9]+');

        // DELETE
        Route::delete('delete', ['as' => 'customer.destroy', 'uses' => 'CustomerController@destroy']);
        Route::get('status', ['as' => 'customer.status', 'uses' => 'CustomerController@status']);
        Route::get('verify/status', ['as' => 'customer.verify.status', 'uses' => 'CustomerController@verifyCustomer']);
    });

});

Route::get('admin/permission-denied', ['as' => 'permission.denied', 'uses' => 'AuthController@permissionDenied']);
