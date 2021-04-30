<?php

namespace App\Console\Commands\Common\HourlyProductionReport;

use App\Connections\RingCentralConnection;
use Illuminate\Support\Facades\DB;

class HourlyProductionReportRepository extends RingCentralConnection implements HourlyProductionReportInterface
{
    public $data;
    public $dispositions;

    public $date_from;

    protected $date_to;

    protected string $campaign;

    protected string $team;

    public function __construct($date_from, $date_to, $campaign, $team = '%')
    {
        $this->date_from = $date_from;
        $this->date_to = $date_to;
        $this->campaign = $campaign;
        $this->team = $team;
    }

    public function getData(): object
    {
        $this->data =  $this->connection()->select(
            DB::raw("
                declare @fromDate as smalldatetime, @toDate as smalldatetime, @campaign as varchar(50), @team as varchar(50) = '%'
                set @fromDate = '{$this->date_from}'
                set @toDate = '{$this->date_to}'
                set @campaign = '{$this->campaign}%'
                set @team = '{$this->team}%'
                
                exec [sp_Hours_Summary] @fromDate, @toDate, @campaign, @team
            ")
        );

        return $this;
    }

    public function getDispositions(): object
    {
        $this->dispositions = $this->connection()->select(
            DB::raw("        
                declare @fromDate as smalldatetime, @toDate as smalldatetime, @campaign as varchar(50)
                set @fromDate = '{$this->date_from}'
                set @toDate = '{$this->date_to}'
                set @campaign = '{$this->campaign}%'
                
                exec [sp_Dispositions_Summary] @fromDate, @toDate, @campaign
            ")
        );

        return $this;
    }
}
