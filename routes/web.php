<?php

use App\Http\Controllers\RobotStoreController;
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
    return view('titlescreen').with('storerobots', [RobotStoreController::class, 'getstorerobots']);
});

Route::get('/contact', function () {
    return view('contact');
});
