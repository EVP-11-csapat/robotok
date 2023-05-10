<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use App\Models\RobotStore;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Component\HttpFoundation\JsonResponse;
use function Sodium\add;

class RobotController extends Controller
{
    public function addRobot(Request $request): JsonResponse
    {
        $storeID = $request->all()['id'];
        $storeRobot = RobotStore::index($storeID);
        $robot = new Robot(['charge' => $storeRobot->capacity, 'active' => false, 'active_hours' => 0]);
        $robot->simulation()->associate(1);
        $robot->store()->associate($storeID);
        $robot->save();
        return response()->json(['success' => $request->all()['id']]);
    }

    public function getRobots(Request $request): JsonResponse
    {
        $robots = Robot::all()->sortBy('id');
        $robotentries = array();
        foreach ($robots as $robot) {
            $robotentries[] = (object)[
                'id' => $robot->id,
                'charge' => $robot->charge,
                'active' => $robot->active,
                'active_hours' => $robot->active_hours,
                'model' => $robot->store()->first()->model
            ];
        }

        return response()->json($robotentries);
    }

    public function activateRobot(Request $request): JsonResponse
    {
        $robot = Robot::index($request->all()['id']);
        $robot->active = $request->all()['active'];
        $robot->save();
        return response()->json(['success' => $request->all()['id']]);
    }

}
