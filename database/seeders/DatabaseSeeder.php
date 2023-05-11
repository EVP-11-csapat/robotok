<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CargoTemplate;
use App\Models\ChargerStore;
use App\Models\GeneratedCargo;
use App\Models\RobotStore;
use App\Models\Simulation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Simulation::factory()->create();
        CargoTemplate::factory(20)->create();
        RobotStore::factory(10)->create();
        ChargerStore::factory(10)->create();
    }
}
