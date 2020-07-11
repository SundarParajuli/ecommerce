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

Route::group(['prefix' => 'admin','middleware' => [ 'auth:admins','admin','permission']], function () {

    Route::get('create', ['as' => 'setting.create', 'uses' => 'SettingController@create']);
    Route::post('store', ['as' => 'setting.store', 'uses' => 'SettingController@store']);

    Route::get('cache/clear', ['as' => 'cache.clear', 'uses' => 'SettingController@cacheClear']);
    Route::get('cache/clear/{cache_name}', ['as' => 'cache.clear.by.name', 'uses' => 'SettingController@cacheClearByName']);
});
