<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['json.response'])->group(static function () {
    Route::prefix('auth')->namespace('App\Http\Controllers\Api')->name('auth/')->group(static function() {
        Route::get('/login',                                    'AuthController@login')->name('login');
        Route::get('/logout',                                   'AuthController@logout')->name('logout');
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
