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

Route::middleware(['cors'])->group(function () {

    Route::get('/', function () {
        return response()->json([
            'data' => [
                'message' => '🚀 API is Working'
            ]
        ],200);
    });

    Route::get('/phonestore', function () {
        return response()->json([
            'data' => [
                'message' => 'Welcome to Phone Store API'
            ]
        ],200);
    });
    
});
