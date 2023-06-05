<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RobotStore>
 */
class RobotStoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $speed = $this->faker->randomFloat(0, 1, 16);
        $capacity = $this->faker->randomFloat(0, 1, 64);
        $cost = 1000 + round($speed * log($speed) * 400 + $capacity * log($capacity) * 100, -2) + (random_int(0, 20) * 100);


        return [
            'speed' => $speed,
            'capacity' => $capacity,
            'model' => $this->faker->lastName,
            'cost' => $cost
        ];
    }
}
