<?php

namespace App\Repositories\Because;

use App\Connections\RingCentralConnection;

class BecausePullDailyPerformanceDataRepository extends RingCentralConnection
{
    public $data;

    public function getData($dial_group, $date)
    {
        return $this->data = $this->connection()->select(
            "
                declare @reportDate as date, @campaign as  varchar(50)

                set @reportDate = '{$date}'
                set @campaign = '{$dial_group}'

                exec [sp_BecauseDailyReport] @reportDate, @campaign
            "
        );
    }
}
