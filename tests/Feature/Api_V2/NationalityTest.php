<?php

namespace Tests\Feature\Api_V2;

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

        $response = $this->post('/api/v2/nationalities', $attributes);

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_creates_a_nationality_and_returns_json()
    {
        $nationality = factory(Nationality::class)->make()->toArray();
        Passport::actingAs($this->user());

        $response = $this->post('/api/v2/nationalities', $nationality);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
            ]);

        $this->assertDatabaseHas('nationalities', $nationality);
    }
}
