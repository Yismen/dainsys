<?php

namespace Tests\Feature\Clients;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_clients()
    {
        $client = create(\App\Models\Client::class);

        $this->get(route('admin.clients.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.clients.show', $client->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_clients()
    {
        $client = create(\App\Models\Client::class);

        $this->get(route('admin.clients.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.clients.store'), $client->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_client()
    {
        $client = create(\App\Models\Client::class);

        $this->get(route('admin.clients.edit', $client->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.clients.update', $client->id), $client->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_client()
    {
        $client = create(\App\Models\Client::class);

        $this->delete(route('admin.clients.destroy', $client->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
