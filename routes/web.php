<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', function () {
//    return view('welcome');
//});

//filemanager
Route::get('standalone-filemanager/{filed_id}/{type?}', ['as' => 'standalone-filemanager','middleware'=>['auth:admins','admin'] ,'uses' => 'FileManagerController@standalone']);
Route::post('upload/image', ['as' => 'uploadImage','middleware'=>['auth:admins','admin'] , 'uses' => 'FileManagerController@uploadImage']);
