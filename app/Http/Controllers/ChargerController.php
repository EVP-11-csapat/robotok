<?php

namespace App\Http\Controllers;

use App\Models\Charger;
use App\Models\ChargerStore;
use App\Models\Simulation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChargerController extends Controller
{
    public function addCharger(Request $request): JsonResponse
    {
        $storeCharger = ChargerStore::find(request('id'));
        SimulationController::incrementTotalCost($storeCharger->cost, request('simulationId'));
        $charger = new Charger(['active' => false, 'active_hours' => 0]);
        $charger->simulation()->associate(Simulation::find(request('simulationId')));
        $charger->store()->associate($storeCharger);
        $charger->save();
        return response()->json(['success' => request('id')]);
    }

    public function getChargers(Request $request): JsonResponse
    {
        $simulationID = $request->route('id');
        $chargers = Charger::all()->where('simulation_id', $simulationID)->sortBy('id');
        $chargerentries = array();
        foreach ($chargers as $charger) {

            $chargee = ($charger->robot) ? $charger->robot->id : 'None';

            $chargerentries[] = (object) [
                'id' => $charger->id,
                'active' => $charger->active,
                'active_hours' => $charger->active_hours,
                'chargee' => $chargee,
                'model' => $charger->store->model
            ];
        }
        return response()->json($chargerentries);
    }

    public function activateCharger(Request $request): JsonResponse
    {
        $charger = Charger::find(request('id'));
        $charger->active = (request('active') == 'true');
        $charger->save();
        return response()->json(['success' => request('active')]);
    }

}