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

// Route::get('/', function () {
//     return view('product');
// });

Route::get('/', [\App\Http\Controllers\MainController::class, 'index']);



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


//Admin route
Route::group(['prefix' => 'admin'], function () {
    //Authentication
    Route::get('login', [App\Http\Controllers\Admin\UserController::class, 'index']);

    Route::post('authentication', [App\Http\Controllers\Admin\AuthenticationController::class, 'index']);

    Route::get('register', function() {
        return view('admin.register');
    });

    Route::prefix('users')->group(function () {
       Route::post('/', [App\Http\Controllers\Admin\UserController::class, 'create']);
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\OrderController::class, 'index']);
     });

    Route::get('/', function() {
        return view('admin.main');
    });
});
