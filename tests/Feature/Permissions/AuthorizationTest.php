<?php

namespace Tests\Feature\Permissions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_permission()
    {
        $permission = create(\App\Models\Permission::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.permissions.index'))
            ->assertForbidden();

        $response->get(route('admin.permissions.show', $permission->name))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_permission()
    {
        $permission = create(\App\Models\Permission::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.permissions.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_permission()
    {
        $permission = create(\App\Models\Permission::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.permissions.update', $permission->name))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_permission()
    {
        $permission = create(\App\Models\Permission::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.permissions.destroy', $permission->name))
            ->assertForbidden();
    }
}
