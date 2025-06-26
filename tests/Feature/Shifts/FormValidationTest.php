<?php

namespace Tests\Feature\Shifts;

use App\Models\Shift;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormValidationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function employee_id_field_is_required()
    {
        $shift = create(Shift::class)->toArray();

        $this->actingAs($this->userWithPermission('create-shifts'))
            ->post(route('admin.shifts.store'), array_merge($shift, ['employee_id' => '']))
            ->assertSessionHasErrors('employee_id');

        $this->actingAs($this->userWithPermission('edit-shifts'))
            ->put(route('admin.shifts.update', $shift['id']), array_merge($shift, ['employee_id' => '']))
            ->assertSessionHasErrors('employee_id');
    }
}
