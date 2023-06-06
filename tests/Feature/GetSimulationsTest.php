<?php

namespace Tests\Feature;

use App\Models\Simulation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetSimulationsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_initial_simulation_exists(): void
    {
        $this->seed();
        $simulations = Simulation::all();
        $this->assertCount(1, $simulations);
    }

    public function test_create_simulation(): void
    {
        $response = $this->post('/api/createSimulation', [
            'shouldGenerateCargo' => true,
            'cargoData' => []
        ]);
    
        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'id' => 1,
                 ]);
    }

    public function test_get_current_day(): void
    {
        $this->seed();
        $simulations = Simulation::all();
        $this->assertCount(1, $simulations);
        $response = $this->get('/api/getcurrentday/1');
        $response->assertStatus(200)
                 ->assertSee('0');
    }

    public function test_get_current_balance(): void
    {
        $this->seed();
        $simulations = Simulation::all();
        $this->assertCount(1, $simulations);
        $response = $this->get('/api/getcurrentbal/1');
        $response->assertStatus(200)
                 ->assertSee('0');
    }

    public function test_get_current_robots(): void
    {
        $this->seed();
        $simulations = Simulation::all();
        $this->assertCount(1, $simulations);
        $response = $this->get('/api/getrobots/1');
        $response->assertStatus(200)
                 ->assertJsonCount(0);
    }

    public function test_get_current_chargers(): void
    {
        $this->seed();
        $simulations = Simulation::all();
        $this->assertCount(1, $simulations);
        $response = $this->get('/api/getchargers/1');
        $response->assertStatus(200)
                 ->assertJsonCount(0);
    }

    public function test_get_current_cargo(): void
    {
        $this->seed();
        $simulations = Simulation::all();
        $this->assertCount(1, $simulations);
        $response = $this->get('/api/getgeneratedcargo/1');
        $response->assertStatus(200)
                 ->assertJson([
                     'success' => 1,
                     'data' => []
                 ]);
    }
    
    public function test_get_template_cargo(): void
    {
        $this->seed();
        $simulations = Simulation::all();
        $this->assertCount(1, $simulations);
        $response = $this->get('/api/getcargotemplates/1');
        $response->assertStatus(200)
                 ->assertJson([
                     'success' => 1,
                     'data' => []
                 ]);
    }

    public function test_get_template_cargo_generation(): void
    {
        $this->seed();
        $simulations = Simulation::all();
        $this->assertCount(1, $simulations);
        $this->post('/api/checkandgeneratecargo', [
            'id' => 1,
        ]);
        $response = $this->get('/api/getcargotemplates/1');
        $responseData = $response->json();
        $this->assertCount(10, $responseData['data']);
    }
}
