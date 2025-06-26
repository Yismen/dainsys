<?php

namespace Tests\Feature\Position;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Termination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_positions()
    {
        $user = $this->userWithPermission('view-positions');
        $this->be($user);
        $position = create(Position::class);

        $this->get(route('admin.positions.index'))
            ->assertOk()
            ->assertViewIs('positions.index');
    }

    /** @test */
    public function authorized_users_can_store_position()
    {
        $position = make(Position::class)->toArray();

        $this->actingAs($this->userWithPermission('create-positions'))
            ->post(route('admin.positions.store', $position))
            ->assertRedirect()
            ->assertLocation(route('admin.positions.index'));

        $this->assertDatabaseHas('positions', Arr::only($position, ['name', 'salary']));
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $position = create(Position::class);

        $this->actingAs($this->userWithPermission('edit-positions'))
            ->get(route('admin.positions.edit', $position->id))
            ->assertOk()
            ->assertViewIs('positions.edit');
    }

    /** @test */
    public function authorized_users_can_update_position()
    {
        $position = create(Position::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-positions'))
            ->put(route('admin.positions.update', $position->id), array_merge($position->toArray(), $data_array))
            ->assertLocation(route('admin.positions.index'));

        $this->assertDatabaseHas('positions', $data_array);
    }

    /** @test */
    public function position_cannot_be_destroyed_if_has_active_employees()
    {
        $position = create(Position::class);
        $active_employee = Employee::factory()->create(['position_id' => $position->id]);

        $this->actingAs($this->userWithPermission('destroy-positions'));
        $response = $this->delete(route('admin.positions.destroy', $position->id));

        $response->assertForbidden();

        $this->assertDatabaseHas('positions', ['id' => $position->id]);
        $this->assertNotSoftDeleted('positions', ['id' => $position->id]);
    }

    /** @test */
    public function authorized_users_can_destroy_position_if_it_doesnot_have_employees_assigned()
    {
        $position = create(Position::class);

        $this->actingAs($this->userWithPermission('destroy-positions'))
            ->delete(route('admin.positions.destroy', $position->id))
            ->assertRedirect()
            ->assertLocation(route('admin.positions.index'));

        $this->assertDatabaseMissing('positions', $position->toArray());
        $this->assertSoftDeleted('positions', ['id' => $position->id]);
    }

    /** @test */
    public function authorized_users_can_destroy_position_if_all_its_employees_are_inactive()
    {
        $position = create(Position::class);
        $inactive_employee = Employee::factory()->create(['position_id' => $position->id]);
        Termination::factory()->create(['employee_id' => $inactive_employee]);

        $this->actingAs($this->userWithPermission('destroy-positions'))
            ->delete(route('admin.positions.destroy', $position->id))
            ->assertRedirect()
            ->assertLocation(route('admin.positions.index'));

        $this->assertDatabaseMissing('positions', $position->toArray());
        $this->assertSoftDeleted('positions', ['id' => $position->id]);
    }
}
