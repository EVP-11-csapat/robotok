<?php

use App\Http\Controllers\CargoTemplateController;
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
Route::get("/getrobots/{id}", [RobotController::class, 'getRobots']);
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
Route::get("/getchargers/{id}", [ChargerController::class, 'getChargers']);

/*  /getcargotemplates - get all cargo templates
 *  returns:
 *    [
 *    "id": "cargoTemplateID",
 *    "name": "name",
 *    "perishable": "perishable",
 *    ]
 */
Route::get('/getcargotemplates/{id}', [CargoTemplateController::class, 'getCargoTemplates']);

/*  /getgeneratedcargo - get all generated cargo
 *  returns:
 *    [
 *    "id": "generatedCargoID",
 *    "name": "name",
 *    "perishable": "perishable",
 *    "arrival_day": "arrivalDay",
 *    "remaining_count": "amount"
 *    ]
 */
Route::get('/getgeneratedcargo/{id}', [GeneratedCargoController::class, 'getGeneratedCargo']);

/* /importcargo - generate cargo
 *  data :
 *    "amount" - amount of cargo to generate
 *    "day" - arrival day of the generated cargo
 */
Route::post("/importcargo", [GeneratedCargoController::class, 'importCargo']);

/* /checkandgeneratecargo - check if cargo needs to be generated and generate it
 *  data :
 *    "id" - the id of the simulation
 */
Route::post('/checkandgeneratecargo', [CargoTemplateController::class, 'checkAndGenerateCargo']);

/*
 * /createSimulation - create a new simulation with the given parameters
 * data :
 *   "cargoData" - the user given cargo
 *   "shouldGenerateCargo" - whether or not to generate cargo
 * returns: [
 *  "id" - the id of the simulation
 * ]
 */
Route::post('/createSimulation', [SimulationController::class, 'createSimulation']);

/*  /simulate -  simulate a day
 *  returns :
 *    "remainingCargo" - cargo left in the warehouse at the  end of the day
 *    "log" - log of events during the day
 */
Route::get("/simulate/{id}", [SimulationController::class, 'simulate']);

Route::get("/getcurrentday/{id}", [SimulationController::class, 'getCurrentDay']);
Route::get("/getcurrentbal/{id}", [SimulationController::class, 'getCurrentBal']);