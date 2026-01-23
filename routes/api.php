<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/hello', function() {
    return ['message' => 'Hello API'];
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
