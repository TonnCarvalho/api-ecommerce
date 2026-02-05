<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TokenController;

Route::prefix('v1')->group(function () {
    Route::get('/hello', function () {
        return ['message' => 'Hello World', 'teste' => 'message teste'];
    });

    Route::middleware('guest')->group(function () {
        Route::post('/login', [TokenController::class, 'store'])
            ->name('login.store');
    });


    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [TokenController::class, 'destroy'])
            ->name('login.destroy');

        Route::post('/logout-all', [TokenController::class, 'destroyAll'])
            ->name('login.destroyAll');

        //Users
        Route::get('/user', [UserController::class, 'index'])
            ->name('user.index');

        //Caregory
        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('category.index');

                    //Product
        Route::get('/products', [ProductController::class, 'index'])
            ->name('product.index');
    });
});
