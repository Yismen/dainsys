<?php

namespace Tests\Feature\Employee;

use App\Ars;
use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_ars_is_assigned()
    {
        $employee = create(Employee::class);
        $ars = create(Ars::class);

        $response = $this
            ->actingAs($this->user())
            ->put(route('admin.employees.update-ars', $employee->id), ['ars_id' => $ars->id]);

        $response->assertOk();
        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'ars_id' => $ars->id,
        ]);
    }

    /** @test */
    public function employee_ars_data_is_validated()
    {
        $ars = create(Ars::class);
        $employee = create(Employee::class);

        $response = $this
            ->actingAs($this->user())
            ->put(route('admin.employees.update-ars', $employee->id), ['ars_id' => '']);

        $response->assertRedirect()
            ->assertInvalid(['ars_id']);
    }
}
