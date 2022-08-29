<?php

namespace Tests\Unit;

use App\Models\Vip;
use App\Models\Employee;
use App\Models\Universal;
use App\Models\Termination;
use Tests\TestCase as TestsTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
}
