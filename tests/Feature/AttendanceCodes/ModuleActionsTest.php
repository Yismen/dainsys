<?php

namespace Tests\Feature\AttendanceCodes;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function authorized_users_can_see_attendance_codes_list()
    {
        // $this->withoutExceptionHandling();
        $attendance_code = create('App\Models\AttendanceCode')->toArray();
        $this->actingAs($this->userWithPermission('view-attendance-codes'));

        $response = $this->get(route('admin.attendance_codes.index'));

        $response->assertOk();
        // $response->assertViewIs('attendance_codes.index');
    }

    /** @test */
    public function authorized_users_can_create_a_attendance_code()
    {
        $this->actingAs($this->userWithPermission('create-attendance-codes'));
        $attendance_code = make('App\Models\AttendanceCode')->toArray();

        $this->post(route('admin.attendance_codes.store'), $attendance_code)
            ->assertRedirect(route('admin.attendance_codes.index'));

        $this->assertDatabaseHas('attendance_codes', [
            'name' => $attendance_code['name'],
            'color' => $attendance_code['color'],
        ]);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $attendance_code = create('App\Models\AttendanceCode');
        $this->actingAs($this->userWithPermission('edit-attendance-codes'));

        $this->get(route('admin.attendance_codes.edit', $attendance_code->id))
            ->assertOk()
            ->assertViewIs('attendance_codes.edit')
            ->assertSee('Edit Attendance Code')
            ->assertSee($attendance_code->color)
            ->assertSee('Name:')
            ->assertSee($attendance_code->name)
            ->assertSee('Is Absence:')
            ->assertSee($attendance_code->absence)
            ->assertSee('UPDATE');
    }

    /** @test */
    public function authorized_users_can_update_attendance_code()
    {
        $attendance_code = create('App\Models\AttendanceCode');
        $updated = [
            'name' => 'Updated Name',
            'color' => '#F4f4f4',
            'absence' => !$attendance_code->absence,
        ];

        $response = $this->actingAs($this->userWithPermission('edit-attendance-codes'));

        $response->put(route('admin.attendance_codes.update', $attendance_code->id), $updated)
            ->assertRedirect(route('admin.attendance_codes.edit', $attendance_code->id));

        $this->assertDatabaseMissing('attendance_codes', $attendance_code->toArray());

        $this->assertDatabaseHas('attendance_codes', $updated);
    }
}
