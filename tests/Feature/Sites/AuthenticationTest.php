<?php

namespace Tests\Feature\Sites;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_sites()
    {
        $site = create(\App\Models\Site::class);

        $this->get(route('admin.sites.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.sites.show', $site->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_sites()
    {
        $site = create(\App\Models\Site::class);

        $this->get(route('admin.sites.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.sites.store'), $site->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_site()
    {
        $site = create(\App\Models\Site::class);

        $this->get(route('admin.sites.edit', $site->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.sites.update', $site->id), $site->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_site()
    {
        $site = create(\App\Models\Site::class);

        $this->delete(route('admin.sites.destroy', $site->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
