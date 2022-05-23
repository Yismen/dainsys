<?php

namespace Tests\Feature\Api;

use App\Models\Employee;
use App\Models\Universal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class EmployeeUniversalTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_employee_can_be_assigned_to_universals_list()
    {
        $employee = factory(Employee::class)->create();
        Passport::actingAs($this->user());

        $response = $this->post(route('api.employee.universal', $employee->id), ['is_universal' => true]);

        $response->assertOk();

        $this->assertDatabaseHas('universals', ['employee_id' => $employee->id]);
    }

    /** @test */
    public function universal_employee_can_be_removed()
    {
        $universal = factory(Universal::class)->create();
        $employee = $universal->employee;
        Passport::actingAs($this->user());

        $response = $this->post(route('api.employee.universal', $employee->id), ['is_universal' => false]);

        $response->assertOk();

        $this->assertDatabaseMissing('universals', ['employee_id' => $employee->id]);
    }

    /** @test */
    public function universals_request_is_validated()
    {
        $universal = factory(Universal::class)->create();
        $employee = $universal->employee;
        Passport::actingAs($this->user());

        $response = $this->post(route('api.employee.universal', $employee->id), [])
            ->assertInvalid(['is_universal']);
    }
}
