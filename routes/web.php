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

Route::get('/', 'BerandaController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/product/create', 'ProductController@create');

Route::post('/product', 'ProductController@store');

Route::get('/products/{productId}/detail', 'ProductController@detail')->name('products.detail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
