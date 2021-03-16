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

Route::get('/', function () {
    return view('welcome');
});
Route::get('config-clear', function(){
	Artisan::call('config:clear');
	return 'config cleared sucessfully';
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

/*Route::get('/admin', function(){
echo "Hello Admin";
})->middleware('admin');*/

Route::get('/customer', function(){
echo "Hello Customer";
})->middleware('customer');
/*Route::get('/admin', function () {
    return view('welcome');
});*/

Route::get('/customer', function () {
    return view('welcome');
});