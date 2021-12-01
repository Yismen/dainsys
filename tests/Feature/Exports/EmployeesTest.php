<?php

namespace Tests\Feature\Exports;

use App\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class EmployeesTest extends TestCase
{
    use RefreshDatabase;

    /** Authentication Tests */

    /** @test */
    public function guests_can_not_download_employees()
    {
        factory(Employee::class)->create();

        $this->get(route('admin.employees.export_to_excel', 'all'))
            ->assertRedirect('login');
    }

    /** Authorization Tests */

    /** @test */
    public function users_without_permission_can_not_download_employees()
    {
        factory(Employee::class)->create();
        $this->actingAs($this->user());

        $this->get(route('admin.employees.export_to_excel', 'all'))
            ->assertForbidden();
    }

    /** Actions tests */

    /** @test */
    public function it_download_all_employees()
    {
        Excel::fake();
        $this->actingAs($this->userWithPermission('view-employees'));
        factory(Employee::class)->create();

        $this->get(route('admin.employees.export_to_excel', 'all'));

        Excel::assertDownloaded('employees.xlsx');
    }
}
