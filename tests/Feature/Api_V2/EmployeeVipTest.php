<?php

namespace Tests\Feature\Api_V2;

use App\Models\Employee;
use App\Models\Vip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class EmployeeVipTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_employee_can_be_assigned_to_vips_list()
    {
        $employee = Employee::factory()->create();
        Passport::actingAs($this->user());

        $response = $this->post(route('api.v2.employee.vip', $employee->id), ['is_vip' => true]);

        $response->assertOk();

        $this->assertDatabaseHas('vips', ['employee_id' => $employee->id]);
    }

    /** @test */
    public function vip_employee_can_be_removed()
    {
        $vip = Vip::factory()->create();
        $employee = $vip->employee;
        Passport::actingAs($this->user());

        $response = $this->post(route('api.v2.employee.vip', $employee->id), ['is_vip' => false]);

        $response->assertOk();

        $this->assertDatabaseMissing('vips', ['employee_id' => $employee->id]);
    }

    /** @test */
    public function vips_request_is_validated()
    {
        $vip = Vip::factory()->create();
        $employee = $vip->employee;
        Passport::actingAs($this->user());

        $response = $this->post(route('api.v2.employee.vip', $employee->id), [])
            ->assertInvalid(['is_vip']);
    }
}
