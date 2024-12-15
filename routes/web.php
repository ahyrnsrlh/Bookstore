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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('category')->name('category.')->group(function ()
{
	Route::get('/', 'CategoryController@index')->name('index');
	Route::get('/{slug}', 'CategoryController@list')->name('list');
});

Route::get('/book/{slug}', 'BookController@index')->name('book');

require 'user.php';
require 'admin.php';