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
Auth::routes();

Route::get('/', 'HomepageController@index')->name('home');
Route::get('/category/{id}', 'HomepageController@load');

/**
 * Frontend route cart giỏ hàng
 */
Route::get('cart', 'Customer\CartController@index');
Route::post('cart/add', 'Customer\CartController@add');
Route::post('cart/update', 'Customer\CartController@update');
Route::post('cart/remove', 'Customer\CartController@remove');
Route::post('cart/clear', 'Customer\CartController@clear');

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
     * -----------Route admin  user------------
     * ----------------------------------------
     * ----------------------------------------
     */
    Route::get('user', 'Admin\UserController@index')->name('admin.user');
    Route::get('user/create','Admin\UserController@create')->name('admin.user.create');
    //post
    Route::post('user','Admin\UserController@store')->name('admin.user.store');
    Route::post('user/{id}/delete','Admin\UserController@destroy')->name('admin.user.delete');
    /**
     * -----------Route admin  order------------
     * ----------------------------------------
     * ----------------------------------------
     */
    Route::get('order', 'Admin\OrderController@index')->name('admin.order');
    Route::post('order/{id}/delete','Admin\OrderController@destroy')->name('admin.order.delete');
    //Route Anh
    Route::post('uploads', 'Admin\ImageController@uploadImage')->name('upload');
    Route::post('deleteImage', 'Admin\ImageController@deleteImage')->name('deleteImage');
    //Route thong tin ca nhan
    Route::get('profile', 'Admin\ProfileController@index')->name('admin.profile');
    Route::post('profile', 'Admin\ProfileController@update')->name('admin.profile.update');
    //Route thay doi password
    Route::get('password', 'Admin\ProfileController@password')->name('admin.password');
    Route::post('password', 'Admin\ProfileController@update')->name('admin.password.update');
});
