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

        $rate = $this->faker->randomFloat(0, 1, 16);
        $cost = 1000 + round($rate * log($rate) * 1000, -2) + (random_int(0, 20) * 100);

        return [
            'rate' => $rate,
            'model' => $this->faker->lastName,
            'cost' => $cost
        ];
    }
}
