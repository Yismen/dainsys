<?php

namespace Tests\Feature\Api_V2;

use App\Models\Ars;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_request_to_create_ars()
    {
        Passport::actingAs($this->user());
        $attributes = [
            'name' => '',
        ];

        $response = $this->post('/api/v2/arss', $attributes);

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_creates_a_ars_and_returns_json()
    {
        $ars = Ars::factory()->make()->toArray();
        Passport::actingAs($this->user());

        $response = $this->post('/api/v2/arss', $ars);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'slug',
            ]);

        $this->assertDatabaseHas('arss', $ars);
    }
}
