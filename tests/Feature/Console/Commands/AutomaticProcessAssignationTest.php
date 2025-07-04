<?php

namespace Tests\Feature\Console\Commands;

use App\Console\Commands\AutomaticProcessAssignation;
use App\Models\Employee;
use App\Models\Process;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AutomaticProcessAssignationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function assigns_authomatic_processes_to_all_employees()
    {
        $processes = Process::factory(5)->create(['default' => true]);
        $employees = Employee::factory(5)->create();

        $this->artisan(AutomaticProcessAssignation::class);

        foreach ($processes as $process) {
            foreach ($employees as $employee) {
                $this->assertDatabaseHas('employee_process', ['process_id' => $process->id, 'employee_id' => $employee->id]);
            }
        }
    }

    /** @test */
    public function it_does_not_assigns_authomatic_processes_to_employees()
    {
        $processes = Process::factory(5)->create(['default' => false]);
        $employees = Employee::factory(5)->create();

        $this->artisan(AutomaticProcessAssignation::class);

        foreach ($processes as $process) {
            foreach ($employees as $employee) {
                $this->assertDatabaseMissing('employee_process', ['process_id' => $process->id, 'employee_id' => $employee->id]);
            }
        }
    }
}
