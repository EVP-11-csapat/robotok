<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimulationController extends Controller
{
    public function incrementTotalCost(Request $request): JsonResponse
    {
        $cost = request('value');
        DB::table('simulation')->where('id', 1)->increment('totalCost',$cost);
        return response()->json(['success' => request('value')]);
    }
    // A függvény a robot árának felét várja paraméterként,
    // (automatikusan nem fogja megfelezni a metódus requestben kapott cost-ot)
    public function decrementTotalCost(Request $request): JsonResponse
    {
        $cost = request('value');
        DB::table('simulation')->where('id', 1)->decrement('totalCost',$cost);
        return response()->json(['success' => request('value')]);
    }
}
