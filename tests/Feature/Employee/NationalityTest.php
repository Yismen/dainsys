<?php

namespace Tests\Feature\Employee;

use App\Models\Nationality;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NationalityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_nationality_is_assigned()
    {
        $employee = create(Employee::class);
        $nationality = create(Nationality::class);

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-nationality', $employee->id), ['nationality_id' => $nationality->id]);

        $response->assertOk();
        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'nationality_id' => $nationality->id,
        ]);
    }

    /** @test */
    public function employee_nationality_data_is_validated()
    {
        $nationality = create(Nationality::class);
        $employee = create(Employee::class);

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-nationality', $employee->id), ['nationality_id' => '']);

        $response->assertRedirect()
            ->assertInvalid(['nationality_id']);
    }
}
