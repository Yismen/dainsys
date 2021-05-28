<?php

namespace App\Console\Commands\Inbound\Support;

use Illuminate\Support\Str;

class InboundDataRepository
{
    /**
     * Date range start
     */
    private static string $date_from;
    /**
     * Date range limit
     */
    private static string $date_to;
    /**
     * Team prefix. Used to query the agent group name
     */
    private static string $team;
    /**
     * Gate name. Used to query the gate name field. 
     * If string, the WHERE LIKE statement will be used. 
     * If array, the WHERE IN () statement will be used
     *
     * @var string|array
     */
    private static $gate;
    /**
     * List of fields to run or returned data for. 
     * For each field make sure to add a method with name in cammel case.
     */
    private static array $fields = [
        'by_employee',
        'dispositions_by_gate',
        'dispositions_by_employee',
        'hours_data',
    ];
    /**
     * Get inbound data. It is the class entry point and serve as an constructor.
     *
     * @param string $date_from
     * @param string $date_to
     * @param array $fields
     * @param string $team
     * @param string|array $gate
     * @return void
     */
    public static function getData(string $date_from, string $date_to, array $fields = [], string $team = 'ECC%', $gate = '%')
    {
        self::$date_from = $date_from;
        self::$date_to = $date_to;
        self::$team = $team;
        self::$gate = $gate;

        $return_array = [];

        if (!empty($fields)) {
            self::$fields = $fields;
        }

        foreach (self::$fields as $key) {
            $method_name = Str::camel($key);
            $return_array[$key] = self::$method_name();
        }

        return $return_array;
    }

    protected static function byEmployee()
    {
        return self::getInboundData($group_fields = [
            'call_date',
            'gate_name',
            'agent_group_name',
            'agent_fname',
            'agent_lname',
            'agent_username',
        ]);
    }

    protected static function dispositionsByGate()
    {
        return self::getInboundData($group_fields = [
            'call_date',
            'gate_name',
            'agent_disposition',
        ]);
    }

    protected static function dispositionsByEmployee()
    {
        return self::getInboundData($group_fields = [
            'call_date',
            'agent_fname',
            'agent_lname',
            'agent_disposition',
        ]);
    }

    protected static function hoursData()
    {
        $repo = new InboundSummaryRepository(self::$date_from, self::$date_to, self::$gate,  self::$team);

        return $repo->getHoursData();
    }

    protected static function getInboundData($group_fields)
    {
        $repo = new InboundSummaryRepository(self::$date_from, self::$date_to, self::$gate,  self::$team);

        return $repo->getInboundData($group_fields);
    }
}
