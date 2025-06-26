<?php

namespace Tests\Feature\Punches;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_punch()
    {
        $punch = create(\App\Models\Punch::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.punches.index'))
            ->assertForbidden();

        $response->get(route('admin.punches.show', $punch->punch))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_punch()
    {
        $punch = create(\App\Models\Punch::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.punches.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_punch()
    {
        $punch = create(\App\Models\Punch::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.punches.update', $punch->punch))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_punch()
    {
        $punch = create(\App\Models\Punch::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.punches.destroy', $punch->punch))
            ->assertForbidden();
    }
}
