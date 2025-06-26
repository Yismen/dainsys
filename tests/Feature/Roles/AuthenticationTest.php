<?php

namespace Tests\Feature\Roles;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_roles()
    {
        $role = create(\App\Models\Role::class);

        $this->get(route('admin.roles.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.roles.show', $role->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_roles()
    {
        $role = create(\App\Models\Role::class);

        $this->get(route('admin.roles.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.roles.store'), $role->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_role()
    {
        $role = create(\App\Models\Role::class);

        $this->get(route('admin.roles.edit', $role->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.roles.update', $role->id), $role->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_role()
    {
        $role = create(\App\Models\Role::class);

        $this->delete(route('admin.roles.destroy', $role->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
