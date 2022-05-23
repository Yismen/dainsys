<?php

namespace Tests\Feature\Employee;

use App\Models\Punch;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PunchTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_punch_is_created()
    {
        $employee = create(Employee::class);
        $punch = make(Punch::class)->toArray();

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-punch', $employee->id), $punch);

        $response->assertOk();
        $this->assertDatabaseHas('punches', array_merge($punch, ['employee_id' => $employee->id]));
    }

    /** @test */
    public function employee_punch_is_updated()
    {
        $punch = create(Punch::class);
        $updated_attributes = [
            'punch' => '99999999',
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-punch', $punch->employee->id), $updated_attributes);

        $response->assertOk();
        $this->assertDatabaseHas('punches', $updated_attributes);
    }

    /** @test */
    public function employee_punch_data_is_validated()
    {
        $punch = create(Punch::class);
        $updated_attributes = [
            'punch' => '',
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.update-punch', $punch->employee->id), $updated_attributes);

        $response->assertInvalid(['punch']);
    }
}
