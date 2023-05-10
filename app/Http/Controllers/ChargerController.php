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
        $charger = new Charger(['active' => false, 'active_hours' => 0]);
        $charger->simulation()->associate(Simulation::find(1));
        $charger->store()->associate(ChargerStore::find(request('id')));
        $charger->save();
        return response()->json(['success' => request('id')]);
    }

    public function getChargers(Request $request): JsonResponse
    {
        $chargers = Charger::all()->sortBy('id');
        $chargerentries = array();
        foreach ($chargers as $charger) {

            $chargee = ($charger->robot) ? $charger->robot->id : 'None';

            $chargerentries[] = (object)[
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
