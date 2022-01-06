<?php

namespace Tests\Feature\Position;

use App\Position;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Arr;

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
    public function authorized_users_can_destroy_position()
    {
        $position = create(Position::class);

        $this->actingAs($this->userWithPermission('destroy-positions'))
            ->delete(route('admin.positions.destroy', $position->id))
            ->assertRedirect()
            ->assertLocation(route('admin.positions.index'));

        $this->assertDatabaseMissing('positions', $position->toArray());
    }
}
