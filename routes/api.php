<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [
    App\Http\Controllers\Api\LoginController::class,
    'login'
]);

// V1
Route::prefix('v1')->group(function(){
    Route::apiResource(
        '/posts',
        App\Http\Controllers\Api\v1\PostController::class)
        ->only(['index', 'show', 'destroy'])
        ->middleware('auth:sanctum');
});

// V2
Route::prefix('v2')->group(function(){
    Route::apiResource(
        '/posts',
        App\Http\Controllers\Api\v2\PostController::class)
        ->only(['index', 'show'])
        ->middleware('auth:sanctum');
});

