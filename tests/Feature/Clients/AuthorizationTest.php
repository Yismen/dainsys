<?php

namespace Tests\Feature\Clients;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewClient()
    {
        $client = create(\App\Models\Client::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.clients.index'))
            ->assertForbidden();

        $response->get(route('admin.clients.show', $client->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetClient()
    {
        $client = create(\App\Models\Client::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.clients.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditClient()
    {
        $client = create(\App\Models\Client::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.clients.update', $client->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyClient()
    {
        $client = create(\App\Models\Client::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.clients.destroy', $client->id))
            ->assertForbidden();
    }
}
