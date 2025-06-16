<?php

namespace Tests\Feature\HumanResources;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class DGT3ControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Authentication tests
     */

    /** @test */
    public function guests_can_not_see_dgt3_form()
    {
        $this->get(route('admin.human_resources.dgt3.index'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_can_not_see_dgt3_report_data()
    {
        $this->post(route('admin.human_resources.dgt3.show'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_can_not_download_dgt3_report()
    {
        $this->get(route('admin.human_resources.dgt3.download', '2021'))
            ->assertRedirect(route('login'));
    }

    /**
     * Authorization tests
     */

    /** @test */
    public function users_without_human_resources_permission_can_not_see_dgt3_index()
    {
        $this->actingAs($this->userWithPermission('wrong-permission'));

        $this->get(route('admin.human_resources.dgt3.index'))
            ->assertForbidden();
    }

    /** @test */
    public function users_without_human_resources_permission_can_not_see_dgt3_report()
    {
        $this->actingAs($this->userWithPermission('wrong-permission'));

        $this->post(route('admin.human_resources.dgt3.show'))
            ->assertForbidden();
    }

    /** @test */
    public function users_without_human_resources_permission_can_not_see_dgt3_download()
    {
        $this->actingAs($this->userWithPermission('wrong-permission'));

        $this->get(route('admin.human_resources.dgt3.download', '2021'))
            ->assertForbidden();
    }

    /**
     * Actions tests
     */

    /** @test */
    public function it_shows_dgt3_index()
    {
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->get(route('admin.human_resources.dgt3.index'))
            ->assertOk()
            ->assertViewIs('human_resources.reports.dgt3');
    }

    /** @test */
    public function it_shows_dgt3_report()
    {
        $employee_hired_this_year = Employee::factory()->create(['hire_date' => now()]);
        $employee_hired_last_year = Employee::factory()->create(['hire_date' => now()->subYear()]);
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->post(route('admin.human_resources.dgt3.show', [
            'year' => now()->year,
        ]))
            ->assertOk()
            ->assertViewIs('human_resources.reports.dgt3')
            ->assertSee($employee_hired_this_year->full_name)
            // ->assertDontSee($employee_hired_last_year->full_name)
        ;
    }

    /** @test */
    public function it_downloads_dgt3_report()
    {
        Excel::fake();
        $employee_hired_this_year = Employee::factory()->create(['hire_date' => now()]);
        $employee_hired_last_year = Employee::factory()->create(['hire_date' => now()->subYear()]);
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->get(route('admin.human_resources.dgt3.download', [
            'year' => now()->year,
        ]))
            ->assertOk()
            ->assertViewIs('human_resources.reports.dgt3')
            ->assertSee($employee_hired_this_year->full_name)
            // ->assertDontSee($employee_hired_last_year->full_name)
        ;

        Excel::assertDownloaded('DGT3-' . now()->year . '.xlsx');
    }
}
