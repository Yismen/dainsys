<?php

namespace Tests\Feature\Models;

use App\Models\Recipient;
use App\Models\Report;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipientTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function report_model_return_records()
    {
        $data = [
            'name' => 'Name',
            'email' => 'new@email.com',
            'title' => 'CEO',
        ];

        Recipient::factory()->create($data);

        $this->assertDatabaseHas('recipients', $data);
    }

    /** @test */
    public function report_model_has_recipient()
    {
        $report = Report::factory()->create();
        $recipient = Recipient::factory()->create();
        $recipient->reports()->sync($report->pluck('id'));

        $this->assertDatabaseHas('recipient_report', ['recipient_id' => $recipient->id, 'report_id' => $report->id]);
    }
}
