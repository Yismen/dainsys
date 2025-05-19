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
        if (\config('app.env') === 'testing') {
            return $this->getFakeData();
        }

        return $this->connection()->select(
            "
                DECLARE
                    @dateFrom as date,
                    @dateTo as date,
                    @team as varchar(50) = '%'

                SET @dateFrom  = '{$this->date_from}'
                SET	@dateTo = '{$this->date_to}'
                SET	@team  = '{$this->team_group}'

                EXEC [sp_Session_Raw_Report] @dateFrom, @dateTo, @team
            "
        );
    }

    protected function getFakeData()
    {
        return json_decode('[{
            "agent_id":"1412984",
            "agent_name":"Carlos Ortega",
            "username":"cortegace1",
            "time_in":"2021-05-13 09:51:00.000",
            "time_out":"2021-05-13 14:37:00.000",
            "dial_group":"Downtime PUB-Cell",
            "presented":"0",
            "accepted":"0",
            "manual_no_connect":"0",
            "RNA":"0",
            "disp_xfers":"0",
            "talk_time":".00",
            "login_time":"4.7621666666666673",
            "off_hook_time":"0.0",
            "work_time":"4.7625000000000002",
            "break_time":"0.0",
            "away_time":"0.0",
            "lunch_time":"0.0",
            "training_time":"0.0",
            "pending_disp_time":"0.0",
            "calls_placed_on_hold":"0.0",
            "on_hold_time":"0.0",
            "ring_time":"0.0",
            "engaged_time":"0.0",
            "rna_time":"0.0",
            "available_time":"0.0",
            "team":"ECC-Supervisor"
        }]');
    }
}
