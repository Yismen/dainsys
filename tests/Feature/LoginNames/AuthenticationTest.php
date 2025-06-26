<?php

namespace Tests\Feature\LoginNames;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_login_names()
    {
        $login_name = create(\App\Models\LoginName::class);

        $this->get(route('admin.login_names.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.login_names.show', $login_name->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_login_names()
    {
        $login_name = create(\App\Models\LoginName::class);

        $this->get(route('admin.login_names.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.login_names.store'), $login_name->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_login_name()
    {
        $login_name = create(\App\Models\LoginName::class);

        $this->get(route('admin.login_names.edit', $login_name->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.login_names.update', $login_name->id), $login_name->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_login_name()
    {
        $login_name = create(\App\Models\LoginName::class);

        $this->delete(route('admin.login_names.destroy', $login_name->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
