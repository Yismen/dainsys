<?php

namespace Tests\Feature;

use App\Console\Commands\RingCentralReports\Commands\Political\SendPoliticalFlashReportCommand;
use App\Console\Commands\RingCentralReports\Commands\Political\SendPoliticalProductionReportCommand;
use App\Console\Commands\RingCentralReports\Commands\Political\SendPoliticalTextCampaignReportCommand;
use App\Console\Commands\RingCentralReports\Exports\Sheets\Political\TextCampaignSheet;
use App\Console\Commands\RingCentralReports\Exports\Support\Mails\BaseRingCentralMails;
use App\Repositories\Political\PoliticalFlashRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\MockInterface;
use Tests\TestCase;

class PoliticalCommandsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    // public function it_sends_the_political_flash_report()
    // {
    //     Mail::fake();
    //     Excel::fake();
    //     Notification::fake();

    //     // $this->mockRepository(PoliticalFlashRepository::class, [
    //     //     'hasHours' => true,
    //     //     'getHours' => [],
    //     // ]);

    //     $this->mock(\App\Repositories\Political\PoliticalFlashRepository::class, function (MockInterface $mock) {
    //         $mock->shouldReceive('__construct')
    //             ->with([])
    //             ->andReturn([]);
    //         $mock->shouldReceive('getHours')
    //                 ->andReturn([]);
    //         $mock->shouldReceive('getDispositions')
    //             ->andReturn([]);
    //     });

    //     $this->artisan(SendPoliticalFlashReportCommand::class)
    //         ->assertExitCode(0);
    // }

    /** @test */
    public function it_sends_the_hourly_production_report()
    {
        Mail::fake();
        Excel::fake();
        Notification::fake();
        // $this->userWithRole('admin');
        $report = \App\Models\Report::factory()->create(['key' => 'political:send-production-report']);
        $recipients = \App\Models\Recipient::factory(2)->create();
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
        $report = \App\Models\Report::factory()->create(['key' => 'political:send-text-campaign-report']);
        $recipients = \App\Models\Recipient::factory(2)->create();
        $report->recipients()->sync($recipients->pluck('id')->toArray());

        $this->mockRepo(TextCampaignSheet::class, []);

        $this->artisan(SendPoliticalTextCampaignReportCommand::class)
            ->expectsOutput('Political Text Campaign Text Report Sent!')
            ->assertExitCode(0);

        // Mail::assertSent(BaseRingCentralMails::class);
    }
}
