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
Route::resource('cart', 'CartController');
Route::resource('shop', 'ShopController');
Route::get('/shop/item/{id}/{create}', 'ShopController@item');
Route::get('/shop/category/{category}', 'ShopController@category');
