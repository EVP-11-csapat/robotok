<?php

namespace App\Http\Controllers;

use App\Models\CargoTemplate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class CargoTemplateController extends Controller
{
    public function getCargoTemplates()
    {
        return response()->json(['success' => true, 'data' => CargoTemplate::all()]);
    }

    public function checkAndGenerateCargo(Request $request): JsonResponse
    {
        $needed = false;
        $id = request('id', 1);
        $tempates = CargoTemplate::whereSimulationId($id)->get();
        if ($tempates->count() === 0) {
            $needed = true;
        }
        if ($needed) {
            CargoTemplate::factory()->count(10)->withSimulation($id)->create();
        }
        return response()->json(['success' => true, 'generated' => $needed]);
    }
}