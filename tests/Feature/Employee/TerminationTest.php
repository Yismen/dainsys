<?php

namespace Tests\Feature\Employee;

use Tests\TestCase;
use App\Models\Report;
use App\Models\Employee;
use App\Models\Recipient;
use App\Models\Termination;
use App\Events\EmployeeTerminated;
use App\Mail\EmployeeTerminatedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TerminationTest extends TestCase
{
    use RefreshDatabase;

    public function setup(): void
    {
        parent::setUp();

        $recipients = factory(Recipient::class)->create();
        $report = Report::where('key', 'dainsys:employees-terminated')->firstOr(function () {
            return factory(Report::class)->create(['key' => 'dainsys:employees-terminated']);
        });
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
        Event::fake();
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

        Mail::assertSent(EmployeeTerminatedMail::class);
    }
}
