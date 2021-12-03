<?php

namespace Tests\Feature\Api;

use App\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;
use Laravel\Passport\Passport;
use Tests\TestCase;

class PositionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_request_to_create_position()
    {
        Passport::actingAs($this->user());
        $attributes = [
            'name' => '',
            'department_id' => '',
            'payment_type_id' => '',
            'payment_frequency_id' => '',
            'salary' => '',
        ];

        $response = $this->post('/api/positions', $attributes);

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_creates_a_position_and_returns_json()
    {
        $position = factory(Position::class)->make()->toArray();
        Passport::actingAs($this->user());

        $response = $this->post('/api/positions', $position);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
            ]);

        $this->assertDatabaseHas('positions', Arr::only($position, [
            'name',
            'department_id',
            'payment_type_id',
            'payment_frequency_id',
            'salary',
        ]));
    }
}
