<?php

namespace Tests\Feature\Models;

use Tests\TestCase;
use App\Models\Report;
use App\Models\Recipient;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

        factory(Recipient::class)->create($data);

        $this->assertDatabaseHas('recipients', $data);
    }

    /** @test */
    public function report_model_has_recipient()
    {
        $report = factory(Report::class)->create();
        $recipient = factory(Recipient::class)->create();
        $recipient->reports()->sync($report->pluck('id'));

        $this->assertDatabaseHas('recipient_report', ['recipient_id' => $recipient->id, 'report_id' => $report->id]);
    }
}
