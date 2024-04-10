<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\TaskController;
use App\Http\Controllers\Api\v1\ReportController;
use App\Http\Controllers\Api\v1\DiseaseController;
use App\Http\Controllers\Api\v1\TraitementController;

Route::prefix('v1')->group(function () {
    Route::post('register', [\App\Http\Controllers\Api\v1\AuthController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\Api\v1\AuthController::class, 'login']);
    Route::post('refresh', [\App\Http\Controllers\Api\v1\AuthController::class, 'refresh']);
    Route::post('logout', [\App\Http\Controllers\Api\v1\AuthController::class, 'logout']);
});



Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('tasks', TaskController::class);
    Route::apiResource('disease', DiseaseController::class);
    Route::apiResource('reports', ReportController::class);
    Route::apiResource('traitement', TraitementController::class);



});
