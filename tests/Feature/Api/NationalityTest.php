<?php

namespace Tests\Feature\Api;

use App\Models\Nationality;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class NationalityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_request_to_create_nationality()
    {
        Passport::actingAs($this->user());
        $attributes = [
            'name' => '',
        ];

        $response = $this->post('/api/nationalities', $attributes);

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_creates_a_nationality_and_returns_json()
    {
        $nationality = Nationality::factory()->make()->toArray();
        Passport::actingAs($this->user());

        $response = $this->post('/api/nationalities', $nationality);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
            ]);

        $this->assertDatabaseHas('nationalities', $nationality);
    }
}
