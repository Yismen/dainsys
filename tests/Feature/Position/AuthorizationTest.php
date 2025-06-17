<?php

namespace Tests\Feature\Position;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_position()
    {
        $position = create(\App\Models\Position::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.positions.index'))
            ->assertForbidden();

        $response->get(route('admin.positions.show', $position->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_position()
    {
        $position = create(\App\Models\Position::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.positions.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_position()
    {
        $position = create(\App\Models\Position::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.positions.update', $position->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_position()
    {
        $position = create(\App\Models\Position::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.positions.destroy', $position->id))
            ->assertForbidden();
    }
}
