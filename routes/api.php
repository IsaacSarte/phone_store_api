<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return response()->json([
        'data' => [
            'message' => '🚀 API is Working from api.php'
        ]
    ],200);
});

Route::get('/phonestore', function () {
    return response()->json([
        'data' => [
            'message' => 'Welcome to Phone Store API from api.php'
        ]
    ],200);
});

/* Resources */

// Customer
Route::group(['prefix' => 'customers'], function(){
    Route::get('/', 'CustomersController@index')->name('customerList');
    Route::get('/{id}', 'CustomersController@show')->name('customer');
    Route::post('/', 'CustomersController@create')->name('customer_create');
    Route::put('/{id}', 'CustomersController@update')->name('customer_update');
});

// Product
Route::group(['prefix' => 'products'], function(){
    Route::get('/', 'ProductsController@index')->name('productList');
    Route::get('/{id}', 'ProductsController@show')->name('product');
    Route::post('/', 'ProductsController@create')->name('product_create'); 
    Route::put('/{id}', 'ProductsController@update')->name('product_update');
});

// Order
Route::group(['prefix' => 'orders'], function(){
    Route::get('/', 'OrdersController@index')->name('orderList');
    Route::get('/{id}', 'OrdersController@show')->name('order');
    Route::post('/', 'OrdersController@create')->name('order_create'); 
    Route::put('/{id}', 'OrdersController@update')->name('order_update');
});
