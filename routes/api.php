<?php

use App\Http\Controllers\Api\StatusRoboController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/get-status/robot', [StatusRoboController::class, 'getStatus']);

Route::post('/move-elbow/{side}/{slope}', [StatusRoboController::class, 'moveElbow']);
Route::post('/move-wrist/{side}/{rotation}', [StatusRoboController::class, 'moveWrist']);
Route::post('/move-head/{side}/{rotation}', [StatusRoboController::class, 'moveHead']);
