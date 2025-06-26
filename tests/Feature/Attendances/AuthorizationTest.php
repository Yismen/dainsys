<?php

namespace Tests\Feature\Attendances;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_attendance()
    {
        $attendance = create(\App\Models\Attendance::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.attendances.index'))
            ->assertForbidden();

        $response->get(route('admin.attendances.show', $attendance->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_attendance()
    {
        $attendance = create(\App\Models\Attendance::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.attendances.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_attendance()
    {
        $attendance = create(\App\Models\Attendance::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.attendances.update', $attendance->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_attendance()
    {
        $attendance = create(\App\Models\Attendance::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.attendances.destroy', $attendance->id))
            ->assertForbidden();
    }
}
