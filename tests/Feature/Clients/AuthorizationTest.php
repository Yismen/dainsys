<?php

namespace Tests\Feature\Clients;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_client()
    {
        $client = create(\App\Models\Client::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.clients.index'))
            ->assertForbidden();

        $response->get(route('admin.clients.show', $client->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_client()
    {
        $client = create(\App\Models\Client::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.clients.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_client()
    {
        $client = create(\App\Models\Client::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.clients.update', $client->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_client()
    {
        $client = create(\App\Models\Client::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.clients.destroy', $client->id))
            ->assertForbidden();
    }
}
