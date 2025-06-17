<?php

namespace Tests\Feature\Http\Livewire;

use App\Http\Livewire\EmployeeProcess;
use App\Http\Livewire\Search;
use App\Models\Employee;
use App\Models\Process;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class EmployeeProcessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function step_index_contains_livewire_step_component()
    {
        $user = $this->userWithPermission('view-employee-process');

        $this->actingAs($user);
        $response = $this->get('/admin/employee_process');

        $response->assertSeeLivewire(EmployeeProcess::class);
    }

    /** @test */
    public function step_shows_list_of_employee_process()
    {
        Livewire::test(EmployeeProcess::class)
            ->assertViewHas('processes');
    }

    /** @test */
    public function steps_componenet_use_search_component()
    {
        $process = Process::factory(5)->create();

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
            ->assertViewHas('positions');
    }

    /** @test */
    public function employees_can_be_assigned_to_a_process()
    {
        $process = Process::factory()->create();
        $employee = Employee::factory()->create();

        Livewire::test(EmployeeProcess::class)
            ->set('process_id', $process->id)
            ->call('assign', $employee->id);

        $this->assertDatabaseHas('employee_process', ['employee_id' => $employee->id, 'process_id' => $process->id]);
    }

    /** @test */
    public function employees_can_be_un_assigned_to_a_process()
    {
        $process = Process::factory()->create();
        $employee = Employee::factory()->create();
        $employee->processes()->attach([$process->id]);

        Livewire::test(EmployeeProcess::class)
            ->set('process_id', $process->id)
            ->call('unAssign', $employee->id);

        $this->assertDatabaseMissing('employee_process', ['employee_id' => $employee->id, 'process_id' => $process->id]);
    }
}
