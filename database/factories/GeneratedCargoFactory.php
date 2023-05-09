<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GeneratedCargo>
 */
class GeneratedCargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }

    public function withSimulation($simulationID) : GeneratedCargoFactory
    {
        return $this->state([
            'simulationID' => $simulationID
        ]);
    }
}
