<?php

use App\Http\Controllers\Api\AddMovementsRobot;
use App\Http\Controllers\Api\CommandsForRoboController;
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

Route::get('/get-status/robot/{id}', [StatusRoboController::class, 'getStatus']);
Route::post('/move-robot/{id}', [CommandsForRoboController::class, 'moveRobot']);
Route::post('add/movements/wrist', [AddMovementsRobot::class, 'addMovementsWrist']);
Route::post('add/movements/arm', [AddMovementsRobot::class, 'addMovementsArm']);
Route::post('add/movements/head-tilt', [AddMovementsRobot::class, 'addMovementsHeadTilt']);
Route::post('add/movements/head-rotation', [AddMovementsRobot::class, 'addMovementsHeadRotation']);
