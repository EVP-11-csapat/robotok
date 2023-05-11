<?php

use App\Http\Controllers\ChargerController;
use App\Http\Controllers\GeneratedCargoController;
use App\Http\Controllers\RobotController;
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

Route::post("/addrobot", [RobotController::class, 'addRobot']);
Route::post("/addcharger", [ChargerController::class, 'addCharger']);

Route::post("/activaterobot", [RobotController::class, 'activateRobot']);
Route::post("/activatecharger", [ChargerController::class, 'activateCharger']);

Route::get("/getrobots", [RobotController::class, 'getRobots']);
Route::get("/getchargers", [ChargerController::class, 'getChargers']);

Route::post("/importcargo", [GeneratedCargoController::class, 'importCargo']);
