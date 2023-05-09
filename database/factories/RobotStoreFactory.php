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
        $speed = $this->faker->randomFloat(0, 0, 10);
        $capacity = $this->faker->randomFloat(0, 0, 50);
        $cost = pow(2, ($speed*0.5)+($capacity*0.3)+(random_int(0,5))) + 1000;


        return [
            'speed' => $speed,
            'capacity' => $capacity,
            'model' => $this->faker->lastName,
            'cost' => $cost
        ];
    }
}
