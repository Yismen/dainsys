<?php

namespace Tests\Feature\Exports;

use Tests\TestCase;
use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
        $this->withoutExceptionHandling();
        Excel::fake();
        $this->actingAs($this->userWithPermission('view-employees'));
        factory(Employee::class)->create();

        $this->get(route('admin.employees.export_to_excel', 'all'));

        Excel::assertDownloaded('employees-all.xlsx');
    }
}
