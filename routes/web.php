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
// Объявляем маршруты для ресурсного контроллера ProductController,
// назначая слово products префиксом URI
Route::resource('products', 'ProductController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('products/{product}/remove', 'ProductController@remove')
     ->name('products.remove');
	 

	
	// Объявляем маршруты для ресурсного контроллера TegController,
// назначая слово tags префиксом URI
Route::resource('tags', 'tagController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('tags/{tag}/remove', 'tagController@remove')
     ->name('tags.remove');
	 
	 Route::get('/', function () {
    return view('welcome');
});

// Объявляем маршруты для ресурсного контроллера ProductController,
// назначая слово products префиксом URI
Route::resource('statuses', 'StatusController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('statuses/{status}/remove', 'StatusController@remove')
     ->name('statuses.remove');

// Объявляем маршруты для ресурсного контроллера ProductController,
// назначая слово products префиксом URI
Route::resource('orders', 'OrderController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('orders/{order}/remove', 'OrderController@remove')
    ->name('orders.remove');

Route::resource('roles', 'RoleController');

// Т. к. метод remove() не предусмотрен в ресурсных контроллерах,
// объявляем маршрут самостоятельно.
Route::get('roles/{role}/remove', 'RoleController@remove')
     ->name('roles.remove');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
