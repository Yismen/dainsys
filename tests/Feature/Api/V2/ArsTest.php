<?php

namespace Tests\Feature\Api\V2;

use App\Ars;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

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
        $ars = factory(Ars::class)->make()->toArray();
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
