<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Bearer token auth via Laravel Sanctum.
| Public routes are unauthenticated; protected routes require
| Authorization: Bearer <token> header.
|
*/

// ─── Auth ─────────────────────────────────────────────────────────────
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user',    [AuthController::class, 'user']);
});

// ─── Public: Jobs & Categories ────────────────────────────────────────
Route::get('/jobs',       [JobController::class, 'index']);
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/categories',        [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

// ─── Protected: Job management ────────────────────────────────────────
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/jobs',             [JobController::class, 'store']);
    Route::patch('/jobs/{job}',      [JobController::class, 'update']);
    Route::delete('/jobs/{job}',     [JobController::class, 'destroy']);

    Route::get('/my/stats',          [UserController::class, 'stats']);
    Route::get('/my/jobs',           [UserController::class, 'myJobs']);
});
