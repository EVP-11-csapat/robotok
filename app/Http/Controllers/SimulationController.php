<?php

namespace App\Http\Controllers;

use App\Models\Simulation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimulationController extends Controller
{
    public static function incrementTotalCost($value): int
    {
        DB::table('simulations')->where('id', 1)->increment('totalCost', $value);
        return 1;
    }
    // A függvény a robot árának felét várja paraméterként,
    // (automatikusan nem fogja megfelezni a metódus requestben kapott cost-ot)
    public static function decrementTotalCost($value): int
    {
        DB::table('simulations')->where('id', 1)->decrement('totalCost', $value);
        return 1;
    }

    public function simulate(Request $request): JsonResponse
    {
        $simulation = Simulation::find(1);

        $cargoList = $simulation->generated_cargo;
        $cargoList = $cargoList->sortBy(function ($cargo) {
            return $cargo->template->perishable;
        });
        $finished = [];

        $robots = $simulation->robots;
        $chargers = $simulation->chargers;

        $log = "DAILY LOG \n\n";

        $chargedRobots = [];

        for ($i = 0; $i < 24; $i++) {
            $log .= "Hour: $i \n";
            $chargeables = $robots->where('active', false)->where('charge', 0);
            if ($cargoList->count() == 0) {
                foreach ($robots as $robot) {
                    if ($robot->active && $robot->charge < $robot->store->capacity) {
                        $chargeables->add($robot);
                    }
                }
            }
            $log .= "-- Robots selected for charging: " . $chargeables->count() . "\n";
            foreach ($chargers as $charger) {

                if ($charger->active) {
                    $charger->active_hours++;
                    $timeLeft = $charger->store->rate;
                    while ($timeLeft > 0 && ($chargeables->count() > 0 || isset($charger->robot))) {
                        if (!isset($charger->robot)) {
                            $charger->robot()->associate($chargeables->first());
                            $chargeables->forget($charger->robot->id);
                        }else{
                            $robots->forget($charger->robot->id);
                            $robots->add($charger->robot);
                        }

                        $log .= " - Charger" . $charger->id . " is charging robot" . $charger->robot->id . "\n";

                        $charger->robot->charge++;
                        if ($charger->robot->charge == $charger->robot->store->capacity) {
                            $chargedRobots[] = $charger->robot;
                            $charger->robot()->disassociate();
                        }

                        $timeLeft--;
                    }
                }
            }

            $log .= "-- Starting Packing\n";

            foreach ($robots as $robot) {
                if ($robot->active) {
                    $robot->active_hours++;
                    $timeLeft = $robot->store->speed;
                    while ($timeLeft > 0 && $robot->charge > 0 && $cargoList->count() > 0) {
                        $targetCargo = $cargoList->first();
                        $log .= " - Robot" . $robot->id . " is packing cargo" . $targetCargo->id . "\n";
                        $targetCargo->remaining_count--;
                        if ($targetCargo->remaining_count == 0) {
                            $finished[] = $targetCargo;
                            $cargoList->shift();
                        }
                        $timeLeft--;
                        $robot->charge--;
                    }
                    if ($robot->charge == 0) {
                        $robot->active = false;
                        $log .= " - Robot" . $robot->id . " is depleted\n";
                    }
                }
            }

            $log .= "-- Finished Packing\n";

            foreach ($chargedRobots as $chargedRobot) {
                $chargedRobot->active = true;
                $log .= " - Robot" . $chargedRobot->id . " is fully charged\n";
            }
            $chargedRobots = [];
        }

        $log .= "\nEND OF DAY\n";

        foreach ($cargoList as $cargo) {
            $cargo->save();
        }

        foreach ($finished as $cargo) {
            $cargo->delete();
        }

        $simulation->save();
        foreach ($robots as $robot) {
            $robot->save();
        }
        foreach ($chargers as $charger) {
            $charger->save();
        }

        return response()->json(['success' => true, 'remainingCargo' => $cargoList, 'log' => $log]);
    }
}
