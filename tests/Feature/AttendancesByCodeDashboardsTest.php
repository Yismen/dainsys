<?php

namespace Tests\Feature;

use App\Models\AttendanceCode;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AttendancesByCodeDashboardsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Autentication Tests
     */

    /** @test */
    public function unauthenticated_users_can_not_see_attendances_by_code_dashboard()
    {
        $attendances_code = create(AttendanceCode::class);

        $this->get(route('admin.attendances.code', $attendances_code->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function unauthenticated_users_can_not_see_attendances_by_code_by_employee_dashboard()
    {
        $attendances_code = create(AttendanceCode::class);

        $this->get(route('admin.attendances.code.employees', $attendances_code->id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /**
     * Authorization tests
     */

    /** @test */
    public function unauthorized_users_can_not_see_attendances_by_code_dashboard()
    {
        $attendance_code = create(AttendanceCode::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.attendances.code', $attendance_code))
            ->assertForbidden();
    }

    /** @test */
    public function unauthorized_users_can_not_see_attendances_by_code_by_employee_dashboard()
    {
        $attendance_code = create(AttendanceCode::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.attendances.code.employees', $attendance_code->id))
            ->assertForbidden();
    }

    /**
     * Actions Tests
     */

    /** @test */
    public function it_shows_attendances_cy_codes_dashboard()
    {
        $user = $this->userWithPermission('view-attendances');
        $this->be($user);
        $attendance_code = create(AttendanceCode::class);

        $this->get(route('admin.attendances.code', $attendance_code->id))
            ->assertOk()
            ->assertViewIs('attendances._by_codes');
    }

    /** @test */
    public function it_shows_attendances_by_codes_by_employee_dashboard()
    {
        $user = $this->userWithPermission('view-attendances');
        $this->be($user);
        $attendance_code = create(AttendanceCode::class);

        $this->get(route('admin.attendances.code.employees', $attendance_code->id))
            ->assertOk()
            ->assertViewIs('attendances._by_codes_employees');
    }
}
