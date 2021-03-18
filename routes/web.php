<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('config-clear', function(){
	Artisan::call('config:clear');
	return 'config cleared sucessfully';
});

Route::get('/', 'UserOrderController@index');
Route::get('cart', 'UserOrderController@cart');
Route::get('add-to-cart/{id}', 'UserOrderController@addToCart');
Route::patch('update-cart', 'UserOrderController@update');
Route::delete('remove-from-cart', 'UserOrderController@remove');


Auth::routes();

Route::get('/home', 'UserOrderController@index')->name('home');

/*********************************Admin Routes Start********************************************/
Route::get('dashboard', 'Admin\AdminController@dashboard')->name('dashboard');
Route::get('admin', 'Admin\AdminController@dashboard');

Route::get('product-list', 'Admin\ProductController@index');
Route::get('product-list/{id}/edit', 'Admin\ProductController@edit');
Route::post('product-list/store', 'Admin\ProductController@store');
Route::get('product-list/delete/{id}', 'Admin\ProductController@destroy');

Route::get('category-list', 'Admin\CategoryController@index');
Route::get('category-list/{id}/edit', 'Admin\CategoryController@edit');
Route::post('category-list/store', 'Admin\CategoryController@store');
Route::get('category-list/delete/{id}', 'Admin\CategoryController@destroy');

Route::get('order-list', 'Admin\OrderController@index');
/******************************************END********************************************************/

Route::get('checkout', 'UserOrderController@checkout')->name('checkout');
Route::post('/add-address', 'UserOrderController@addAddress')->name('add-address');


Route::get('/customer', function () {
   return redirect('/');
});