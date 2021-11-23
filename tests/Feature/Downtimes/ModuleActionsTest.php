<?php

namespace Tests\Feature\Downtimes;

use App\Downtime;
use App\DowntimeCode;
use App\Employee;
use App\Supervisor;
use App\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_downtimes()
    {
        $user = $this->userWithPermission('view-downtimes');
        $this->be($user);
        $downtime = create(Downtime::class);

        $this->get(route('admin.downtimes.index'))
            ->assertRedirect(route('admin.downtimes.create'));
    }

    /** @test */
    public function authorized_users_can_store_downtime()
    {
        $downtime = make(Downtime::class)->toArray();

        $this->actingAs($this->userWithPermission('create-downtimes'))
            ->post(route('admin.downtimes.store', $downtime))
            ->assertRedirect()
            ->assertLocation(route('admin.downtimes.create'));

        $this->assertDatabaseHas('performances', $downtime);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $downtime = create(Downtime::class);

        $this->actingAs($this->userWithPermission('edit-downtimes'))
            ->get(route('admin.downtimes.edit', $downtime->id))
            ->assertOk()
            ->assertViewIs('downtimes.edit');
    }

    /** @test */
    public function authorized_users_can_update_downtime()
    {
        $downtime = create(Downtime::class);
        $employee2 = create(Employee::class);

        $data_array = [
            'employee_id' => $employee2->id,
        ];

        $this->actingAs($this->userWithPermission('edit-downtimes'))
            ->put(route('admin.downtimes.update', $downtime->id), array_merge($downtime->toArray(), $data_array))
            ->assertRedirect();

        $this->assertDatabaseHas('performances', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_downtime()
    {
        $downtime = create(Downtime::class);

        $this->actingAs($this->userWithPermission('destroy-downtimes'))
            ->delete(route('admin.downtimes.destroy', $downtime->id))
            ->assertOk();

        $this->assertDatabaseMissing('performances', $downtime->toArray());
    }
}
