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
