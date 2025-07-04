<?php

namespace Tests\Feature\TerminationTypes;

use App\Models\TerminationType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function name_field_is_required()
    {
        $termination_type = create(TerminationType::class)->toArray();

        $this->actingAs($this->userWithPermission('create-termination_types'))
            ->post(route('admin.termination_types.store'), array_merge($termination_type, ['name' => '']))
            ->assertSessionHasErrors('name');

        $this->actingAs($this->userWithPermission('edit-termination_types'))
            ->put(route('admin.termination_types.update', $termination_type['id']), array_merge($termination_type, ['name' => '']))
            ->assertSessionHasErrors('name');
    }
}
