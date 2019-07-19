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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'UserController');
Route::resource('product', 'ProductConroller');
Route::resource('category', 'CategoryController');
Route::resource('purchases', 'PurchasesController');
Route::resource('sales', 'SalesController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
