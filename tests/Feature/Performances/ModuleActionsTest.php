<?php

namespace Tests\Feature\Performances;

use App\Models\Performance;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_performances()
    {
        $user = $this->userWithPermission('view-performances');
        $this->be($user);
        $performance = create(Performance::class);

        $this->get(route('admin.performances.index'))
            ->assertOk()
            ->assertViewIs('performances.index');
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $performance = create(Performance::class);

        $this->actingAs($this->userWithPermission('edit-performances'))
            ->get(route('admin.performances.edit', $performance->id))
            ->assertOk()
            ->assertViewIs('performances.edit');
    }

    /** @test */
    public function authorized_users_can_update_performance()
    {
        $performance = create(Performance::class);

        $data_array = [
            'date' => now()->format('Y-m-d'),
        ];

        $this->actingAs($this->userWithPermission('edit-performances'))
            ->put(route('admin.performances.update', $performance->id), array_merge($performance->toArray(), $data_array))
            ->assertRedirect();

        $this->assertDatabaseHas('performances', $data_array);
    }

    /** @test */
    public function authorized_users_can_destroy_performance()
    {
        $performance = create(Performance::class);

        $this->actingAs($this->userWithPermission('destroy-performances'))
            ->delete(route('admin.performances.destroy', $performance->id))
            ->assertOk();

        $this->assertDatabaseMissing('performances', $performance->toArray());
    }
}
