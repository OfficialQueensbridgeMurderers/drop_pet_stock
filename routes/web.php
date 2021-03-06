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
Route::resource('shop', 'ShopController');
Route::resource('back', 'BackController');
Route::get('cart', 'CartController@index');
Route::get('profile', 'ProfileController@index');
Route::get('packages', 'PackagesController@index');
Route::get('packages/checkout', 'PackagesController@checkout');
Route::get('packages/available', 'PackagesController@available');
Route::get('packages/custom', 'PackagesController@custom');
Route::get('packages/custom/create', 'PackagesController@create');
Route::get('packages/custom/add/{id_package}/{id_produit}', 'PackagesController@add');
Route::get('packages/custom/toggle/{id}', 'PackagesController@toggle');
Route::get('packages/custom/update/{id}', 'PackagesController@update');
Route::get('packages/custom/remove/{id}', 'PackagesController@remove');
Route::get('packages/custom/delete/{id}', 'PackagesController@delete');
Route::get('packages/delivery_box', 'PackagesController@deliveryBox');
Route::get('/shop/item/{id}', 'ShopController@item');
Route::get('/shop/category/{category}', 'ShopController@category');
Route::get('/search',[
  'as' => 'api.search',
  'uses' => 'Api/SearchController@search'
]);
Route::get('/cart','CartController@index');
Route::get('/cart/add/{id}','CartController@ajouterArticle');
Route::get('/cart/sup/{id}','CartController@supprimerArticle');
Route::get('/cart/modifier/{id}','CartController@modifier');
Route::get('/cart/checkout','CartController@checkout');
