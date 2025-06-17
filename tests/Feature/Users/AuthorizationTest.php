<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_user()
    {
        $user = create(\App\Models\User::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.users.index'))
            ->assertForbidden();

        $response->get(route('admin.users.show', $user->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_user()
    {
        $user = create(\App\Models\User::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.users.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_user()
    {
        $user = create(\App\Models\User::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.users.update', $user->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_user()
    {
        $user = create(\App\Models\User::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.users.destroy', $user->id))
            ->assertForbidden();
    }
}
