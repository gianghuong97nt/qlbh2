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
    Route::get('category/create','Admin\CategoryController@create')->name('admin.category.create');
    Route::get('category/{id}/edit','Admin\CategoryController@edit')->name('admin.category.edit');
//    post
    Route::post('category','Admin\CategoryController@store')->name('admin.category.store');
    Route::post('category/{id}','Admin\CategoryController@update')->name('admin.category.update');
    Route::post('category/{id}/delete','Admin\CategoryController@destroy')->name('admin.category.delete');
    /**
     * -----------Route admin  product------------
     * ----------------------------------------
     * ----------------------------------------
     */
    Route::get('product', 'Admin\ProductController@index')->name('admin.product');
    Route::get('product/create','Admin\ProductController@create')->name('admin.product.create');
    Route::get('product/{id}/edit','Admin\ProductController@edit')->name('admin.product.edit');
    //post
    Route::post('product','Admin\ProductController@store')->name('admin.product.store');
    Route::post('product/{id}','Admin\ProductController@update')->name('admin.product.update');
    Route::post('product/{id}/delete','Admin\ProductController@destroy')->name('admin.product.delete');
    /**
     * -----------Route admin  order------------
     * ----------------------------------------
     * ----------------------------------------
     */
    Route::get('order', 'Admin\OrderController@index')->name('admin.order');
    Route::get('order/{id}/delete','Admin\OrderController@delete')->name('admin.order.delete');
    Route::post('order/{id}/delete','Admin\OrderController@destroy')->name('admin.order.delete');
});
