<?php

namespace App\Console\Commands\General\DailyProductionReport;

use App\Connections\RingCentralConnection;
use Illuminate\Support\Facades\DB;

class DailyProductionReportRepository extends RingCentralConnection
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

    private function getData()
    {
        return $this->connection()->select(
            DB::raw("
                declare @fromDate as smalldatetime, @toDate as smalldatetime, @campaign as varchar(50), @team_group as varchar(50) = '%'
                set @fromDate = '{$this->date_from}'
                set @toDate = '{$this->date_to}'
                set @campaign = '%'
                set @team_group = '{$this->team_group}'
                
                exec [sp_Hours_Summary] @fromDate, @toDate, @campaign, @team_group
            ")
        );
    }
}
