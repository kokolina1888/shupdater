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

Auth::routes();

Route::get('/', 'Auth\LoginController@ShowLoginForm');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/new-products-info', 'ProductsController@add_new_products')->name('add_new_products');
Route::post('/new-products-info', 'ProductsController@store_new_products')->name('store_new_products');
Route::get('/edit-products-quantities-prices', 'ProductsController@edit_products_quantity_prices')->name('edit_products_quantity_prices');
Route::post('/edit-products-quantities-prices', 'ProductsController@update_products_quantity_prices')->name('update_products_quantity_prices');
Route::get('/search-product-info', 'ProductsController@get_product_info')->name('get_product_info');

Route::post('/search-product-by-model', 'ProductsController@get_product_info_by_model')->name('get_product_info_by_model');
Route::post('/search-product-by-name', 'ProductsController@get_product_info_by_name')->name('get_product_info_by_name');
