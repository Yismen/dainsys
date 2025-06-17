<?php

namespace Tests\Feature\Exports;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class EmployeesTest extends TestCase
{
    use RefreshDatabase;

    /** Authentication Tests */

    /** @test */
    public function guests_can_not_download_employees()
    {
        Employee::factory()->create();

        $this->get(route('admin.employees.export_to_excel', 'all'))
            ->assertRedirect('login');
    }

    /** Authorization Tests */

    /** @test */
    public function users_without_permission_can_not_download_employees()
    {
        Employee::factory()->create();
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
        Employee::factory()->create();

        $this->get(route('admin.employees.export_to_excel', 'all'));

        Excel::assertDownloaded('employees-all.xlsx');
    }

    /** @test */
    public function it_implements_the_trackeable_trait()
    {
        $methods = get_class_methods(new Employee);

        $this->assertContains('changes', $methods);
    }

    /** @test */
    public function it_track_updates()
    {
        $this->actingAs($this->user());
        $update_data = [
            'first_name' => 'Updated Name',
            'last_name' => 'Updated Surname',
        ];
        $employee = Employee::factory()->create();
        $old_first_name = $employee->first_name;
        $old_last_name = $employee->last_name;

        $employee->update($update_data);

        $this->assertEquals($employee->changes->first()->modifications, [
            'first_name' => [
                'old' => $old_first_name,
                'new' => 'Updated Name',
            ],
            'last_name' => [
                'old' => $old_last_name,
                'new' => 'Updated Surname',
            ],
        ]);
    }
}
