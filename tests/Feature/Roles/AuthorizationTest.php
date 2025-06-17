<?php

namespace Tests\Feature\Roles;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_role()
    {
        $role = create(\App\Models\Role::class);
        $response = $this->actingAs($this->userWithRole('wrong-role'));

        $response->get(route('admin.roles.index'))
            ->assertForbidden();

        $response->get(route('admin.roles.show', $role->name))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_role()
    {
        $role = create(\App\Models\Role::class);
        $response = $this->actingAs($this->userWithRole('wrong-role'));

        $response->post(route('admin.roles.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_role()
    {
        $role = create(\App\Models\Role::class);
        $response = $this->actingAs($this->userWithRole('wrong-role'));

        $response->put(route('admin.roles.update', $role->name))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_role()
    {
        $role = create(\App\Models\Role::class);
        $response = $this->actingAs($this->userWithRole('wrong-role'));

        $response->delete(route('admin.roles.destroy', $role->name))
            ->assertForbidden();
    }
}
