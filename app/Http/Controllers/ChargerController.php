<?php

namespace App\Http\Controllers;

use App\Models\Robot;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChargerController extends Controller
{
    public function addCharger(Request $request): JsonResponse
    {
        $storeID = $request->all()['id'];
        $robot = new Robot(['active' => false, 'active_hours' => 0]);
        $robot->simulation()->associate(1);
        $robot->store()->associate($storeID);
        $robot->save();
        return response()->json(['success' => $request->all()['id']]);
    }
}
