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
Route::get('/syarat-ketentuan', ['as'=>'sdk', function(){
	return view('blog.syarat_ketentuan');
}]);
// Route::get('/product/create', 'ProductController@create');

// Route::post('/product', 'ProductController@store');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::put('/dashboard', 'ProfilController@update')->name('profil.edit');

Route::get('/product/{menu}/{id}/detail', 'ProductController@detail')->name('product.detail');
Route::get('/product/{menu}/{id}/order', 'ProductController@order')->name('product.order');
Route::put('/product/{id}/checkout', 'ProductController@checkout')->name('product.checkout');

Route::get('/dapur/{dapur_name}', 'DapurController@show')->name('dapur.show');

Route::get('login/{sevice}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{sevice}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/kecamatan', 'ProductController@kecamatanAjax')->name('kecamatan');

Route::resource('orders', 'OrdersController')->except([
    'index', 'create'
]);

Route::get('search', 'SearchController@search')->name('search');


Route::group([
	'prefix'     => 'admin',
    'namespace'  => 'Admin',
    'middleware' => ['auth','admin'],
    'as'         => 'admin.'
], function(){
	Route::get('/','AdminController@dashboard')->name('dashboard');
	Route::get('users','AdminController@users')->name('users');
	Route::get('users/data', 'UserListController@users')->name('users.data');
	Route::delete('users/{id}', 'UserListController@destroy')->name('users.delete');
	Route::get('pesanan','AdminController@pesanan')->name('pesanan');
	Route::get('pesanan/data','DaftarPesananController@pesanan')->name('pesanan.data');
	Route::get('pesanan/{id}', 'DaftarPesananController@show')->name('pesanan.show');
	Route::patch('pesanan/{id}', 'DaftarPesananController@markasdone')->name('pesanan.markasdone');
	Route::delete('pesanan/{id}', 'DaftarPesananController@destroy')->name('pesanan.delete');
	Route::get('menu','AdminController@dashboard')->name('menu');
});