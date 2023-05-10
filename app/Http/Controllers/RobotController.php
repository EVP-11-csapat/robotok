<?php

namespace App\Http\Controllers;

use App\Models\RobotStore;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class RobotController extends Controller
{
    public function addRobot(Request $request): JsonResponse
    {
        $storeID = $request->all()['id'];
        $storeRobot = RobotStore::all()->where('id', $storeID)->first();
        $robot = new \App\Models\Robot(['charge' => $storeRobot->capacity, 'active' => false, 'active_hours' => 0]);
        $robot->simulation()->associate(1);
        $robot->store()->associate($storeID);
        $robot->save();
        return response()->json(['success' => $request->all()['id']]);
    }

}