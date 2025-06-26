<?php

namespace Tests\Feature\Models;

use App\Models\Recipient;
use App\Models\Report;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function report_model_return_records()
    {
        $data = [
            'name' => 'Name',
            'key' => 'political:send-daily-report',
            'active' => true,
            'description' => 'description',
        ];

        Report::factory()->create($data);

        $this->assertDatabaseHas('reports', $data);
    }

    /** @test */
    public function report_model_has_recipient()
    {
        $report = Report::factory()->create();
        $recipient = Recipient::factory()->create();
        $report->recipients()->sync($recipient->pluck('id'));

        $this->assertDatabaseHas('recipient_report', ['recipient_id' => $recipient->id, 'report_id' => $report->id]);
    }
}
