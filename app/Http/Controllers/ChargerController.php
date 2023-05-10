<?php

namespace App\Http\Controllers;

use App\Models\Charger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChargerController extends Controller
{
    public function addCharger(Request $request): JsonResponse
    {
        $storeID = $request->all()['id'];
        $charger = new Charger(['active' => false, 'active_hours' => 0]);
        $charger->simulation()->associate(1);
        $charger->store()->associate($storeID);
        $charger->save();
        return response()->json(['success' => $request->all()['id']]);
    }

    public function getChargers(Request $request): JsonResponse
    {
        $chargers = Charger::all()->sortBy('id');
        $chargerentries = array();
        foreach ($chargers as $charger) {

            $chargee = $charger->robot()->first();

            if ($chargee == null) $chargee = 'None';
            else $chargee = $chargee->id;

            $chargerentries[] = (object)[
                'id' => $charger->id,
                'active' => $charger->active,
                'active_hours' => $charger->active_hours,
                'chargee' => $chargee,
                'model' => $charger->store()->first()->model
            ];
        }
        return response()->json($chargerentries);
    }

    public function activateCharger(Request $request): JsonResponse
    {
        $charger = Charger::index($request->all()['id']);
        $charger->active = ($request->all()['active'] == 'true');
        $charger->save();
        return response()->json(['success' => $request->all()['active']]);
    }

}
