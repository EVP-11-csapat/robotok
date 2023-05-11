<?php

use App\Http\Controllers\ChargerController;
use App\Http\Controllers\GeneratedCargoController;
use App\Http\Controllers\RobotController;
use App\Http\Controllers\SimulationController;
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

// /addrobot - add a new robot - data: {id: "storeID"}
Route::post("/addrobot", [RobotController::class, 'addRobot']);
// /addcharger - add a new charger - data: {id: "storeID"}
Route::post("/addcharger", [ChargerController::class, 'addCharger']);

// /activaterobot - activate a robot - data: {id: "robotID",  active: true/false}
Route::post("/activaterobot", [RobotController::class, 'activateRobot']);
// /activatecharger - activate a charger - data: {id: "chargerID",  active: true/false}
Route::post("/activatecharger", [ChargerController::class, 'activateCharger']);

// /getrobots - get all robots - returns: [{id: "robotID",  charge: "charge", active: true/false, active_hours:  "activeHours", model: "model"}]
Route::get("/getrobots", [RobotController::class, 'getRobots']);
// /getchargers - get all chargers - returns: [{id: "chargerID",  chargee: "robotID", active: true/false, active_hours:  "activeHours", model: "model"}]
Route::get("/getchargers", [ChargerController::class, 'getChargers']);

// /importcargo - generate cargo - data: {amount: "amount",  day: "day"}
Route::post("/importcargo", [GeneratedCargoController::class, 'importCargo']);

// /simulate -  simulate a day
Route::get("/simulate", [SimulationController::class, 'simulate']);
