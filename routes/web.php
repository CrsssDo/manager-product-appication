<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'app'], function () {

    Route::get('/home', [\App\Http\Controllers\MainController::class, 'index']);

//    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index']);

    Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'create']);
    Route::get('/cart/', [App\Http\Controllers\CartController::class, 'show']);
    Route::post('/update-cart', [App\Http\Controllers\CartController::class, 'update']);
    Route::get('/cart/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);

    Route::get('product/{id}', [App\Http\Controllers\ProductController::class, 'show']);

    Route::post('/order', [App\Http\Controllers\OrderController::class, 'create']);

});
