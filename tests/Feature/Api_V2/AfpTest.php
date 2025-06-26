<?php

namespace Tests\Feature\Api_V2;

use App\Models\Afp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class AfpTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_request_to_create_afp()
    {
        Passport::actingAs($this->user());
        $attributes = [
            'name' => '',
        ];

        $response = $this->post('/api/v2/afps', $attributes);

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_creates_a_afp_and_returns_json()
    {
        $afp = Afp::factory()->make()->toArray();
        Passport::actingAs($this->user());

        $response = $this->post('/api/v2/afps', $afp);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
                'slug',
            ]);

        $this->assertDatabaseHas('afps', $afp);
    }
}
