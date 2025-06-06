<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DailyAchievementController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/hifz-programs', [App\Http\Controllers\Api\HifzProgramController::class, 'index']);
Route::post('/daily-achievements', [DailyAchievementController::class, 'store']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login', [AuthController::class, 'login']);
Route::post('/signup', [AuthController::class, 'register']);

