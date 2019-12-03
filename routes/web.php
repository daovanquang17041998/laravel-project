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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'user'],function (){

    Route::get('add','UserController@getAddUser');

    Route::post('add','UserController@postAddUser');

    Route::get('list','UserController@getListUser');

    Route::get('update/{id}','UserController@getUpdateUser');

    Route::post('update/{id}','UserController@postUpdateUser');

    Route::get('xoa/{id}','UserController@getDelUser');
});
