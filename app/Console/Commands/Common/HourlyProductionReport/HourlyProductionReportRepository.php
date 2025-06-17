<?php

namespace App\Console\Commands\Common\HourlyProductionReport;

use App\Connections\RingCentralConnection;
use Illuminate\Support\Facades\DB;

class HourlyProductionReportRepository extends RingCentralConnection implements HourlyProductionReportInterface
{
    public $data;
    public $dispositions;

    public function __construct(public $date_from, protected $date_to, protected string $campaign, protected string $team = '%')
    {
    }

    public function getData(): object
    {
        $this->data = config('app.env') === 'testing' ?
            $this->getFakedData() :
            $this->connection()->select(
                "
                    declare @fromDate as smalldatetime, @toDate as smalldatetime, @campaign as varchar(50), @team as varchar(50) = '%'
                    set @fromDate = '{$this->date_from}'
                    set @toDate = '{$this->date_to}'
                    set @campaign = '{$this->campaign}%'
                    set @team = '{$this->team}%'

                    exec [sp_Hours_Summary] @fromDate, @toDate, @campaign, @team
                "
            );

        return $this;
    }

    public function getDispositions(): object
    {
        $this->dispositions = \config('app.env') === 'testing' ?
            $this->getFakedDispositions() :
            $this->connection()->select("declare @fromDate as smalldatetime, @toDate as smalldatetime, @campaign as varchar(50), @team as varchar(50)
                set @fromDate = '{$this->date_from}'
                set @toDate = '{$this->date_to}'
                set @campaign = '{$this->campaign}%'
                set @team = '{$this->team}%'

                exec [sp_Dispositions_Summary] @fromDate, @toDate, @campaign, @team");

        return $this;
    }

    public function getFakedData(): array
    {
        return json_decode('
            [{
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
            }]
        ');
    }

    public function getFakedDispositions(): array
    {
        return json_decode('[{"some" : "data"}]');
    }
}
