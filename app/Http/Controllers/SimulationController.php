<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimulationController extends Controller
{
    public function incrementTotalCost(Request $request): JsonResponse
    {
        $cost = $request->all()['value'];
        DB::table('simulation')->where('id', 1)->increment('totalCost',$cost);
        DB::table('simulation')->save();        
        return response()->json(['success' => $request->all()['cost']]);
    }
    // A függvény a robot árának felét várja paraméterként,
    // (automatikusan nem fogja megfelezni a metódus requestben kapott cost-ot)
    public function decrementTotalCost(Request $request): JsonResponse
    {
        $cost = $request->all()['value'];
        DB::table('simulation')->where('id', 1)->decrement('totalCost',$cost);
        DB::table('simulation')->save();        
        return response()->json(['success' => $request->all()['cost']]);
    }
}
