<?php

namespace Tests\Feature\Api_V2;

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

        $response = $this->get('/api/v2/supervisors');

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

        $response = $this->get('/api/v2/supervisors/actives');

        $response->assertOk()
            ->assertJsonFragment(['name' => $active_supervisor->name])
            ->assertJsonMissing(['name' => $inactive_supervisor->name]);
    }

    /** @test */
    public function it_validates_request_to_create_supervisor()
    {
        Passport::actingAs($this->user());
        $attributes = [
            'name' => '',
        ];

        $response = $this->post('/api/v2/supervisors', $attributes);

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_creates_a_supervisor_and_returns_json()
    {
        $supervisor = Supervisor::factory()->make()->toArray();
        Passport::actingAs($this->user());

        $response = $this->post('/api/v2/supervisors', $supervisor);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'active',
            ]);

        $this->assertDatabaseHas('supervisors', $supervisor);
    }
}
