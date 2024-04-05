<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->group(function () {
    Route::post('register', [\App\Http\Controllers\Api\v1\AuthController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\Api\v1\AuthController::class, 'login']);
    Route::post('refresh', [\App\Http\Controllers\Api\v1\AuthController::class, 'refresh']);
    Route::post('logout', [\App\Http\Controllers\Api\v1\AuthController::class, 'logout']);
});