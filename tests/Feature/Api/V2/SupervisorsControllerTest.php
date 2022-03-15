<?php

namespace Tests\Feature\Api\V2;

use App\Supervisor;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SupervisorsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_supervisors_collection()
    {
        factory(Supervisor::class)->create();
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
        $active_supervisor = factory(Supervisor::class)->create(['active' => true]);
        $inactive_supervisor = factory(Supervisor::class)->create(['active' => false]);
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
        $supervisor = factory(Supervisor::class)->make()->toArray();
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
