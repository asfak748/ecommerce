<?php

use Illuminate\Support\Facades\Route;

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
    return redirect(route('login'));
});
Route::get('item', 'ItemController@index');
Route::get('cart', 'ItemController@cart');
Route::post('store-item', 'ItemController@store');
Route::get('delete-item-cart/{id}', 'ItemController@destroy');
Route::get('item-order/{id}', 'ItemController@place_order');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
Route::get('category', 'CategoryController@index');
Route::get('add-category', 'CategoryController@create');
Route::post('store-category', 'CategoryController@store');
Route::get('edit-category/{id}', 'CategoryController@edit');
Route::put('update-category/{id}', 'CategoryController@update');
Route::get('delete-category/{id}', 'CategoryController@destroy');

Route::get('product', 'ProductController@index');
Route::get('add-product', 'ProductController@create');
Route::post('store-product', 'ProductController@store');
Route::get('edit-product/{id}', 'ProductController@edit');
Route::put('update-product/{id}', 'ProductController@update');
Route::get('delete-product/{id}', 'ProductController@destroy');

Route::get('orders', 'OrderController@index');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
