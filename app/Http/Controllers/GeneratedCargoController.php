<?php

namespace App\Http\Controllers;

use App\Models\CargoTemplate;
use App\Models\GeneratedCargo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GeneratedCargoController extends Controller
{
    public function importCargo(Request $request): JsonResponse
    {
        $amount = request('amount', 1);
        $simulationID = request('simulationId', 1);

        for ($i = 0; $i < $amount; $i++) {

            $template = CargoTemplate::whereSimulationId($simulationID)->inRandomOrder()->first();

            $cargo = GeneratedCargo::firstOrCreate(
                ['template_id' => $template->id, 'arrival_day' => request('day', 0)],
                ['simulation_id' => $simulationID, 'remaining_count' => 0]
            );
            if ($cargo->template === null) {
                $cargo->template()->associate($template);
            }


            $cargo->remaining_count++;
            $cargo->save();

        }


        return response()->json(['success' => true, 'message' => "Imported {$amount} cargo"]);
    }

    public function getGeneratedCargo(Request $request)
    {
        $simulationID = $request->route('id');
        $generatedCargo = GeneratedCargo::whereSimulationId($simulationID)->get();
        $toreturn = [];
        foreach ($generatedCargo as $cargo) {
            $toreturn[] = [
                'id' => $cargo->id,
                'name' => $cargo->template->name,
                'perishable' => $cargo->template->perishable,
                'arrival_day' => $cargo->arrival_day,
                'remaining_count' => $cargo->remaining_count
            ];
        }
        return response()->json(['success' => true, 'data' => $toreturn]);
    }
}