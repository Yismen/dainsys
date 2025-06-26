<?php

namespace Tests\Feature\AttendanceCodes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_cant_view_attendance_codes()
    {
        $attendance_code = create(\App\Models\AttendanceCode::class);

        $this->get(route('admin.attendance_codes.index'))->assertRedirect('/login');
    }

    public function test_guest_cant_edit_attendance_codes()
    {
        $attendance_code = create(\App\Models\AttendanceCode::class);

        $this->put(route('admin.attendance_codes.update', $attendance_code->id))->assertRedirect('/login');
    }

    public function test_guest_cant_destroy_attendance_code()
    {
        $attendance_code = create(\App\Models\AttendanceCode::class);

        $this->delete(route('admin.attendance_codes.destroy', $attendance_code->id))->assertRedirect('/login');
    }
}
