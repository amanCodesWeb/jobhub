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
| Authorization: Bearer *** header.
|
*/

// ─── Auth ─────────────────────────────────────────────────────────────
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user',    [AuthController::class, 'user']);
    Route::patch('/user',  [UserController::class, 'update']);
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

// ─── Admin-only: Job approval workflow ────────────────────────────────
Route::middleware(['auth:sanctum', 'admin'])->prefix('/admin')->group(function () {
    Route::patch('/jobs/{job}/approve', [JobController::class, 'approve']);
    Route::patch('/jobs/{job}/reject',  [JobController::class, 'reject']);
    Route::patch('/jobs/{job}/pending', [JobController::class, 'pending']);

    Route::post('/categories',             [CategoryController::class, 'store']);
    Route::patch('/categories/{category}',  [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);
});
