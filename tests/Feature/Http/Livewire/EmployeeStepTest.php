<?php

namespace Tests\Feature\Http\Livewire;

use Tests\TestCase;
use App\Models\Step;
use Livewire\Livewire;
use App\Models\Process;
use App\Models\Employee;
use App\Http\Livewire\EmployeeStep;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeStepTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function StepIndexContainsLivewireStepComponent()
    {
        $process = Process::factory()->create();
        $employee = Employee::factory()->create();
        $employee->processes()->attach($process->id);
        $user = $this->userWithPermission('view-employee-process');

        $this->actingAs($user);
        $response = $this->get(route('admin.employee-process.show', ['employee_id' => $employee->id, 'process_id' => $process->id]));

        $response->assertSeeLivewire(EmployeeStep::class);
    }

    /** @test */
    public function employee_step_shows_details()
    {
        $employee = Employee::factory()->create();
        $process = Process::factory()->create();
        $employee->processes()->attach($process->id);

        Livewire::test(EmployeeStep::class, ['employee_id' => $employee->id, 'process_id' => $process->id])
            ->assertViewIs('livewire.employee-step')
            ->assertViewHas('employee', $employee->load([
                'steps',
                'site',
                'position.department',
                'project',
            ]))
            ->assertViewHas('process', $process)
            ->assertSee($employee->full_name)
            ->assertSee($process->name)
        ;
    }

    /** @test */
    public function employees_can_complete_a_step()
    {
        $employee = Employee::factory()->create();
        $process = Process::factory()->create();
        $employee->processes()->attach($process->id);
        $step = Step::factory()->create(['process_id' => $process->id]);

        Livewire::test(EmployeeStep::class, ['employee_id' => $employee->id, 'process_id' => $process->id])
            ->call('complete', $step->id)
        ;

        $this->assertDatabaseHas('employee_step', ['employee_id' => $employee->id, 'step_id' => $step->id]);
    }

    /** @test */
    public function employees_can_be_un_assigned_to_a_step()
    {
        $employee = Employee::factory()->create();
        $process = Process::factory()->create();
        $employee->processes()->attach($process->id);
        $step = Step::factory()->create(['process_id' => $process->id]);
        $employee->steps()->attach([$step->id]);

        Livewire::test(EmployeeStep::class, ['employee_id' => $employee->id, 'process_id' => $process->id])
            ->call('remove', $employee->id)
        ;

        $this->assertDatabaseMissing('employee_step', ['employee_id' => $employee->id, 'process_id' => $process->id]);
    }
}
