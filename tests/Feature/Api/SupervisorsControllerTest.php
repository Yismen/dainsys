<?php

namespace Tests\Feature\Api;

use App\Models\Supervisor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class SupervisorsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_supervisors_collection()
    {
        Supervisor::factory()->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/supervisors');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'active',
                    ],
                ],
            ]);
    }

    /** @test */
    public function it_returns_active_supervisors_only()
    {
        $active_supervisor = Supervisor::factory()->create(['active' => true]);
        $inactive_supervisor = Supervisor::factory()->create(['active' => false]);
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/supervisors/actives');

        $response->assertOk()
            ->assertJsonFragment(['name' => $active_supervisor->name])
            ->assertJsonMissing(['name' => $inactive_supervisor->name]);
    }
}
