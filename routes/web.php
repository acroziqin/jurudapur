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

Route::get('/products/{menu}/{id}/detail', 'ProductController@detail')->name('products.detail');
Route::get('/products/{menu}/{id}/order', 'ProductController@order')->name('products.order');
Route::put('/products/{id}/checkout', 'ProductController@checkout')->name('products.checkout');

Route::get('/dapur/{dapur_name}', 'DapurController@show')->name('dapur.show');

Route::get('login/{sevice}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{sevice}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/kecamatan', 'ProductController@kecamatanAjax')->name('kecamatan');

Route::resource('orders', 'OrdersController')->except([
    'index', 'create'
]);