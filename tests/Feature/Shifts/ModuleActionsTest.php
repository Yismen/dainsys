<?php

namespace Tests\Feature\Shifts;

use App\Shift;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_shifts()
    {
        $user = $this->userWithPermission('view-shifts');
        $this->be($user);
        $shift = create(Shift::class);

        $this->get(route('admin.shifts.index'))
            ->assertOk()
            ->assertViewIs('shifts.index');
    }

    /** @test */
    public function authorized_users_can_store_shift()
    {
        $shift = make(Shift::class)->toArray();

        $this->actingAs($this->userWithPermission('create-shifts'))
            ->post(route('admin.shifts.store'), $shift)
            ->assertRedirect()
            ->assertLocation(route('admin.shifts.index'));

        // $this->assertDatabaseHas('shifts', $shift);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $shift = create(Shift::class);

        $this->actingAs($this->userWithPermission('edit-shifts'))
            ->get(route('admin.shifts.edit', $shift->id))
            ->assertOk()
            ->assertViewIs('shifts.edit');
    }

    /** @test */
    public function authorized_users_can_update_shift()
    {
        $shift = create(Shift::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-shifts'))
            ->put(route('admin.shifts.update', $shift->id), array_merge($shift->toArray(), $data_array))
            ->assertLocation(route('admin.shifts.index'));

        // $this->assertDatabaseHas('shifts', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_shift()
    {
        $shift = create(Shift::class);

        $this->actingAs($this->userWithPermission('destroy-shifts'))
            ->delete(route('admin.shifts.destroy', $shift->id))
            ->assertRedirect()
            ->assertLocation(route('admin.shifts.index'));

        $this->assertDatabaseMissing('shifts', $shift->toArray());
    }
}
