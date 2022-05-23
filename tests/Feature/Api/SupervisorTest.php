<?php

namespace Tests\Feature\Api;

use App\Models\Supervisor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class SupervisorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_request_to_create_supervisor()
    {
        Passport::actingAs($this->user());
        $attributes = [
            'name' => '',
        ];

        $response = $this->post('/api/supervisors', $attributes);

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_creates_a_supervisor_and_returns_json()
    {
        $supervisor = factory(Supervisor::class)->make()->toArray();
        Passport::actingAs($this->user());

        $response = $this->post('/api/supervisors', $supervisor);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'active',
            ]);

        $this->assertDatabaseHas('supervisors', $supervisor);
    }
}
