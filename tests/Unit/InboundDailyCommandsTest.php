<?php

namespace Tests\Unit;

use App\Console\Commands\Inbound\Support\InboundDataRepository;
use App\Console\Commands\Inbound\Support\InboundSummaryExport;
use App\Mail\CommandsBaseMail;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class InboundDailyCommandsTest extends TestCase
{

    /** @test */
    public function daily_summary_command_exists()
    {
        Excel::fake();
        Mail::fake();

        $this->artisan('inbound:send-daily-summary')
            ->assertExitCode(0)
            ->expectsOutput("Kipany Inbound Daily Report sent!");
    }

    /** @test */
    public function daily_summary_command_executes()
    {
        Excel::fake();
        Mail::fake();
        $subject = "Fake Name";
        $file_name = "{$subject}.xlsx";
        $this->artisan('inbound:send-daily-summary');

        Mail::assertSent(
            CommandsBaseMail::class
        );
    }

    /** @test */
    // public function repository_returns_data()
    // {
    // Excel::fake();
    // Mail::fake();
    // $repo = new InboundSummaryRepository('2021-05-25', '2021-05-25');
    // $repo->getByGates();

    // $this->assertCount(2, $repo->data);;
    // }

    /** @test */
    public function excel_file_is_stored()
    {
        Excel::fake();

        $subject = "Fake Name";
        $file_name = "{$subject}.xlsx";
        $repo['data'] = InboundDataRepository::getData(
            '2021-05-25',
            '2021-05-25',
            $fields = [
                \App\Console\Commands\Inbound\Support\DataParsers\ByEmployee::class,
                \App\Console\Commands\Inbound\Support\DataParsers\DispositionsByGate::class,
                \App\Console\Commands\Inbound\Support\DataParsers\DispositionsByEmployee::class,
                \App\Console\Commands\Inbound\Support\DataParsers\HoursData::class,
            ]
        );

        Excel::store(
            new InboundSummaryExport(
                $repo['data']
            ),
            $file_name
        );

        Excel::assertStored($file_name, function (InboundSummaryExport $export) {
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

        $repo['data'] = InboundDataRepository::getData(
            '2021-05-25',
            '2021-05-25',
            $fields = [
                \App\Console\Commands\Inbound\Support\DataParsers\ByEmployee::class,
                \App\Console\Commands\Inbound\Support\DataParsers\DispositionsByGate::class,
                \App\Console\Commands\Inbound\Support\DataParsers\DispositionsByEmployee::class,
                \App\Console\Commands\Inbound\Support\DataParsers\HoursData::class,
            ]
        );

        Excel::store(
            new InboundSummaryExport(
                $repo['data']
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
