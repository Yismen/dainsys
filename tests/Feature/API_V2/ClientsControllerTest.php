<?php

namespace Tests\Feature\Api_V2;

use App\Client;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientsControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_a_clients_collection()
    {
        factory(Client::class)->create();
        Passport::actingAs($this->user());

        $response = $this->get('/api/v2/clients');

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
