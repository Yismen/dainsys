<?php

namespace Tests\Feature\LoginNames;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_login_name()
    {
        $login_name = create(\App\Models\LoginName::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.login_names.index'))
            ->assertForbidden();

        $response->get(route('admin.login_names.show', $login_name->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_login_name()
    {
        $login_name = create(\App\Models\LoginName::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.login_names.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_login_name()
    {
        $login_name = create(\App\Models\LoginName::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.login_names.update', $login_name->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_login_name()
    {
        $login_name = create(\App\Models\LoginName::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.login_names.destroy', $login_name->id))
            ->assertForbidden();
    }
}
