<?php

namespace App\Console\Commands\General\DailyRawReport;

use App\Connections\RingCentralConnection;
use Illuminate\Support\Facades\DB;

class GeneralDailyRawReportRepository extends RingCentralConnection
{
    public $data;

    protected $date_from;

    protected $date_to;

    protected string $team_group;

    public function __construct(array $options, string $team_group = '%')
    {
        $this->date_from = $options['date_from'];
        $this->date_to = $options['date_to'];
        $this->team_group = $team_group;

        $this->data = $this->getData();
    }

    public function getData()
    {
        if (\config('app.env') == 'testing') {
            return $this->getFakeData();
        }

        return $this->connection()->select(
            DB::raw("
                DECLARE 
                    @dateFrom as date, 
                    @dateTo as date,
                    @team as varchar(50) = '%'

                SET @dateFrom  = '{$this->date_from}'
                SET	@dateTo = '{$this->date_to}'
                SET	@team  = '{$this->team_group}'

                EXEC [sp_Session_Raw_Report] @dateFrom, @dateTo, @team
            ")
        );
    }

    protected function getFakeData()
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
