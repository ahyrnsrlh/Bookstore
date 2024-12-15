<?php 

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function ()
{

	Route::middleware('auth:admin')->group(function ()
	{
		Route::get('/', 'HomeController@index')->name('home');
		Route::get('/book/select', 'BookController@select')->name('book.select');

		Route::post('/logout', 'AuthController@logout')->name('logout');
		
		Route::view('/category', 'admin.category')->name('category');
		Route::view('/user', 'admin.user')->name('user');
		Route::view('/setting', 'admin.setting')->name('setting');

		Route::prefix('supplier')->group(function ()
		{
			Route::view('/', 'admin.supplier')->name('supplier');
			Route::get('/select', 'SupplierController@select')->name('supplier.select');
		});

		Route::prefix('stock')->name('stock.')->group(function ()
		{
			Route::view('/', 'admin.stock.index')->name('index');
			Route::view('/in', 'admin.stock.in')->name('in');
			Route::view('/out', 'admin.stock.out')->name('out');
		});

		Route::resource('/book', 'BookController', ['only' => ['index', 'create', 'edit', 'show']]);
		Route::resource('/transaction', 'TransactionController', ['only' => ['index', 'update', 'show']]);
	
	});

	Route::middleware('guest:admin')->group(function ()
	{
		Route::view('/login', 'admin.auth.login')->name('login');
	});

});

 ?>