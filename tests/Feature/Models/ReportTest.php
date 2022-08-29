<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\Report;
use App\Models\Recipient;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

        factory(Report::class)->create($data);

        $this->assertDatabaseHas('reports', $data);
    }

    /** @test */
    public function report_model_has_recipient()
    {
        $report = factory(Report::class)->create();
        $recipient = factory(Recipient::class)->create();
        $report->recipients()->sync($recipient->pluck('id'));

        $this->assertDatabaseHas('recipient_report', ['recipient_id' => $recipient->id, 'report_id' => $report->id]);
    }
}
