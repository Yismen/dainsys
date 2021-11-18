<?php

namespace Tests\Feature\Sites;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewSites()
    {
        $site = create('App\Site');

        $this->get(route('admin.sites.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.sites.show', $site->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateSites()
    {
        $site = create('App\Site');

        $this->get(route('admin.sites.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.sites.store'), $site->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateSite()
    {
        $site = create('App\Site');

        $this->get(route('admin.sites.edit', $site->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.sites.update', $site->id), $site->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroySite()
    {
        $site = create('App\Site');

        $this->delete(route('admin.sites.destroy', $site->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
