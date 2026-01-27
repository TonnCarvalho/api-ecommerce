<?php

use App\Http\Controllers\Api\TokenController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    Route::get('/hello', function(){ 
        return ['message' => 'Hello World', 'teste' => 'message teste'];
    });

    Route::post('/login', [TokenController::class, 'store'])->name('login.store');

});

