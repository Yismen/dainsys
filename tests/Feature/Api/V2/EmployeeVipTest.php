<?php

namespace Tests\Feature\Api\V2;

use App\Vip;
use App\Employee;
use Tests\TestCase;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeVipTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_employee_can_be_assigned_to_vips_list()
    {
        $employee = factory(Employee::class)->create();
        Passport::actingAs($this->user());

        $response = $this->post(route('api.v2.employee.vip', $employee->id), ['is_vip' => true]);

        $response->assertOk();

        $this->assertDatabaseHas('vips', ['employee_id' => $employee->id]);
    }

    /** @test */
    public function vip_employee_can_be_removed()
    {
        $vip = factory(Vip::class)->create();
        $employee = $vip->employee;
        Passport::actingAs($this->user());

        $response = $this->post(route('api.v2.employee.vip', $employee->id), ['is_vip' => false]);

        $response->assertOk();

        $this->assertDatabaseMissing('vips', ['employee_id' => $employee->id]);
    }

    /** @test */
    public function vips_request_is_validated()
    {
        $vip = factory(Vip::class)->create();
        $employee = $vip->employee;
        Passport::actingAs($this->user());

        $response = $this->post(route('api.v2.employee.vip', $employee->id), [])
            ->assertInvalid(['is_vip']);
    }
}
