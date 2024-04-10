<?php

namespace App\Console\Commands\Inbound\Support;

use Illuminate\Support\Facades\DB;
use App\Connections\RingCentralConnection;

class InboundSummaryRepository extends RingCentralConnection implements InboundSummaryInterface
{
    use InboundSummaryDataParserTrait;

    public $data;
    public $hours_data;

    public $date_from;

    public $date_to;

    protected $gate_statement;

    protected string $agent_group_name;

    protected string|array $dial_group_name;

    public function __construct($date_from, $date_to, $agent_group_name = 'ECC%', $gate = '%')
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->gate_statement = $this->getGateStatement($gate);
        $this->agent_group_name = $agent_group_name;
        $this->dial_group_name = $gate;
    }

    public function getInboundData(array $group_fields = []): array
    {
        return config('app.env') === 'testing' ?
            $this->getFakedInbound() :
            $this->connection()->select(
                DB::raw($this->sqlRawStatement($group_fields))
            );
    }

    public function getHoursData(): array
    {
        $data = \config('app.env') === 'testing' ?
            $this->getFakedHours() :
            $this->connection()->select(
                DB::raw("
                    SELECT *
                    FROM vw_Hours_Summary
                    WHERE
                        CONVERT(date, [Report Date]) BETWEEN '{$this->date_from}' AND '{$this->date_to}'
                        AND (
                            [Dial Group] LIKE 'HTL%'
                            or [Dial Group] like 'eth%'
                            or [Dial Group] like 'etr%'
                        )
                        AND Team like '{$this->agent_group_name}'
                        ORDER BY [Report Date] desc, Team asc, agent_name asc, [Dial Group] asc
            ")
            );
        return $data;
    }

    public function getFakedInbound(): array
    {
        return json_decode('
            [
                {
                    "gate_name":"HTL - Shared",
                    "agent_disposition":"40 - Caller Hung Up",
                    "agent_fname":"Johanny Alberto",
                    "agent_lname":"Flores Garcia",
                    "agent_name":"With First Name Flores Garcia",
                    "agent_username":"jfloresce1",
                    "agent_group_name":"ECC-SD",
                    "call_date":"2021-05-25",
                    "duration_time":"2.5000000000000001E-2",
                    "queue_time":"2.7777777777777778E-4",
                    "agent_duration_time":"2.4722222222222222E-2",
                    "on_hold_time":"0.0",
                    "wrap_time":"2.2222222222222222E-3",
                    "wait_time":"0.20499999999999999",
                    "total_calls":"1",
                    "total_sales":"0"
                },
                {
                    "gate_name":"HTL - Shared",
                    "agent_disposition":"40 - Caller Hung Up",
                    "agent_fname":"Ramon Antonio",
                    "agent_lname":"Lopez Taveras",
                    "agent_name":"With First Name Lopez Taveras",
                    "agent_username":"rlopezce1",
                    "agent_group_name":"ECC-SD",
                    "call_date":"2021-05-25",
                    "duration_time":"3.3055555555555553E-2",
                    "queue_time":"1.6666666666666668E-3",
                    "agent_duration_time":"3.1666666666666669E-2",
                    "on_hold_time":"0.0",
                    "wrap_time":"1.3888888888888888E-2",
                    "wait_time":"0.54722222222222228",
                    "total_calls":"3",
                    "total_sales":"0"
                }
            ]
        ');
    }

    public function getFakedHours(): array
    {
        return json_decode('[
            {
                "Dial Group":"ECC-Kipany_Dedicated",
                "Last Name":"Flores Garcia",
                "First Name":"Johanny Alberto",
                "agent_name":"Johanny Alberto With Last Name",
                "Username":"jfloresce1",
                "Report Date":"2021-05-25",
                "login_time":"13.519166666666667",
                "work_time":"12.555666666666667",
                "talk_time":"3.0390000000000001",
                "off_hook_time":"12.363833333333332",
                "break_time":"0.96366666666666678",
                "away_time":"0.0",
                "lunch_time":"0.0",
                "training_time":"0.0",
                "pending_time":"0.14483333333333331",
                "time_on_hold":"1.1166666666666667E-2",
                "engaged_time":"3.0358333333333332",
                "available_time":"9.5186666666666664",
                "Team":"ECC-SD",
                "login_name":"jfloresce1"
            },
            {
                "Dial Group":"ECC-Kipany_Dedicated",
                "Last Name":"Lopez Taveras",
                "First Name":"Ramon Antonio",
                "agent_name":"Ramon Antonio With Last Name",
                "Username":"rlopezce1",
                "Report Date":"2021-05-25",
                "login_time":"10.1775",
                "work_time":"9.7021666666666668",
                "talk_time":"2.8136666666666668",
                "off_hook_time":"9.7083333333333339",
                "break_time":"0.47499999999999998",
                "away_time":"0.0",
                "lunch_time":"0.0",
                "training_time":"0.0",
                "pending_time":"0.376",
                "time_on_hold":"0.0",
                "engaged_time":"2.809166666666667",
                "available_time":"6.8906666666666663",
                "Team":"ECC-SD",
                "login_name":"rlopezce1"
            }

        ]');
    }
}
