<?php

namespace Tests\Feature\HumanResources;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class DGT4ControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Authentication tests
     */

    /** @test */
    public function guests_can_not_see_dgt4_form()
    {
        $this->get(route('admin.human_resources.dgt4.index'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_can_not_see_dgt4_report_data()
    {
        $this->post(route('admin.human_resources.dgt4.show'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function guests_can_not_download_dgt4_report()
    {
        $this->get(route('admin.human_resources.dgt4.download', ['year' => '2021', 'month' => '1']))
            ->assertRedirect(route('login'));
    }

    /**
     * Authorization tests
     */

    /** @test */
    public function users_without_human_resources_permission_can_not_see_dgt4_index()
    {
        $this->actingAs($this->userWithPermission('wrong-permission'));

        $this->get(route('admin.human_resources.dgt4.index'))
            ->assertForbidden();
    }

    /** @test */
    public function users_without_human_resources_permission_can_not_see_dgt4_report()
    {
        $this->actingAs($this->userWithPermission('wrong-permission'));

        $this->post(route('admin.human_resources.dgt4.show'))
            ->assertForbidden();
    }

    /** @test */
    public function users_without_human_resources_permission_can_not_see_dgt4_download()
    {
        $this->actingAs($this->userWithPermission('wrong-permission'));

        $this->get(route('admin.human_resources.dgt4.download', ['year' => '2021', 'month' => '1']))
            ->assertForbidden();
    }

    /**
     * Actions tests
     */

    /** @test */
    public function it_shows_dgt4_index()
    {
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->get(route('admin.human_resources.dgt4.index'))
            ->assertOk()
            ->assertViewIs('human_resources.reports.dgt4');
    }

    /** @test */
    public function it_shows_dgt4_report()
    {
        $employee_hired_this_year = factory(Employee::class)->create(['hire_date' => now()]);
        $employee_hired_last_year = factory(Employee::class)->create(['hire_date' => now()->subYear()]);
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->post(route('admin.human_resources.dgt4.show', [
            'year' => now()->year,
            'month' => now()->month,
        ]))
            ->assertOk()
            ->assertViewIs('human_resources.reports.dgt4')
            ->assertSee($employee_hired_this_year->full_name)
            // ->assertDontSee($employee_hired_last_year->full_name)
        ;
    }

    /** @test */
    public function it_downloads_dgt4_report()
    {
        Excel::fake();
        $employee_hired_this_year = factory(Employee::class)->create(['hire_date' => now()]);
        $employee_hired_last_year = factory(Employee::class)->create(['hire_date' => now()->subYear()]);
        $this->actingAs($this->userWithPermission('view-human-resources-dashboard'));

        $this->get(route('admin.human_resources.dgt4.download', [
            'year' => now()->year,
        ]))
            ->assertOk();

        Excel::assertDownloaded('DGT4-' . now()->year . '.xlsx');
    }
}
