<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperUserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('auth/login', [AuthController::class, 'login']);

Route::middleware(['jwt.authenticate'])->group(function () {

    // USER endpoints
    Route::prefix('user')->group(function () {
        Route::get('/endpoint', [UserController::class, 'index']);
    });

    // ADMIN endpoints
    Route::prefix('admin')->group(function () {
        Route::get('/endpoint', [AdminController::class, 'index']);
    });

    // SUPER_USER endpoints
    Route::prefix('super-user')->group(function () {
        Route::get('/endpoint', [SuperUserController::class, 'index']);
    });
});
