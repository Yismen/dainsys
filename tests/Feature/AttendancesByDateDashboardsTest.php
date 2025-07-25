<?php

namespace Tests\Feature;

use App\Models\Attendance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AttendancesByDateDashboardsTest extends TestCase
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

        $this->get(route('admin.attendances.date', $attendance->date))
            ->assertStatus(302)
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function unauthenticated_users_can_not_see_attendances_by_date_by_code_dashboard()
    {
        $attendance = create(Attendance::class);

        $this->get(route('admin.attendances.date.code', ['date' => $attendance->date, 'code' => $attendance->code_id]))
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

        $response->get(route('admin.attendances.date', $attendance->date))
            ->assertForbidden();
    }

    /** @test */
    public function unauthorized_users_can_not_see_attendances_by_date_by_code_dashboard()
    {
        $attendance = create(Attendance::class);
        $response = $this->actingAs($this->userWithPermission('wrong-permission'));

        $response->get(route('admin.attendances.date.code', ['date' => $attendance->date, 'code' => $attendance->code_id]))
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

        $this->get(route('admin.attendances.date', $attendance->date))
            ->assertOk()
            ->assertViewIs('attendances._by_date');
    }

    /** @test */
    public function it_shows_attendances_by_dates_by_code_dashboard()
    {
        $user = $this->userWithPermission('view-attendances');
        $this->be($user);
        $attendance = create(Attendance::class);

        $this->get(route('admin.attendances.date.code', ['date' => $attendance->date, 'code' => $attendance->code_id]))
            ->assertOk()
            ->assertViewIs('attendances._by_date_code');
    }
}
