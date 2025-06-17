<?php

namespace Tests\Feature\Employee;

use App\Events\EmployeeTerminated;
use App\Mail\EmployeeTerminatedMail;
use App\Models\Employee;
use App\Models\Recipient;
use App\Models\Report;
use App\Models\Termination;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class TerminationTest extends TestCase
{
    use RefreshDatabase;

    protected function setup(): void
    {
        parent::setUp();

        $recipients = Recipient::factory()->create();
        $report = Report::where('key', 'dainsys:employees-terminated')->firstOr(fn () => Report::factory()->create(['key' => 'dainsys:employees-terminated']));
        $report->recipients()->sync([$recipients->id]);
    }

    /** @test */
    public function employee_termination_is_created()
    {
        $employee = create(Employee::class);
        $termination = make(Termination::class)->toArray();

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.terminate', $employee->id), $termination);

        $response->assertOk();
        $this->assertDatabaseHas('terminations', ['employee_id' => $employee->id]);
    }

    /** @test */
    public function employee_termination_data_is_validated()
    {
        $termination = create(Termination::class);
        $updated_attributes = [
            'employee_id' => '',
            'termination_date' => '',
            'termination_reason_id' => '',
            'can_be_rehired' => '',
        ];

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.terminate', $termination->employee->id), $updated_attributes);

        $response->assertInvalid(['termination_date', 'termination_reason_id', 'can_be_rehired']);
    }

    /** @test */
    public function employee_termination_fires_event()
    {
        Event::fake([
            EmployeeTerminated::class,
        ]);

        $employee = create(Employee::class);
        $termination = make(Termination::class)->toArray();

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.terminate', $employee->id), $termination);

        Event::assertDispatched(EmployeeTerminated::class);
    }

    /** @test */
    public function employee_termination_send_email_when_employee_is_terminated()
    {
        Mail::fake();

        $employee = create(Employee::class);
        $termination = make(Termination::class)->toArray();

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.terminate', $employee->id), $termination);

        Mail::assertQueued(EmployeeTerminatedMail::class);
    }

    /** @test */
    public function employee_termination_saves_employee_data_when_created()
    {
        $employee = create(Employee::class);
        $termination = make(Termination::class)->toArray();

        $employee_data = json_encode([
            'name' => $employee->full_name,
            'hire_date' => $employee->hire_date,
            'site' => optional($employee)->site->name,
            'department' => optional($employee->position->department)->name,
            'project' => optional($employee->project)->name,
            'supervisor' => optional($employee->supervisor)->name,
            'salary' => optional($employee->position)->salary,
            'payment_type' => optional($employee->position->payment_type)->name,
        ]);

        $response = $this
            ->actingAs($this->user())
            ->post(route('admin.employees.terminate', $employee->id), $termination);

        $response->assertOk();
        $this->assertDatabaseHas('terminations', ['employee_id' => $employee->id, 'employee_data' => $employee_data]);
    }
}
