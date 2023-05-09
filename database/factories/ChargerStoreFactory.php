<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChargerStore>
 */
class ChargerStoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $rate = $this->faker->randomFloat(0, 0, 10);
        $cost = pow(2, ($rate)+(random_int(0,10))) + 1000;

        return [
            'rate' => $this->faker->randomFloat(0, 0, 100),
            'model' => $this->faker->lastName,
            'cost' => $cost
        ];
    }
}
