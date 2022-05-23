<?php

namespace Tests\Feature\Employee;

use App\Models\Termination;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TerminationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_termination_is_created()
    {
        $employee = create(Employee::class);
        $termination = make(Termination::class)->toArray();

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.terminate', $employee->id), $termination);

        $response->assertOk();
        $this->assertDatabaseHas('terminations', ['employee_id' => $employee->id]);
    }

    /** @test */
    public function employee_termination_data_is_validated()
    {
        $termination = create(Termination::class);
        $updated_attributes = [
            'employee_id' => '',
            'termination_date' => '',
            'termination_reason_id' => '',
            'can_be_rehired' => '',
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.terminate', $termination->employee->id), $updated_attributes);

        $response->assertInvalid(['termination_date', 'termination_reason_id', 'can_be_rehired']);
    }
}
