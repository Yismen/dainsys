<?php

namespace Tests\Feature\TerminationReasons;

use App\Models\TerminationReason;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function reason_field_is_required()
    {
        $termination_reason = create(TerminationReason::class)->toArray();

        $this->actingAs($this->userWithPermission('create-termination_reasons'))
            ->post(route('admin.termination_reasons.store'), array_merge($termination_reason, ['reason' => '']))
            ->assertSessionHasErrors('reason');

        $this->actingAs($this->userWithPermission('edit-termination_reasons'))
            ->put(route('admin.termination_reasons.update', $termination_reason['id']), array_merge($termination_reason, ['reason' => '']))
            ->assertSessionHasErrors('reason');
    }
}
