<?php

namespace Tests\Unit;

use App\Models\Employee;
use App\Models\Termination;
use App\Models\Universal;
use App\Models\Vip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase as TestsTestCase;

class EmployeAccessorsTest extends TestsTestCase
{
    use RefreshDatabase;

    /** @test */
    public function employee_status_attribute()
    {
        $activeEmployee = create(Employee::class);

        $this->assertEquals('Active', $activeEmployee->status);

        $inactiveEmployee = create(Termination::class)->employee;

        $this->assertEquals('Inactive', $inactiveEmployee->status);
    }

    /** @test */
    public function employee_active_attribute()
    {
        $activeEmployee = create(Employee::class);

        $this->assertTrue($activeEmployee->active);

        $inactiveEmployee = create(Termination::class)->employee;

        $this->assertFalse($inactiveEmployee->active);
    }

    /** @test */
    public function employee_vip_status()
    {
        $nonVipEmployee = create(Employee::class);

        $this->assertNull($nonVipEmployee->vip);

        $vipEmployee = create(Vip::class)->employee;

        $this->assertNotNull($vipEmployee->vip);
    }

    /** @test */
    public function employee_universal_status()
    {
        $nonUniversalEmployee = create(Employee::class);

        $this->assertNull($nonUniversalEmployee->universal);

        $universalEmployee = create(Universal::class)->employee;

        $this->assertNotNull($universalEmployee->universal);
    }

    /** @test */
    public function it_retun_full_name_headline()
    {
        $parsedName = 'Some Full Name';
        $employee = create(Employee::class, [
            'first_name' => ' some     ',
            'second_first_name' => '      ',
            'last_name' => ' full     ',
            'second_last_name' => '    name     ',
        ]);

        $this->assertEquals($employee->full_name, $parsedName);
    }
}
