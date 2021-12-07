<?php

namespace Tests\Feature\Employees;

use App\Employee;
use App\Termination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExportEmployeesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Authentication tests
     */

    /** @test */
    public function guests_can_not_export_employees()
    {
        $this->get(route('admin.employees.export_to_excel', '*'))
            ->assertRedirect(route('login'));
    }

    /**
     * Authorization tests
     */

    /** @test */
    public function users_without_view_employeese_permissions_cannot_export_employees()
    {
        $this->actingAs($this->userWithPermission('wrong-permission'));

        $this->get(route('admin.employees.export_to_excel', '*'))
            ->assertForbidden();
    }

    /**
     * Actions tests
     */

    /** @test */
    public function it_exports_actives_employees()
    {
        $active_employee = factory(Employee::class)->create();
        $active_employee = factory(Termination::class)->create()->employee;
        $this->actingAs($this->userWithPermission('view-employees'));

        $this->get(route('admin.employees.export_to_excel', 'actives'))
            ->assertOk()
            ->assertDownload();
    }

    /** @test */
    public function it_exports_inactives_employees()
    {
        $active_employee = factory(Employee::class)->create();
        $active_employee = factory(Termination::class)->create()->employee;
        $this->actingAs($this->userWithPermission('view-employees'));

        $this->get(route('admin.employees.export_to_excel', 'inactives'))
            ->assertOk()
            ->assertDownload();
    }

    /** @test */
    public function it_exports_all_employees()
    {
        $active_employee = factory(Employee::class)->create();
        $active_employee = factory(Termination::class)->create()->employee;
        $this->actingAs($this->userWithPermission('view-employees'));

        $this->get(route('admin.employees.export_to_excel', 'all'))
            ->assertOk()
            ->assertDownload();
    }
}
