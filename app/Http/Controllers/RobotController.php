<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RobotController extends Controller
{
    public function addRobot(Request $request){
        $storeID = $request->input('id');
        $storeRobot = \App\Models\RobotStore::index($storeID);
        $robot = new \App\Models\Robot(['charge' => $storeRobot->capacity, 'active' => false, 'active_hours' => 0]);
        $robot->simulation()->associate(1);
        $robot->store()->associate($storeID);
        $robot->save();
    }

}
