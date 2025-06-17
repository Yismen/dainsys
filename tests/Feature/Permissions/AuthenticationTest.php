<?php

namespace Tests\Feature\Permissions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_permissions()
    {
        $permission = create(\App\Models\Permission::class);

        $this->get(route('admin.permissions.index'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->get(route('admin.permissions.show', $permission->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_create_permissions()
    {
        $permission = create(\App\Models\Permission::class);

        $this->get(route('admin.permissions.create'))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->post(route('admin.permissions.store'), $permission->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_update_permission()
    {
        $permission = create(\App\Models\Permission::class);

        $this->get(route('admin.permissions.edit', $permission->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));

        $this->put(route('admin.permissions.update', $permission->id), $permission->toArray())
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    public function test_guest_cant_destroy_permission()
    {
        $permission = create(\App\Models\Permission::class);

        $this->delete(route('admin.permissions.destroy', $permission->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }
}
