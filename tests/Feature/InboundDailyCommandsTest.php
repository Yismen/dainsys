<?php

namespace Tests\Feature;

use App\Console\Commands\Inbound\SendDailySummaryCommand;
use App\Console\Commands\Inbound\Support\InboundDataRepository;
use App\Console\Commands\Inbound\Support\InboundSummaryExport;
use App\Mail\CommandsBaseMail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class InboundDailyCommandsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function daily_summary_command_exists()
    {
        Excel::fake();
        Mail::fake();
        $report = \App\Models\Report::factory()->create(['key' => 'inbound:send-daily-summary']);
        $recipients = \App\Models\Recipient::factory(2)->create();
        $report->recipients()->sync($recipients->pluck('id')->toArray());

        $this->mockRepo(InboundDataRepository::class, []);
        $this->artisan(SendDailySummaryCommand::class)
            ->assertExitCode(0)
            ->expectsOutput('Kipany Inbound Daily Report sent!');
    }

    /** @test */
    public function daily_summary_command_executes()
    {
        Excel::fake();
        Mail::fake();
        $subject = 'Fake Name';
        $file_name = "{$subject}.xlsx";
        $report = \App\Models\Report::factory()->create(['key' => 'inbound:send-daily-summary']);
        $recipients = \App\Models\Recipient::factory(2)->create();
        $report->recipients()->sync($recipients->pluck('id')->toArray());

        $this->mockRepo(InboundDataRepository::class, []);

        $this->mockRepo(InboundDataRepository::class, []);
        $this->artisan(SendDailySummaryCommand::class);

        Mail::assertQueued(
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

        $subject = 'Fake Name';
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

        Excel::assertStored($file_name, fn (InboundSummaryExport $export) => true);
    }

    /** @test */
    public function email_report_is_sent()
    {
        Excel::fake();
        Mail::fake();

        $subject = 'Fake Name';
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

        Mail::assertQueued(
            CommandsBaseMail::class
        );
    }
}
