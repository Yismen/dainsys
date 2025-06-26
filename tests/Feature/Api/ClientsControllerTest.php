<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ClientsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_clients_collection()
    {
        Client::factory()->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/performances/clients');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'contact_name',
                        'main_phone',
                        'email',
                        'secondary_phone',
                        'account_number',
                    ],
                ],
            ]);
    }
}
