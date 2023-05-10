<?php

use App\Http\Controllers\RobotStoreController;
use App\Models\ChargerStore;
use App\Models\RobotStore;
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
    $storeRobots = RobotStore::all()->sortBy('cost');
    $storeChargers = ChargerStore::all()->sortBy('cost');
    return view('titlescreen')->with('storerobots', $storeRobots)->with('storechargers', $storeChargers);
});

Route::get('/contact', function () {
    return view('contact');
});