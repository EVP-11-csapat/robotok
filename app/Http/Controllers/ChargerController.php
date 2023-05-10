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
}
