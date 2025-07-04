<?php

namespace App\Repositories\Capillus;

use App\Connections\RingCentralConnection;

class CapillusAgentReportRepository extends RingCentralConnection
{
    public $data;

    protected $options;

    public function __construct(array $options)
    {
        $this->options = $options;

        $this->data = $this->getData();
    }

    protected function getData()
    {
        return $this->connection()->select(
            "
                SET NOCOUNT ON
                declare @fromDate as datetime, @toDate as datetime
                set @fromDate = '{$this->options['from_date']}'
                set @toDate = '{$this->options['to_date']}'

                exec sp_CapillusAgentReport @fromDate, @toDate
            "
        );
    }
}
