<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewUser()
    {
        $user = create('App\User');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.users.index'))
            ->assertForbidden();

        $response->get(route('admin.users.show', $user->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetUser()
    {
        $user = create('App\User');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.users.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditUser()
    {
        $user = create('App\User');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.users.update', $user->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyUser()
    {
        $user = create('App\User');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.users.destroy', $user->id))
            ->assertForbidden();
    }
}
