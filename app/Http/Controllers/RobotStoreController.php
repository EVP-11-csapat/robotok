<?php

namespace App\Http\Controllers;

use App\Models\RobotStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RobotStoreController extends Controller
{
    public function getStoreRobots() : JsonResponse {
        $data = RobotStore::all();
        return response()->json($data);
    }
}
