<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticatedTokenController;
use App\Http\Controllers\API\BlogsController;
use App\Http\Controllers\API\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('guest:sanctum')->group(function() {
    Route::post('login', [AuthenticatedTokenController::class, 'store']);
    Route::post('register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('blogs', BlogsController::class);
});
