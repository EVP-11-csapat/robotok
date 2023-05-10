<?php

use App\Http\Controllers\RobotStoreController;
use App\Models\ChargerStore;
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
    $storeRobots = ChargerStore::all();
    return view('titlescreen')->with('storerobots', $storeRobots);
});

Route::get('/contact', function () {
    return view('contact');
});