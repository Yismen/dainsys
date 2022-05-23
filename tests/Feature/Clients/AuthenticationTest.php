<?php

namespace Tests\Feature\Clients;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewClients()
    {
        $client = create('App\Models\Client');

        $this->get(route('admin.clients.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.clients.show', $client->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateClients()
    {
        $client = create('App\Models\Client');

        $this->get(route('admin.clients.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.clients.store'), $client->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateClient()
    {
        $client = create('App\Models\Client');

        $this->get(route('admin.clients.edit', $client->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.clients.update', $client->id), $client->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyClient()
    {
        $client = create('App\Models\Client');

        $this->delete(route('admin.clients.destroy', $client->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
