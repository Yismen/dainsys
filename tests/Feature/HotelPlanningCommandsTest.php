<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Console\Commands\RingCentralReports\Commands\HotelPlanning\SendHotelPlanningProductionReportCommand;

class HotelPlanningCommandsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    // public function it_sends_the_political_flash_report()
    // {
    //     Mail::fake();
    //     Excel::fake();
    //     Notification::fake();

    //     // $this->mockRepository(HotelPlanningFlashRepository::class, [
    //     //     'hasHours' => true,
    //     //     'getHours' => [],
    //     // ]);

    //     $this->mock(\App\Repositories\HotelPlanning\HotelPlanningFlashRepository::class, function (MockInterface $mock) {
    //         $mock->shouldReceive('__construct')
    //             ->with([])
    //             ->andReturn([]);
    //         $mock->shouldReceive('getHours')
    //                 ->andReturn([]);
    //         $mock->shouldReceive('getDispositions')
    //             ->andReturn([]);
    //     });

    //     $this->artisan(SendHotelPlanningFlashReportCommand::class)
    //         ->assertExitCode(0);
    // }

    /** @test */
    public function it_sends_the_production_report()
    {
        Mail::fake();
        Excel::fake();
        Notification::fake();
        // $this->userWithRole('admin');
        $report = \App\Models\Report::factory()->create(['key' => 'hpc:send-production-report']);
        $recipients = \App\Models\Recipient::factory(2)->create();
        $report->recipients()->sync($recipients->pluck('id')->toArray());

        $this->mockRepo(\App\Console\Commands\RingCentralReports\Exports\Sheets\HotelPlanning\ProductionSheet::class, []);

        $this->artisan(SendHotelPlanningProductionReportCommand::class)
            ->expectsOutput('Hotel Planning Production Report Sent!')
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
        $report = \App\Models\Report::factory()->create(['key' => 'hpc:send-production-report']);
        $recipients = \App\Models\Recipient::factory(2)->create();
        $report->recipients()->sync($recipients->pluck('id')->toArray());

        $this->mockRepo(TextCampaignSheet::class, []);

        $this->artisan(SendHotelPlanningProductionReportCommand::class)
        ->expectsOutput('Hotel Planning Production Report Sent!')
            ->assertExitCode(0);

        // Mail::assertSent(BaseRingCentralMails::class);
    }
}
