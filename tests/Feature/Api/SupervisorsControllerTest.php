<?php

namespace Tests\Feature\Api;

use App\Supervisor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class SupervisorsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_supervisors_collection()
    {
        factory(Supervisor::class)->create();
        Passport::actingAs($this->user());

        $response = $this->json('GET', '/api/performances/supervisors');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'active',
                    ]
                ]
            ]);
    }

    /** @test */
    public function it_returns_active_supervisors_only()
    {
        $active_supervisor = factory(Supervisor::class)->create(['active' => true]);
        $inactive_supervisor = factory(Supervisor::class)->create(['active' => false]);
        Passport::actingAs($this->user());

        $response = $this->json('GET', '/api/performances/supervisors/actives');

        $response->assertOk()
            ->assertJsonFragment(['name' => $active_supervisor->name])
            ->assertJsonMissing(['name' => $inactive_supervisor->name]);
    }
}
