<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Report;
use App\Models\Recipient;
use App\Mail\CommandsBaseMail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Console\Commands\General\SendGeneralDailyRawReportCommand;
use App\Console\Commands\General\DailyRawReport\GeneralDailyRawReportExport;
use App\Console\Commands\General\DailyRawReport\GeneralDailyRawReportRepository;

class GeneralRawDailyCommandsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_sends_the_general_daily_raw_report()
    {
        Mail::fake();
        Excel::fake();
        $report = Report::factory()->create(['key' => 'dainsys:general-rc-raw-report']);
        $recipients = Recipient::factory(2)->create();
        $report->recipients()->sync($recipients->pluck('id')->toArray());

        $subject = 'Fake Name';
        $file_name = "{$subject}.xlsx";

        $this->mockRepo(GeneralDailyRawReportRepository::class, $this->getData());
        $this->artisan(SendGeneralDailyRawReportCommand::class)
            ->expectsOutput('General Daily Raw Report Sent!')
            ->assertExitCode(0);

        Mail::assertQueued(CommandsBaseMail::class);
    }

    /** @test */
    public function excel_file_is_stored()
    {
        Excel::fake();

        $subject = 'Fake Name';
        $file_name = "{$subject}.xlsx";

        Excel::store(
            new GeneralDailyRawReportExport(
                $this->getData()
            ),
            $file_name
        );

        Excel::assertStored($file_name, fn(GeneralDailyRawReportExport $export) => true);
    }

    /** @test */
    public function email_report_is_sent()
    {
        Excel::fake();
        Mail::fake();

        $subject = 'Fake Name';
        $file_name = "{$subject}.xlsx";
        $recipient = 'someone@fake.email';

        Excel::store(
            new GeneralDailyRawReportExport(
                $this->getData()
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

    protected function getData()
    {
        return json_decode('[{
            "Agent ID":"1375145",
            "Agent Name":"Kelly Deroose",
            "Username":"kderoosecfh",
            "Login DTS":"2021-05-02 04:36:00.000",
            "Logout DTS":"2021-05-02 04:38:00.000",
            "Dial Group":"HTL - Dedicated",
            "Presented":"1",
            "Accepted":"1",
            "Manual No Connect":"0",
            "RNA":"0",
            "Disp Xfers":"0",
            "Talk Time (min)":".22",
            "Avg Talk Time (min)":".22",
            "Login Time (min)":"1.17",
            "Login Utilization":"18.57%",
            "Off Hook Time (min)":"1.13",
            "Rounded OH Time (min)":"2.00",
            "Off Hook Utilization":"19.12%",
            "Off Hook to Login %":"97.14%",
            "Work Time (min)":"1.17",
            "Break Time (min)":".00",
            "Away Time (min)":".00",
            "Lunch Time (min)":".00",
            "Training Time (min)":".00",
            "Pending Disp Time (min)":".22",
            "Avg Pending Disp Time":"0.22",
            "External Agent ID":"740KSFOB",
            "Calls Placed On Hold":"0",
            "Time On Hold (min)":".00",
            "Ring Time (min)":".00",
            "EngagedTime (min)":".22",
            "RNA Time (min)":".00",
            "Available Time (min)":".95",
            "Team":"WFH_SXM"
        }]');
    }
}
