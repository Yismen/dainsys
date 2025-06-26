<?php

namespace Tests\Feature\AttendanceCodes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_unuthorized_users_cant_view_attendance_code()
    {
        $attendance_code = create(\App\Models\AttendanceCode::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.attendance_codes.index'))
            ->assertForbidden();

        // $response->get(route('admin.attendance_codes.show', $attendance_code->id))
        //     ->assertForbidden();
    }

    public function test_unuthorized_users_cant_createt_attendance_code()
    {
        $attendance_code = create(\App\Models\AttendanceCode::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.attendance_codes.store'))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_edit_attendance_code()
    {
        $attendance_code = create(\App\Models\AttendanceCode::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.attendance_codes.update', $attendance_code->id))
            ->assertForbidden();
    }

    public function test_unuthorized_users_cant_destroy_attendance_code()
    {
        $attendance_code = create(\App\Models\AttendanceCode::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.attendance_codes.destroy', $attendance_code->id))
            ->assertForbidden();
    }
}
