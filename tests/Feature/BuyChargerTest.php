<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuyChargerTest extends TestCase
{
    use RefreshDatabase;

    protected $simulationId;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $response = $this->post('/api/createSimulation', [
            'shouldGenerateCargo' => true,
            'cargoData' => []
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'id' => 2,
                 ]);
        
        $responseData = $response->json();
        $this->simulationId = $responseData['id'];
    }

    /**
     * A basic feature test example.
     */
    public function test_create_simulation_and_buy_charger(): void
    {
        $response = $this->post('/api/addcharger', [
            'id' => 1,
            'simulationId' => $this->simulationId
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => 1,
                 ]);
        
        $response = $this->get('/api/getchargers/' . $this->simulationId);
        $response->assertStatus(200)
                 ->assertJsonCount(1);

        $response = $this->get('/api/getcurrentbal/' . $this->simulationId);
        $response->assertStatus(200);

        $this->assertGreaterThan(0, $response->json());
    }

    public function test_buy_charger_and_activate(): void
    {
        $response = $this->post('/api/addcharger', [
            'id' => 1,
            'simulationId' => $this->simulationId
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => 1,
                 ]);
        
        $response = $this->post('/api/activatecharger', [
            'id' => 1,
            'active' => true,
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                     'success' => 1,
                 ]);
    }
}
