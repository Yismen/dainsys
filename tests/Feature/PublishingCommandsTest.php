<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Console\Commands\RingCentralReports\Exports\Support\Mails\BaseRingCentralMails;
use App\Console\Commands\RingCentralReports\Commands\Publishing\SendPublishingProductionReportCommand;

class PublishingCommandsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_sends_the_hourly_production_report()
    {
        Mail::fake();
        Excel::fake();
        Notification::fake();
        $report = factory(\App\Models\Report::class)->create(['key' => 'publishing:send-production-report']);
        $recipients = factory(\App\Models\Recipient::class, 2)->create();
        $report->recipients()->sync($recipients->pluck('id')->toArray());

        $this->artisan(SendPublishingProductionReportCommand::class)
            ->expectsOutput('Publishing Production Report Sent!')
            ->assertExitCode(0);

        // Mail::assertSent(BaseRingCentralMails::class);
    }
}
