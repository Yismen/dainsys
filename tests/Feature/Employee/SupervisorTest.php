<?php

namespace Tests\Feature\Employee;

use App\Supervisor;
use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class SupervisorTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_supervisor_is_assigned()
    {
        $this->withoutExceptionHandling();
        $employee = create(Employee::class);
        $supervisor = create(Supervisor::class);

        $response = $this
            ->actingAs($this->user())
            ->put(route('admin.employees.update-supervisor', $employee->id), ['supervisor_id' => $supervisor->id]);

        $response->assertOk();
        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'supervisor_id' => $supervisor->id,
        ]);
    }

    /** @test */
    public function employee_supervisor_data_is_validated()
    {
        $supervisor = create(Supervisor::class);
        $employee = create(Employee::class);

        $response = $this
            ->actingAs($this->user())
            ->put(route('admin.employees.update-supervisor', $employee->id), ['supervisor_id' => '']);

        $response->assertRedirect()
            ->assertInvalid(['supervisor_id']);
    }
}
