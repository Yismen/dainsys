<?php

namespace App\Console\Commands\Inbound\Support;

trait InboundSummaryDataParserTrait
{
    protected function getGateStatement($gate)
    {
        $statement = "gate_name ";

        if (\gettype($gate) === 'array') {
            $toString = implode(',', $gate);
            return "{$statement} IN '{$toString}'";
        }

        return "{$statement} LIKE '{$gate}'";
    }

    protected function sqlRawStatement(array $group_fields)
    {
        $statements = $this->parseRawStatement($group_fields);

        return "
            SELECT 
                {$statements['select_statetment']}
            FROM vw_Inbound_Call_Detail_Download
            WHERE
                CONVERT(date, call_date) BETWEEN '{$this->date_from}' AND '{$this->date_to}'
                AND agent_group_name LIKE '{$this->agent_group_name}'
                AND {$this->gate_statement} 
            GROUP BY                        
                {$statements['groups_statement']}
            ORDER BY
                {$statements['groups_statement']}
        ";
    }

    protected function parseRawStatement(array $group_fields)
    {
        if (empty($group_fields)) {
            $group_fields = [
                'call_date',
                'gate_name',
                'agent_group_name',
                'agent_fname',
                'agent_lname',
                'agent_username',
                'agent_disposition'
            ];
        }

        $select_fields = array_merge($group_fields, [
            'SUM(duration_time) as duration_time',
            'SUM(queue_time) as queue_time',
            'SUM(agent_duration_time) as agent_duration_time',
            'SUM(on_hold_time) as on_hold_time',
            'SUM(wrap_time) as wrap_time',
            'SUM(wait_time) as wait_time',
            'SUM(total_calls) as total_calls',
            'SUM(total_sales) as total_sales',

        ]);

        return [
            'groups_statement' => implode(',', $group_fields),
            'select_statetment' => implode(',', $select_fields),
        ];
    }
}
