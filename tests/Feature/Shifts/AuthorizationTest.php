<?php

namespace Tests\Feature\Shifts;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_shift()
    {
        $shift = create(\App\Models\Shift::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.shifts.index'))
            ->assertForbidden();

        $response->get(route('admin.shifts.show', $shift->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_shift()
    {
        $shift = create(\App\Models\Shift::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.shifts.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_shift()
    {
        $shift = create(\App\Models\Shift::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.shifts.update', $shift->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_shift()
    {
        $shift = create(\App\Models\Shift::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.shifts.destroy', $shift->id))
            ->assertForbidden();
    }
}
