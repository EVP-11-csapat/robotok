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

/* /addrobot - add a new robot
 *  data:
 *     "id" - id of store template for the robot
 */
Route::post("/addrobot", [RobotController::class, 'addRobot']);

/* /addcharger - add a new charger
 *  data:
 *     "id" - id of store template for the charger
 */
Route::post("/addcharger", [ChargerController::class, 'addCharger']);

/* /activaterobot - set active status of a robot
 *  data:
 *     "id" - id of the robot to activate
 *     "active" - true/false to activate/deactivate the robot
 */
Route::post("/activaterobot", [RobotController::class, 'activateRobot']);
/* /activatecharger - set active status of a charger
 *  data:
 *     "id" - id of the charger to activate
 *     "active" - true/false to activate/deactivate the charger
 */
Route::post("/activatecharger", [ChargerController::class, 'activateCharger']);

/*  /getrobots - get all robots
 *  returns:
 *    [
 *    "id": "robotID",
 *    "charge": "charge",
 *    "active": "active",
 *    "active_hours": "activeHours",
 *    "model": "model"
 *    ]
 */
Route::get("/getrobots", [RobotController::class, 'getRobots']);
/*  /getchargers - get all chargers
 *  returns:
 *    [
 *    "id": "chargerID",
 *    "chargee": "robotID",
 *    "active": "active",
 *    "active_hours": "activeHours",
 *    "model": "model"
 *    ]
 */
Route::get("/getchargers", [ChargerController::class, 'getChargers']);

/* /importcargo - generate cargo
*  data :
*    "amount" - amount of cargo to generate
*    "day" - arrival day of the generated cargo
*/
Route::post("/importcargo", [GeneratedCargoController::class, 'importCargo']);

/*  /simulate -  simulate a day
*  returns :
*    "remainingCargo" - cargo left in the warehouse at the  end of the day
*    "log" - log of events during the day
*/
Route::get("/simulate", [SimulationController::class, 'simulate']);
