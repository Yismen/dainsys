<?php

namespace Tests\Feature\Console\Commands;

use Tests\TestCase;
use App\Models\Report;
use App\Models\Employee;
use App\Models\Recipient;
use App\Models\Termination;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\EmployeesTerminatedMail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeesTerminatedTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Queue::fake();
        // Mail::fake();
        // Excel::fake();
        // $this->actingAs($this->userWithRole('admin'));
        $report = factory(Report::class)->create(['key' => 'dainsys:employees-terminated']);
        $recipient = factory(Recipient::class)->create();
        $recipient->reports()->sync([$report->id]);
    }

    /** @test */
    public function employees_terminated_command_sends_report_for_employees_terminated_previous_day()
    {
        // $this->withoutDeprecationHandling();
        $employee = factory(Employee::class)->create();
        factory(Termination::class)->create(['employee_id' => $employee->id, 'termination_date' => today()->subDay()]);

        $command = $this->artisan(\App\Console\Commands\EmployeesTerminated::class, [
            'dates' => now()->subDay()->format('Y-m-d'),
            '--site' => 'santiago-hq'
        ]);

        $command->assertSuccessful();
        // Queue::assertPushed(EmployeesTerminatedMail::class);
        // Mail::assertQueued(EmployeesTerminatedMail::class);
    }

    /** @test */
    public function employees_terminated_command_sends_report_for_employees_terminated_previous_week()
    {
        $employee = factory(Employee::class)->create();
        factory(Termination::class)->create(['employee_id' => $employee->id, 'termination_date' => today()->subWeek()]);

        $command = $this->artisan(\App\Console\Commands\EmployeesTerminated::class, [
            'dates' => now()->subDay()->startOfWeek()->format('Y-m-d') . ',' . now()->subDay()->endOfWeek()->format('Y-m-d'),
            '--site' => 'santiago-hq'
        ]);

        $command->assertSuccessful();
    }

    /** @test */
    public function employees_terminated_command_sends_report_for_employees_terminated_previous_month()
    {
        Mail::fake();
        Excel::fake();

        $employee = factory(Employee::class)->create();
        factory(Termination::class)->create(['employee_id' => $employee->id, 'termination_date' => today()->subMonth()]);

        $command = $this->artisan(\App\Console\Commands\EmployeesTerminated::class, [
            'dates' => now()->subMonth()->startOfMonth()->format('Y-m-d') . ',' . now()->subMonth()->endOfMonth()->format('Y-m-d'),
            '--site' => 'santiago-hq'
        ]);

        $command->assertSuccessful();
    }
}
