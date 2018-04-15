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

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/panier', function () {
    return view('panier');
});
Route::post('/panier', function () {
    return view('panier');
});

Route::get('/panier.php', function () {

    return view('panier');
});
Route::post('/panier.php', function () {
    return view('panier');
});

Route::get('/panier/{id}', function () {
	$id = request('id');
	$_SESSION['panier']['qteProduit'][$id] = 0;
	return view('panier');
});
Route::post('/panier/{id}', function () {
	$id = request('id');
	$_SESSION['panier']['qteProduit'][$id] = 0;
	return view('panier');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('cart', 'CartController');
