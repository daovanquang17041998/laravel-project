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
Route::get('/index', ['as' => 'admin-index', 'uses' => 'Controller@getIndexAdmin']);

Route::group(['prefix' => 'category'], function () {

    Route::get('add', 'CategoryController@create');

    Route::post('add', 'CategoryController@store');

    Route::get('update/{id}', 'CategoryController@edit');

    Route::post('update/{id}', 'CategoryController@update');

    Route::get('list', 'CategoryController@index');

    Route::get('delete/{id}', "CategoryController@destroy");
});

Route::group(['prefix' => 'user'], function () {

    Route::get('add', 'UserController@create');

    Route::post('add', 'UserController@store');

    Route::get('list', 'UserController@index');

    Route::get('update/{id}', 'UserController@edit');

    Route::post('update/{id}', 'UserController@update');

    Route::get('delete/{id}', 'UserController@destroy');
});

Route::group(['prefix'=>'product'],function () {

    Route::get("add",'ProductController@create');

    Route::post("add",'ProductController@store');

    Route::get("list",'ProductController@index');

    Route::get("update/{id}","ProductController@edit");

    Route::post("update/{id}","ProductController@update");

    Route::get('delete/{id}',"ProductController@destroy");
});
Route::group(['prefix'=>'bill'],function (){

    Route::get("add",'BillController@create');

    Route::post("add",'BillController@store');

    Route::get('list','BillController@index');

    Route::get("update/{id}","BillController@edit");

    Route::post("update/{id}","BillController@update");

    Route::get('delete/{id}','BillController@destroy');
});
Route::group(['prefix'=>'detailbill'],function (){

    Route::get("add/{id}",'DetailBillController@create');

    Route::post("add/{id}",'DetailBillController@store');

    Route::get('list/{id}','DetailBillController@index');

    Route::get("update/{id}","DetailBillController@edit");

    Route::post("update/{id}","DetailBillController@update");

    Route::get('delete/{id}','DetailBillController@destroy');
});
