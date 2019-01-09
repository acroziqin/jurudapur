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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'BerandaController@index')->name('beranda');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Route::get('/product/create', 'ProductController@create');

Route::post('/product', 'ProductController@store');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/products/{productId}/detail', 'ProductController@detail')->name('products.detail');
Route::get('/products/{productId}/order', 'ProductController@order')->name('products.order');

Route::get('login/{sevice}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{sevice}/callback', 'Auth\LoginController@handleProviderCallback');