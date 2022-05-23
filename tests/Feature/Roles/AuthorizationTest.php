<?php

namespace Tests\Feature\Roles;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewRole()
    {
        $role = create('App\Models\Role');
        $response = $this->actingAs($this->userWithRole('wrong-role'));

        $response->get(route('admin.roles.index'))
            ->assertForbidden();

        $response->get(route('admin.roles.show', $role->name))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetRole()
    {
        $role = create('App\Models\Role');
        $response = $this->actingAs($this->userWithRole('wrong-role'));

        $response->post(route('admin.roles.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditRole()
    {
        $role = create('App\Models\Role');
        $response = $this->actingAs($this->userWithRole('wrong-role'));

        $response->put(route('admin.roles.update', $role->name))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyRole()
    {
        $role = create('App\Models\Role');
        $response = $this->actingAs($this->userWithRole('wrong-role'));

        $response->delete(route('admin.roles.destroy', $role->name))
            ->assertForbidden();
    }
}
