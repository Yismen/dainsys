<?php

namespace Tests\Feature\LoginNames;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewLoginNames()
    {
        $login_name = create('App\Models\LoginName');

        $this->get(route('admin.login_names.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.login_names.show', $login_name->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateLoginNames()
    {
        $login_name = create('App\Models\LoginName');

        $this->get(route('admin.login_names.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.login_names.store'), $login_name->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateLoginName()
    {
        $login_name = create('App\Models\LoginName');

        $this->get(route('admin.login_names.edit', $login_name->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.login_names.update', $login_name->id), $login_name->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyLoginName()
    {
        $login_name = create('App\Models\LoginName');

        $this->delete(route('admin.login_names.destroy', $login_name->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
