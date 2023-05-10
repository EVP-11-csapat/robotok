<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RobotController extends Controller
{
    public function addRobot(Request $request){
        $storeID = $request->input('ID');
        $capacity = $request->input('capacity');
        $robot = new \App\Models\Robot(['charge' => $capacity, 'active' => false, 'active_hours' => 0]);
        $robot->simulation()->associate(1);
        $robot->store()->associate($storeID);
        $robot->save();
    }

}
