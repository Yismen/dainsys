<?php

namespace Tests\Feature;

use App\Attendance;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttendancesByEmployeeDashboardsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Autentication Tests
     */

    /** @test */
    public function unauthenticated_users_can_not_see_attendances_by_date_dashboard()
    {
        $attendance = create(Attendance::class);

        $this->get(route('admin.attendances.employee', $attendance->employee_id))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /**
     * Authorization tests
     */

    /** @test */
    public function unauthorized_users_can_not_see_attendances_by_date_dashboard()
    {
        $attendance = create(Attendance::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.attendances.employee', $attendance->employee_id))
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
        $attendance = create(Attendance::class);

        $this->get(route('admin.attendances.employee', $attendance->employee_id))
            ->assertOk()
            ->assertViewIs('attendances._by_employees');
    }
}
