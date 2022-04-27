<?php

use App\Product;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     $products= Product::all();
//     return view('welcome', compact('products'));
// })->name("welcome");

Route::get('/', 'MainController@index')->name('welcome');

Route::get('hot-offers', 'MainController@hot')->name('hot');
Route::get('/complete_products', 'MainController@all')->name('products');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// product controller

Route::get('/add-product', 'ProductController@add')->name('product.add');
Route::post('/store-product', 'ProductController@store')->name('product.store');
Route::get('/all-products', 'ProductController@products')->name('product.all');
Route::get('/edit-product/{id}', 'ProductController@edit')->name('product.edit');
Route::post('/update-product/{product}', 'ProductController@update')->name('product.update');
Route::get('/delete-product/{product}', 'ProductController@delete')->name('product.delete');
Route::get('/product-detials/{id}', 'ProductController@details')->name('product.details');

// category controller
Route::get('/add-category', 'CategoryController@index')->name('category.add');
Route::post('/data-category', 'CategoryController@data')->name('category.data');

Route::post('/place-order', 'OrderController@place')->name('order.place');
