<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Livewire\EmployeeProcess;
use App\Http\Livewire\EmployeeStep;
use App\Models\Employee;
use App\Models\Process;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeProcessControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_not_visit_any_employee_process_route()
    {
        $this->get(route('admin.employee-process.index'))->assertRedirect('/login');
    }

    /** @test */
    public function guests_can_not_visit_any_employee_process_details_route()
    {
        $this->get(route('admin.employee-process.show', ['employee_id' => 1, 'process_id' => 1]))->assertRedirect('/login');
    }

    /** @test */
    public function it_requires_view_employe_process_permissions_to_view_all_employee_process()
    {
        $this->actingAs(create(\App\Models\User::class));

        $response = $this->get('/admin/employee_process');

        $response->assertStatus(403);
    }

    /** @test */
    public function it_requires_view_employe_process_permissions_to_view_employee_process_details()
    {
        $employee = Employee::factory()->create();
        $process = Process::factory()->create();
        $this->actingAs(create(\App\Models\User::class));

        $response = $this->get(route('admin.employee-process.show', ['employee_id' => $employee->id, 'process_id' => $process->id]));

        $response->assertStatus(403);
    }

    /** @test */
    public function it_allows_users_to_view_employee_process_if_they_have_view_employee_process_permission()
    {
        // given
        $user = $this->userWithPermission('view-employee-process');

        // when
        $this->actingAs($user);
        $response = $this->get('/admin/employee_process');

        // assert
        // $response->assertSee($step->name);
        $response->assertSeeLivewire(EmployeeProcess::class);
    }

    /** @test */
    public function it_allows_users_to_view_employee_process_details_if_they_have_view_employee_process_permission()
    {
        // given
        $user = $this->userWithPermission('view-employee-process');
        $employee = Employee::factory()->create();
        $process = Process::factory()->create();
        $employee->processes()->attach([$process->id]);

        // when
        $this->actingAs($user);
        $response = $this->get(route('admin.employee-process.show', ['employee_id' => $employee->id, 'process_id' => $process->id]));
        // assert
        // $response->assertSee($step->name);
        $response->assertSeeLivewire(EmployeeStep::class, ['employee_id' => $employee->id, 'process_id' => $process->id]);
        $response->assertViewHas('employee_id', $employee->id);
        $response->assertViewHas('process_id', $process->id);
    }
}
