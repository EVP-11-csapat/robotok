<?php

namespace App\Http\Controllers;

use App\Models\CargoTemplate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CargoTemplateController extends Controller
{
    public function getCargoTemplates(Request $request): JsonResponse
    {
        $simulationID = $request->route('id');
        return response()->json(['success' => true, 'data' => CargoTemplate::where('simulation_id', $simulationID)->get()]);
    }

    public static function checkAndGenerateCargo(Request $request): JsonResponse
    {
        $id = request('id', 1);
        $tempates = CargoTemplate::whereSimulationId($id)->get();
        $needed = $tempates->isEmpty();
        if ($needed) CargoTemplate::factory()->withSimulation($id)->count(10)->create();

        return response()->json(['success' => true, 'generated' => $needed]);
    }
}
