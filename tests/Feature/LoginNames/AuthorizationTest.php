<?php

namespace Tests\Feature\LoginNames;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewLoginName()
    {
        $login_name = create('App\LoginName');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.login_names.index'))
            ->assertForbidden();

        $response->get(route('admin.login_names.show', $login_name->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetLoginName()
    {
        $login_name = create('App\LoginName');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.login_names.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditLoginName()
    {
        $login_name = create('App\LoginName');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.login_names.update', $login_name->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyLoginName()
    {
        $login_name = create('App\LoginName');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.login_names.destroy', $login_name->id))
            ->assertForbidden();
    }
}
