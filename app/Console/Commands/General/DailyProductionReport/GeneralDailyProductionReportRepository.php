<?php

namespace App\Console\Commands\General\DailyProductionReport;

use App\Connections\RingCentralConnection;

class GeneralDailyProductionReportRepository extends RingCentralConnection
{
    public $data;

    protected $date_from;

    protected $date_to;

    protected $dispositions;

    public function __construct(array $options, protected string $team_group = '%')
    {
        $this->date_from = $options['date_from'];
        $this->date_to = $options['date_to'];

        $this->data = $this->getData();
    }

    public function getData()
    {
        return $this->dispositions = \config('app.env') === 'testing' ?
            true :
            $this->connection()->select(
                "
                declare @fromDate as smalldatetime, @toDate as smalldatetime, @campaign as varchar(50), @team_group as varchar(50) = '%'
                set @fromDate = '{$this->date_from}'
                set @toDate = '{$this->date_to}'
                set @campaign = '%'
                set @team_group = '{$this->team_group}'

                exec [sp_Hours_Summary] @fromDate, @toDate, @campaign, @team_group
            "
            );
    }
}
