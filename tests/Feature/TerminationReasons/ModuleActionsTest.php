<?php

namespace Tests\Feature\TerminationReasons;

use App\TerminationReason;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModuleActionsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_lists_all_users_assigned_with_termination_reasons()
    {
        $user = $this->userWithPermission('view-termination-reasons');
        $this->be($user);
        $termination_reason = create(TerminationReason::class);

        $this->get(route('admin.termination_reasons.index'))
            ->assertOk()
            ->assertViewIs('termination_reasons.index');
    }

    /** @test */
    public function authorized_users_can_store_termination_reason()
    {
        $termination_reason = make(TerminationReason::class)->toArray();

        $this->actingAs($this->userWithPermission('create-termination-reasons'))
            ->post(route('admin.termination_reasons.store'), $termination_reason)
            ->assertRedirect()
            ->assertLocation(route('admin.termination_reasons.index'));

        $this->assertDatabaseHas('termination_reasons', $termination_reason);
    }

    /** @test */
    public function authorized_users_can_see_edit_page()
    {
        $termination_reason = create(TerminationReason::class);

        $this->actingAs($this->userWithPermission('edit-termination-reasons'))
            ->get(route('admin.termination_reasons.edit', $termination_reason->id))
            ->assertOk()
            ->assertViewIs('termination_reasons.edit');
    }

    /** @test */
    public function authorized_users_can_update_termination_reason()
    {
        $termination_reason = create(TerminationReason::class);

        $data_array = [
            'reason' => 'New Name',
        ];

        $this->actingAs($this->userWithPermission('edit-termination-reasons'))
            ->put(route('admin.termination_reasons.update', $termination_reason->id), array_merge($termination_reason->toArray(), $data_array))
            ->assertLocation(route('admin.termination_reasons.index'));

        $this->assertDatabaseHas('termination_reasons', $data_array);
    }
}
