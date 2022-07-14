<?php

namespace Tests\Feature\Http\Livewire;

use Tests\TestCase;
use App\Models\Step;
use Livewire\Livewire;
use App\Models\Process;
use App\Models\Employee;
use App\Http\Livewire\Search;
use App\Http\Livewire\EmployeeProcess;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeProcessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function StepIndexContainsLivewireStepComponent()
    {
        $user = $this->userWithPermission('view-employee-process');

        $this->actingAs($user);
        $response = $this->get('/admin/employee_process');

        $response->assertSeeLivewire(EmployeeProcess::class);
    }

    /** @test */
    public function StepShowsListOfEmployeeProcess()
    {
        Livewire::test(EmployeeProcess::class)
            ->assertViewHas('processes')
            ;
    }

    /** @test */
    public function steps_componenet_use_search_component()
    {
        $process = factory(Process::class, 5)->create();

        Livewire::test(EmployeeProcess::class)
            // ->assertDontSeeLivewire(Search::class)
            ->assertViewHas('processes')
            ->assertViewHas('employees_assigned', null)
            ->assertViewHas('sites', null)
            ->assertViewHas('departments', null)
            ->assertViewHas('projects', null)
            ->assertViewHas('positions', null)
            ->set('process_id', $process[0]->id)
            ->assertSeeLivewire(Search::class)
            ->assertSee('Site')
            ->assertViewHas('processes')
            ->assertViewHas('employees_assigned')
            ->assertViewHas('sites')
            ->assertViewHas('departments')
            ->assertViewHas('projects')
            ->assertViewHas('positions')
            ;
    }

    /** @test */
    public function employees_can_be_assigned_to_a_process()
    {
        $process = factory(Process::class)->create();
        $employee = factory(Employee::class)->create();

        Livewire::test(EmployeeProcess::class)
            ->set('process_id', $process->id)
            ->call('assign', $employee->id)
            ;

        $this->assertDatabaseHas('employee_process', ['employee_id' => $employee->id, 'process_id' => $process->id]);
    }

    /** @test */
    public function employees_can_be_un_assigned_to_a_process()
    {
        $process = factory(Process::class)->create();
        $employee = factory(Employee::class)->create();
        $employee->processes()->attach([$process->id]);

        Livewire::test(EmployeeProcess::class)
            ->set('process_id', $process->id)
            ->call('unAssign', $employee->id)
            ;

        $this->assertDatabaseMissing('employee_process', ['employee_id' => $employee->id, 'process_id' => $process->id]);
    }
}
