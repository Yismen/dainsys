<?php

namespace Tests\Feature\Employee;

use App\Termination;
use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReactivationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function inactive_employee_can_be_reactivated()
    {
        $termination = create(Termination::class);
        $employee = $termination->employee;
        $attributes = ['hire_date' => now()];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.reactivate', $employee->id), $attributes);

        $response->assertOk();
        $this->assertSoftDeleted('terminations', ['employee_id' => $employee->id]);
        $this->assertDatabaseHas('employees', ['id' => $employee->id, 'hire_date' => $attributes['hire_date']->format('Y-m-d')]);
    }

    /** @test */
    public function employee_reactivation_data_is_validated()
    {
        $termination = create(Termination::class);
        $employee = $termination->employee;
        $attributes = ['hire_date' => ''];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.reactivate', $employee->id), $attributes);

        $response->assertRedirect()
            ->assertInvalid(['hire_date']);
    }
}
