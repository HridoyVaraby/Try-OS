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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/delete/user/{user_id}', 'HomeController@deleteuser');

Route::get('/edit/user/{user_id}', 'HomeController@edituser');

Route::get('/add/product/view', 'ProductController@addproductview');

Route::get('/add/product/add', 'ProductController@addproductadd');

Route::get('/add/product/deleted', 'ProductController@addproductdeleted');

Route::post('/add/product/insert', 'ProductController@addproductinsert');

Route::get('/delete/product/{product_id}', 'ProductController@deleteproduct');

Route::get('/edit/product/{product_id}', 'ProductController@editproduct');

Route::post('/edit/product/insert', 'ProductController@editproductinsert');

// Front-end Route

Route::get('/', 'FrontendController@index');

Route::get('contact', 'FrontendController@contact');

Route::get('about', 'FrontendController@about');

Route::get('/product/details/{product_id}', 'FrontendController@productdetails');
