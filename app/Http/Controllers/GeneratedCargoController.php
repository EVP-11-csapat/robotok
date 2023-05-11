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

        for ($i = 0; $i < $amount; $i++) {

            $template = CargoTemplate::whereSimulationId(1)->inRandomOrder()->first();

            $cargo = GeneratedCargo::firstOrCreate(
                ['template_id' => $template->id, 'arrival_day' => request('day', 0)],
                ['simulation_id' => 1, 'remaining_count' => 0]
            );
            if ($cargo->template === null) {
                $cargo->template()->associate($template);
            }


            $cargo->remaining_count++;
            $cargo->save();

        }


        return response()->json(['success' => true, 'message' => "Imported {$amount} cargo"]);
    }
}
