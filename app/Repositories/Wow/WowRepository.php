<?php

namespace App\Repositories\Wow;

use App\Connections\RingCentralConnection;
use Illuminate\Support\Facades\DB;

class WowRepository extends RingCentralConnection
{
    public $data;
    public $dispositions;

    protected $date_from;

    protected $date_to;

    public function __construct(array $options)
    {
        $this->date_from = $options['date_from'];
        $this->date_to = $options['date_to'];
        $this->data = $this->getData();
        $this->dispositions = $this->getDispositions();
    }

    protected function getDispositions()
    {
        return $this->connection()->select(
            "
                declare @fromDate as smalldatetime, @toDate as smalldatetime, @campaign as varchar(50)
                set @fromDate = '{$this->date_from}'
                set @toDate = '{$this->date_to}'
                set @campaign = 'CTV%'

                exec [sp_Dispositions_Summary] @fromDate, @toDate, @campaign
            "
        );
    }

    private function getData()
    {
        return $this->connection()->select(
            "
                declare @fromDate as smalldatetime, @toDate as smalldatetime, @campaign as varchar(50)
                set @fromDate = '{$this->date_from}'
                set @toDate = '{$this->date_to}'
                set @campaign = 'CTV%'

                exec [sp_Hours_Summary] @fromDate, @toDate, @campaign
            "
        );
    }
}
