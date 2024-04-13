<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\TaskController;
use App\Http\Controllers\Api\v1\ReportController;
use App\Http\Controllers\Api\v1\DiseaseController;
use App\Http\Controllers\Api\v1\TraitementController;
use App\Http\Controllers\Api\v1\Employee\UserController;
use App\Http\Controllers\Api\v1\ProductController;

Route::prefix('v1')->group(function () {
    Route::post('register', [UserController::class, 'store']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('logout', [AuthController::class, 'logout']);
});



Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('tasks', TaskController::class);
    Route::apiResource('disease', DiseaseController::class);
    Route::apiResource('reports', ReportController::class);
    Route::apiResource('traitements', TraitementController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('users', UserController::class);
});
