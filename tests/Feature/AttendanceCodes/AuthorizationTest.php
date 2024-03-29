<?php

namespace Tests\Feature\AttendanceCodes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testUnuthorizedUsersCantViewAttendanceCode()
    {
        $attendance_code = create('App\Models\AttendanceCode');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.attendance_codes.index'))
            ->assertForbidden();

        // $response->get(route('admin.attendance_codes.show', $attendance_code->id))
        //     ->assertForbidden();
    }

    public function testUnuthorizedUsersCantCreatetAttendanceCode()
    {
        $attendance_code = create('App\Models\AttendanceCode');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->post(route('admin.attendance_codes.store'))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantEditAttendanceCode()
    {
        $attendance_code = create('App\Models\AttendanceCode');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->put(route('admin.attendance_codes.update', $attendance_code->id))
            ->assertForbidden();
    }

    public function testUnuthorizedUsersCantDestroyAttendanceCode()
    {
        $attendance_code = create('App\Models\AttendanceCode');
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->delete(route('admin.attendance_codes.destroy', $attendance_code->id))
            ->assertForbidden();
    }
}
