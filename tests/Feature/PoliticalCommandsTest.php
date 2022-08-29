<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\Political\PoliticalFlashRepository;
use App\Console\Commands\RingCentralReports\Exports\Sheets\Political\TextCampaignSheet;
use App\Console\Commands\RingCentralReports\Exports\Support\Mails\BaseRingCentralMails;
use App\Console\Commands\RingCentralReports\Commands\Political\SendPoliticalFlashReportCommand;
use App\Console\Commands\RingCentralReports\Commands\Political\SendPoliticalProductionReportCommand;
use App\Console\Commands\RingCentralReports\Commands\Political\SendPoliticalTextCampaignReportCommand;

class PoliticalCommandsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_sends_the_political_flash_report()
    {
        Mail::fake();
        Excel::fake();
        Notification::fake();

        $this->mockRepo(PoliticalFlashRepository::class, [], ['getHours', 'getDispositions', 'getAnswers']);

        $this->artisan(SendPoliticalFlashReportCommand::class)
            ->assertExitCode(0);
    }

    /** @test */
    public function it_sends_the_hourly_production_report()
    {
        Mail::fake();
        Excel::fake();
        Notification::fake();
        // $this->userWithRole('admin');
        $report = factory(\App\Models\Report::class)->create(['key' => 'political:send-production-report']);
        $recipients = factory(\App\Models\Recipient::class, 2)->create();
        $report->recipients()->sync($recipients->pluck('id')->toArray());

        $this->mockRepo(TextCampaignSheet::class, []);

        $this->artisan(SendPoliticalProductionReportCommand::class)
            ->expectsOutput('Political Production Report Sent!')
            ->assertExitCode(0);

        // Mail::assertSent(BaseRingCentralMails::class);
    }

    /** @test */
    public function it_sends_the_daily_text_production_report()
    {
        Mail::fake();
        Excel::fake();
        Notification::fake();
        // $this->userWithRole('admin');
        $report = factory(\App\Models\Report::class)->create(['key' => 'political:send-text-campaign-report']);
        $recipients = factory(\App\Models\Recipient::class, 2)->create();
        $report->recipients()->sync($recipients->pluck('id')->toArray());

        $this->mockRepo(TextCampaignSheet::class, []);

        $this->artisan(SendPoliticalTextCampaignReportCommand::class)
            ->expectsOutput('Political Text Campaign Text Report Sent!')
            ->assertExitCode(0);

        // Mail::assertSent(BaseRingCentralMails::class);
    }
}
