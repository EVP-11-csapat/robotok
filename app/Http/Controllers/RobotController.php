<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use App\Models\RobotStore;
use App\Models\Simulation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class RobotController extends Controller
{
    public function addRobot(Request $request): JsonResponse
    {
        $storeRobot = RobotStore::find(request('id'));
        SimulationController::incrementTotalCost($storeRobot->cost, request('simulationId'));
        $robot = new Robot(['charge' => $storeRobot->capacity, 'active' => false, 'active_hours' => 0]);
        $robot->simulation()->associate(Simulation::find(request('simulationId')));
        $robot->store()->associate($storeRobot);
        $robot->save();
        return response()->json(['success' => request('id')]);
    }

    public function getRobots(Request $request): JsonResponse
    {
        $simulationID = $request->route('id');
        $robots = Robot::all()->where('simulation_id', $simulationID)->sortBy('id');
        $robotentries = array();
        foreach ($robots as $robot) {
            $robotentries[] = (object) [
                'id' => $robot->id,
                'charge' => $robot->charge,
                'active' => $robot->active,
                'active_hours' => $robot->active_hours,
                'model' => $robot->store->model
            ];
        }

        return response()->json($robotentries);
    }

    public function activateRobot(Request $request): JsonResponse
    {
        $robot = Robot::find(request('id'));
        $robot->active = (request('active') == 'true');
        $robot->save();
        return response()->json(['success' => request('active')]);
    }

}