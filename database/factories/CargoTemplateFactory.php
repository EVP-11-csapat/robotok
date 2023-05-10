<?php

namespace Database\Factories;

use App\Models\Simulation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CargoTemplate>
 */
class CargoTemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->colorName,
            'perishable' => $this->faker->boolean,
            'simulation_id' => Simulation::all()->random()->id

        ];
    }

    public function withSimulation($simulationID) : CargoTemplateFactory
    {
        return $this->state([
            'simulation_id' => $simulationID
        ]);
    }
}
