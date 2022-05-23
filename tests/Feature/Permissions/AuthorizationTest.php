<?php

namespace Tests\Feature\Permissions;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewPermission()
    {
        $permission = create('App\Models\Permission');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.permissions.index'))
            ->assertForbidden();

        $response->get(route('admin.permissions.show', $permission->name))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetPermission()
    {
        $permission = create('App\Models\Permission');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.permissions.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditPermission()
    {
        $permission = create('App\Models\Permission');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.permissions.update', $permission->name))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyPermission()
    {
        $permission = create('App\Models\Permission');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.permissions.destroy', $permission->name))
            ->assertForbidden();
    }
}
