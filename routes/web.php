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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function (){
    //gom nhóm cho các route phần admin
    //URL site/admin/

    /**
     * -----------Route admin authentication------------
     * ----------------------------------------
     * ----------------------------------------
     */
    Route::get('/','AdminController@index')->name('admin.dashboard');

    /**
     * //URL authem.com/admin/dashboard
     * Route ddang nhap thanh cong
     */

    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');


    /**
     * -----------Route admin category------------
     * ----------------------------------------
     * ----------------------------------------
     */
    Route::get('category','Admin\CategoryController@index')->name('admin.category');
    Route::get('category/create','Admin\CategoryController@create');
    Route::get('category/{id}/edit','Admin\CategoryController@edit');
    Route::get('category/{id}/delete','Admin\CategoryController@delete');


    Route::post('category','Admin\CategoryController@store');
    Route::post('category/{id}','Admin\CategoryController@update');
    Route::post('category/{id}/delete','Admin\CategoryController@destroy');
    

    /**
     * -----------Route admin  product------------
     * ----------------------------------------
     * ----------------------------------------
     */


    Route::get('product', 'Admin\ProductController@index')->name('admin.product');
    Route::get('product/create','Admin\ProductController@create');
    Route::get('product/{id}/edit','Admin\ProductController@edit');
    Route::get('product/{id}/delete','Admin\ProductController@delete');


    Route::post('product','Admin\ProductController@store');
    Route::post('product/{id}','Admin\ProductController@update');
    Route::post('product/{id}/delete','Admin\ProductController@destroy');

    /**
     * -----------Route admin  order------------
     * ----------------------------------------
     * ----------------------------------------
     */


    Route::get('order', 'Admin\OrderController@index')->name('admin.order');
    Route::get('order/{id}/delete','Admin\OrderController@delete');
    Route::post('order/{id}/delete','Admin\OrderController@destroy');

});
