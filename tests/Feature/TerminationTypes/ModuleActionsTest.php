<?php

namespace Tests\Feature\TerminationTypes;

use App\TerminationType;
use App\TerminationTypeCode;
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
    public function it_lists_all_users_assigned_with_termination_types()
    {
        $user = $this->userWithPermission('view-termination-types');
        $this->be($user);
        $termination_type = create(TerminationType::class);

        $this->get(route('admin.termination_types.index'))
            ->assertOk()
            ->assertViewIs('termination_types.index');
    }

    /** @test */
    public function authorized_users_can_store_termination_type()
    {
        $termination_type = make(TerminationType::class)->toArray();

        $this->actingAs($this->userWithPermission('create-termination-types'))
            ->post(route('admin.termination_types.store'), $termination_type)
            ->assertRedirect()
            ->assertLocation(route('admin.termination_types.index'));

        $this->assertDatabaseHas('termination_types', $termination_type);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $termination_type = create(TerminationType::class);

        $this->actingAs($this->userWithPermission('edit-termination-types'))
            ->get(route('admin.termination_types.edit', $termination_type->id))
            ->assertOk()
            ->assertViewIs('termination_types.edit');
    }

    /** @test */
    public function authorized_users_can_update_termination_type()
    {
        $termination_type = create(TerminationType::class);

        $data_array = [
            'name' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-termination-types'))
            ->put(route('admin.termination_types.update', $termination_type->id), array_merge($termination_type->toArray(), $data_array))
            ->assertLocation(route('admin.termination_types.index'));

        $this->assertDatabaseHas('termination_types', $data_array);
    }
}
