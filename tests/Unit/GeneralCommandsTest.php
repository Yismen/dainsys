<?php

namespace Tests\Unit;

use App\Console\Commands\General\DailyProductionReport\DailyProductionReportExport;
use App\Console\Commands\General\DailyProductionReport\DailyProductionReportRepository;
use App\Mail\CommandsBaseMail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Mockery;

class GeneralCommandsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    // public function it_sends_the_general_daily_production_report()
    // {
    //     Mail::fake();

    //     $this->mock(Mockery::mock(DailyProductionReportRepository::class, function ($mock) {
    //         $mock;
    //     }));

    //     $this->artisan('dainsys:general-rc-production-report')
    //         ->expectsOutput('General Daily Production Report Sent!')
    //         ->assertExitCode(0);

    //     Mail::assertSent(CommandsBaseMail::class);
    // }

    /** @test */
    public function excel_file_is_stored()
    {
        Excel::fake();

        $subject = "Fake Name";
        $file_name = "{$subject}.xlsx";

        Excel::store(
            new DailyProductionReportExport(
                ['data' => 'some']
            ),
            $file_name
        );

        Excel::assertStored($file_name, function (DailyProductionReportExport $export) {
            return true;
        });
    }

    /** @test */
    public function email_report_is_sent()
    {
        Excel::fake();
        Mail::fake();

        $subject = "Fake Name";
        $file_name = "{$subject}.xlsx";
        $recipient = 'someone@fake.email';

        Excel::store(
            new DailyProductionReportExport(
                ['data' => 'some']
            ),
            $file_name
        );

        Mail::send(
            new CommandsBaseMail([$recipient], $file_name, $subject)
        );

        Mail::assertSent(
            CommandsBaseMail::class
        );
    }
}
