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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail', 'DetailController@index')->name('detail');
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart/{option?}', 'CartController@cart');
Route::get('/get/cart', 'CartController@get');
Route::get('/get/courier', 'CartController@courier');
Route::get('/item/{option?}', 'ItemController@item')->name('item');
Route::get('/checkout', 'CartController@checkout')->name('checkout');
