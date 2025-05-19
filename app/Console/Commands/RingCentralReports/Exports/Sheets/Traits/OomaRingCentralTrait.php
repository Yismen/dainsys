<?php

namespace App\Console\Commands\RingCentralReports\Exports\Sheets\Traits;

use App\Console\Commands\RingCentralReports\Exports\Support\Connections\ConnectionContract;
use Illuminate\Support\Facades\DB;

trait OomaRingCentralTrait
{
    public function getDispositionsSummary(
        ConnectionContract $connection,
        string $date_from,
        string $date_to
    ): array {
        return $connection->connect()
            ->select(
                "
                    SELECT
                        dial_group_name,
                        agent_first_name,
                        agent_last_name,
                        username,
                        MIN(call_date) as date_from,
                        MAX(call_date) as date_to,
                        SUM([proposal_sent/email_sent]) as [total_proposal_sent/email_sent],
                        SUM([email_sent_third_party]) as [total_email_sent_third_party],
                        SUM([total_calls]) as [total_total_calls]
                    FROM [Reports].[dbo].[vw_Ecco_Ooma_Dispositions]
                    WHERE call_date BETWEEN '{$date_from}' AND '{$date_to}'
                    GROUP BY
                        dial_group_name,
                        agent_first_name,
                        agent_last_name,
                        username
                    ORDER BY
                        dial_group_name,
                        agent_first_name,
                        agent_last_name

                "            );
    }
}
