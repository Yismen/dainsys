<?php

namespace Tests\Feature\Roles;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testGuestCantViewRoles()
    {
        $role = create('App\Models\Role');

        $this->get(route('admin.roles.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.roles.show', $role->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantCreateRoles()
    {
        $role = create('App\Models\Role');

        $this->get(route('admin.roles.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.roles.store'), $role->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantUpdateRole()
    {
        $role = create('App\Models\Role');

        $this->get(route('admin.roles.edit', $role->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.roles.update', $role->id), $role->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function testGuestCantDestroyRole()
    {
        $role = create('App\Models\Role');

        $this->delete(route('admin.roles.destroy', $role->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
