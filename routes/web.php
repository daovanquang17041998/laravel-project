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
Route::get('/login-admin','LoginController@create')->name('login.create');

Route::post('/login-admin','LoginController@store')->name('login.store');

Route::get('/logout-admin','LogoutController@create')->name('logout.create');

Route::group(['prefix'=>'admin','middleware'=>'loginUser'],function(){

    Route::get('/index','Controller@getIndexAdmin')->name('index');

    Route::group(['prefix' => 'category'], function () {

        Route::get('create', 'CategoryController@create')->name('admin.category.create');

        Route::post('store', 'CategoryController@store')->name('admin.category.store');

        Route::get('index', 'CategoryController@index')->name('admin.category.index');

        Route::get('edit/{id}', 'CategoryController@edit')->name('admin.category.edit');

        Route::post('update/{id}', 'CategoryController@update')->name('admin.category.update');

        Route::get('destroy/{id}', "CategoryController@destroy")->name('admin.category.destroy');
    });

    Route::group(['prefix' => 'user'], function () {

        Route::get('create', 'UserController@create')->name('admin.user.create');

        Route::post('store', 'UserController@store')->name('admin.user.store');

        Route::get('index', 'UserController@index')->name('admin.user.index');

        Route::get('edit/{id}', 'UserController@edit')->name('admin.user.edit');

        Route::post('update/{id}', 'UserController@update')->name('admin.user.update');

        Route::get('destroy/{id}', 'UserController@destroy')->name('admin.user.destroy');
    });

    Route::group(['prefix'=>'product'],function () {

        Route::get("create",'ProductController@create')->name('admin.product.create');

        Route::post("store",'ProductController@store')->name('admin.product.store');

        Route::get("index",'ProductController@index')->name('admin.product.index');

        Route::get("edit/{id}","ProductController@edit")->name('admin.product.edit');

        Route::post("update/{id}","ProductController@update")->name('admin.product.update');

        Route::get('destroy/{id}',"ProductController@destroy")->name('admin.product.destroy');
    });
    Route::group(['prefix'=>'bill'],function (){

        Route::get("create",'BillController@create')->name('admin.bill.create');

        Route::post("store",'BillController@store')->name('admin.bill.store');

        Route::get('index','BillController@index')->name('admin.bill.index');

        Route::get("edit/{id}","BillController@edit")->name('admin.bill.edit');

        Route::post("update/{id}","BillController@update")->name('admin.bill.update');

        Route::get('destroy/{id}','BillController@destroy')->name('admin.bill.destroy');
    });
    Route::group(['prefix'=>'detailbill'],function (){

        Route::get("create/{id}",'DetailBillController@create')->name('admin.detailbill.create');

        Route::post("store/{id}",'DetailBillController@store')->name('admin.detailbill.store');

        Route::get('index/{id}','DetailBillController@index')->name('admin.detailbill.index');

        Route::get("edit/{id}","DetailBillController@edit")->name('admin.detailbill.edit');

        Route::post("update/{id}","DetailBillController@update")->name('admin.detailbill.update');

        Route::get('destroy/{id}','DetailBillController@destroy')->name('admin.detailbill.destroy');
    });

});
