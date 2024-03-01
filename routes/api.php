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

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::apiResource('/bank-details', \App\Http\Controllers\BankDetailsController::class)
        ->except('index');
    Route::apiResource('/pix', \App\Http\Controllers\PixController::class)
        ->only('store', 'update', 'destroy');
    Route::apiResource('/matching', App\Http\Controllers\MatchingController::class)
        ->only('store', 'index');

    Route::apiResource('/category', \App\Http\Controllers\CategoryController::class);

    Route::get('/me', [\App\Http\Controllers\UserController::class, 'me']);

});

Route::put('/about-me', [\App\Http\Controllers\AboutController::class, 'update']);
Route::get('/about-me', [\App\Http\Controllers\AboutController::class, 'show']);

Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/register', [\App\Http\Controllers\UserController::class, 'register'])->name('register');
