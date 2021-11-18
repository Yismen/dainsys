<?php

namespace Tests\Feature\DowntimeReasons;

use App\DowntimeReason;
use App\DowntimeReasonCode;
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
    public function it_lists_all_users_assigned_with_downtime_reasons()
    {
        $user = $this->userWithPermission('view-downtime_reasons');
        $this->be($user);
        $downtime_reason = create(DowntimeReason::class);

        $this->get(route('admin.downtime_reasons.index'))
            ->assertOk()
            ->assertViewIs('downtime_reasons.index');
    }

    /** @test */
    public function authorized_users_can_store_downtime_reason()
    {
        $downtime_reason = make(DowntimeReason::class)->toArray();

        $this->actingAs($this->userWithPermission('create-downtime_reasons'))
            ->post(route('admin.downtime_reasons.store', $downtime_reason))
            ->assertRedirect()
            ->assertLocation(route('admin.downtime_reasons.index'));

        $this->assertDatabaseHas('downtime_reasons', $downtime_reason);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $downtime_reason = create(DowntimeReason::class);

        $this->actingAs($this->userWithPermission('edit-downtime_reasons'))
            ->get(route('admin.downtime_reasons.edit', $downtime_reason->id))
            ->assertOk()
            ->assertViewIs('downtime_reasons.edit');
    }

    /** @test */
    public function authorized_users_can_update_downtime_reason()
    {
        $downtime_reason = create(DowntimeReason::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-downtime_reasons'))
            ->put(route('admin.downtime_reasons.update', $downtime_reason->id), array_merge($downtime_reason->toArray(), $data_array))
            ->assertLocation(route('admin.downtime_reasons.index'));

        $this->assertDatabaseHas('downtime_reasons', $data_array);
    }

    /** @test */
    // public function authorized_users_can_destroy_downtime_reason()
    // {
    //     $downtime_reason = create(DowntimeReason::class);

    //     $this->actingAs($this->userWithPermission('destroy-downtime_reasons'))
    //         ->delete(route('admin.downtime_reasons.destroy', $downtime_reason->id))
    //         ->assertRedirect()
    //         ->assertLocation(route('admin.downtime_reasons.index'));

    //     $this->assertDatabaseMissing('downtime_reasons', $downtime_reason->toArray());
    // }
}
