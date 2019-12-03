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
Route::get('/index',['as'=>'admin-index','uses'=>'Controller@getIndexAdmin']);
Route::group(['prefix'=>'user'],function (){

    Route::get('add','UserController@create');

    Route::post('add','UserController@store');

    Route::get('list','UserController@index');

    Route::get('update/{id}','UserController@edit');

    Route::post('update/{id}','UserController@update');

    Route::get('delete/{id}','UserController@destroy');
});
