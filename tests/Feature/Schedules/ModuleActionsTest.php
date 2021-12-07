<?php

namespace Tests\Feature\Schedules;

use App\Schedule;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_schedules()
    {
        $user = $this->userWithPermission('view-schedules');
        $this->be($user);
        $schedule = create(Schedule::class);

        $this->get(route('admin.schedules.index'))
            ->assertOk()
            ->assertViewIs('schedules.index');
    }

    /** @test */
    public function authorized_users_can_store_schedule()
    {
        $schedule = make(Schedule::class)->toArray();

        $this->artisan('dainsys:feed-shifts --hours=7.5 --saturday=1');

        $this->actingAs($this->userWithPermission('create-schedules'))
            ->post(route('admin.schedules.store'), $schedule)
            ->assertRedirect()
            ->assertLocation(route('admin.schedules.index'));

        // $this->assertDatabaseHas('schedules', $schedule);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $schedule = create(Schedule::class);

        $this->actingAs($this->userWithPermission('edit-schedules'))
            ->get(route('admin.schedules.edit', $schedule->id))
            ->assertOk()
            ->assertViewIs('schedules.edit');
    }

    /** @test */
    public function authorized_users_can_update_schedule()
    {
        $schedule = create(Schedule::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-schedules'))
            ->put(route('admin.schedules.update', $schedule->id), array_merge($schedule->toArray(), $data_array))
            ->assertLocation(route('admin.schedules.index'));

        // $this->assertDatabaseHas('schedules', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_schedule()
    {
        $schedule = create(Schedule::class);

        $this->actingAs($this->userWithPermission('destroy-schedules'))
            ->delete(route('admin.schedules.destroy', $schedule->id))
            ->assertRedirect()
            ->assertLocation(route('admin.schedules.index'));

        $this->assertDatabaseMissing('schedules', $schedule->toArray());
    }
}
