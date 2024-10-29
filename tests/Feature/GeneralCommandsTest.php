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
use App\Console\Commands\General\SendGeneralDailyProductionReportCommand;
use App\Console\Commands\General\DailyProductionReport\GeneralDailyProductionReportExport;
use App\Console\Commands\General\DailyProductionReport\GeneralDailyProductionReportRepository;

class GeneralCommandsTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_sends_the_general_daily_production_report()
    {
        Mail::fake();
        Excel::fake();
        $report = factory(Report::class)->create(['key' => 'dainsys:general-rc-production-report']);
        $recipients = factory(Recipient::class, 2)->create();
        $report->recipients()->sync($recipients->pluck('id')->toArray());

        $this->mockRepo(GeneralDailyProductionReportRepository::class, $this->getData());
        $this->artisan(SendGeneralDailyProductionReportCommand::class)
            // ->expectsOutput("General Daily Production Report Sent")
            ->assertExitCode(0);

        // Mail::assertSent(CommandsBaseMail::class);
    }

    /** @test */
    public function excel_file_is_stored()
    {
        Excel::fake();

        $subject = 'Fake Name';
        $file_name = "{$subject}.xlsx";

        Excel::store(
            new GeneralDailyProductionReportExport(
                ['data' => 'some']
            ),
            $file_name
        );

        Excel::assertStored($file_name, function (GeneralDailyProductionReportExport $export) {
            return true;
        });
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
            new GeneralDailyProductionReportExport(
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
        return json_decode('
            {"data":[{"agent_name":"MYRIAM CASSAMAJOR","dial_group":"POL - NP - SEIUPatch20210127","Team":"SD","Last Name":"CASSAMAJOR","First Name":"MYRIAM","date_from":"2021-02-05","date_to":"2021-02-05","login_time":"0.31366666666666665","work_time":"0.29549999999999998","talk_time":"8.6333333333333331E-2","off_hook_time":"0.31083333333333329","break_time":"0.0","away_time":"0.0","lunch_time":"0.0","training_time":"1.8000000000000002E-2","pending_dispo_time":"0.17699999999999999","time_on_hold":"0.0","engaged_time":"8.0500000000000002E-2","available_time":"0.21133333333333332","total_calls":"15","total_sales":"0","total_contacts":"0"},{"agent_name":"Pedro Camilo Hidalgo Bautista","dial_group":"POL - NP - SEIUPatch20210127","Team":"SD","Last Name":"Hidalgo Bautista","First Name":"Pedro Camilo","date_from":"2021-02-05","date_to":"2021-02-05","login_time":"3.1279999999999997","work_time":"2.8641666666666667","talk_time":"1.7489999999999999","off_hook_time":"2.3066666666666666","break_time":"0.26216666666666666","away_time":"0.0","lunch_time":"0.0","training_time":"0.0","pending_dispo_time":"0.31266666666666665","time_on_hold":"0.0","engaged_time":"1.7060000000000002","available_time":"1.1056666666666666","total_calls":"212","total_sales":"16","total_contacts":"16"},{"agent_name":"Ramon Antonio Lopez Taveras","dial_group":"POL - NP - SEIUPatch20210127","Team":"SD","Last Name":"Lopez Taveras","First Name":"Ramon Antonio","date_from":"2021-02-05","date_to":"2021-02-05","login_time":"3.2433333333333336","work_time":"2.9711666666666665","talk_time":"1.4733333333333334","off_hook_time":"1.9966666666666668","break_time":"0.2545","away_time":"0.0","lunch_time":"0.0","training_time":"1.3333333333333333E-3","pending_dispo_time":"0.85583333333333322","time_on_hold":"0.0","engaged_time":"1.4203333333333332","available_time":"1.508","total_calls":"177","total_sales":"6","total_contacts":"6"}]}
        ');
    }
}
