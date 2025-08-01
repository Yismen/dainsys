<?php

namespace Tests\Feature\Api_V2;

use App\Models\Bank;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class BankTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_request_to_create_bank()
    {
        Passport::actingAs($this->user());
        $attributes = [
            'name' => '',
        ];

        $response = $this->post('/api/v2/banks', $attributes);

        $response->assertInvalid(array_keys($attributes));
    }

    /** @test */
    public function it_creates_a_bank_and_returns_json()
    {
        $bank = Bank::factory()->make()->toArray();
        Passport::actingAs($this->user());

        $response = $this->post('/api/v2/banks', $bank);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'name',
            ]);

        $this->assertDatabaseHas('banks', $bank);
    }
}
