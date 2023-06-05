<?php

use App\Http\Controllers\RobotStoreController;
use App\Models\ChargerStore;
use App\Models\RobotStore;
use App\Models\Simulation;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $simulations = Simulation::all()->sortByDesc('created_at');
    return view('simulationSelector')->with('simulations', $simulations);
});

Route::get('/create', function () {
    return view('createSimulation');
});

Route::get('/simulation/{id}', function ($id) {
    $storeRobots = RobotStore::all()->sortBy('cost');
    $storeChargers = ChargerStore::all()->sortBy('cost');
    return view('titlescreen')->with('storerobots', $storeRobots)
        ->with('storechargers', $storeChargers)->with('id', $id);
});

Route::get('/contact', function () {
    return view('contact');
});