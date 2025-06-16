<?php

namespace Tests\Feature\Console\Commands;

use Tests\TestCase;
use App\Models\Report;
use App\Models\Employee;
use App\Models\Recipient;
use App\Mail\EmployeesHiredMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Queue;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeesHiredTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Queue::fake();
        // Mail::fake();
        // Excel::fake();
        $report = Report::factory()->create(['key' => 'dainsys:employees-hired']);
        $recipient = Recipient::factory()->create();
        $recipient->reports()->sync([$report->id]);
    }

    /** @test */
    public function employees_hired_command_sends_report_for_employees_hired_previous_day()
    {
        $this->actingAs($this->userWithRole('admin'));
        $employees = Employee::factory(2)->create(['hire_date' => today()->subDay()]);
        $command = $this->artisan(\App\Console\Commands\EmployeesHired::class, [
            'dates' => now()->subDay()->format('Y-m-d'),
            '--site' => 'santiago-hq'
        ]);

        $command->assertSuccessful();
        // Queue::assertPushed(EmployeesHiredMail::class);
        // Mail::assertQueued(EmployeesHiredMail::class);
    }

    /** @test */
    public function employees_hired_command_sends_report_for_employees_hired_previous_week()
    {
        Employee::factory(2)->create(['hire_date' => today()->subWeek()]);

        $command = $this->artisan(\App\Console\Commands\EmployeesHired::class, [
            'dates' => now()->subDay()->startOfWeek()->format('Y-m-d') . ',' . now()->subDay()->endOfWeek()->format('Y-m-d'),
            '--site' => 'santiago-hq'
        ]);

        $command->assertSuccessful();
    }

    /** @test */
    public function employees_hired_command_sends_report_for_employees_hired_previous_month()
    {
        Mail::fake();
        Excel::fake();

        Employee::factory(2)->create(['hire_date' => today()->subMonth()]);

        $command = $this->artisan(\App\Console\Commands\EmployeesHired::class, [
            'dates' => now()->subMonth()->startOfMonth()->format('Y-m-d') . ',' . now()->subMonth()->endOfMonth()->format('Y-m-d'),
            '--site' => 'santiago-hq'
        ]);

        $command->assertSuccessful();
    }
}
