<?php

namespace App\Console\Commands\Inbound\Support;

use App\Console\Commands\Inbound\Support\DataParsers\DataParsersContract;
use Illuminate\Support\Str;

class InboundDataRepository
{
    /**
     * Date range start
     */
    protected static string $date_from;

    /**
     * Date range limit
     */
    protected static string $date_to;

    /**
     * query the agent_group_name with the WHERE LIKE value% pattern.
     */
    protected static string $team;

    /**
     * Gate name to query the gate_name field. Default %
     * Pass a string to query it using the WHERE LIKE value% pattern.
     * Pass an array to query it using the WHERE IN () pattern.
     *
     * @var (string|array)
     */
    protected static $gate;

    /**
     * Array of instances of the \App\Console\Commands\Inbound\Support\DataParser\DataParsersContract to be run!
     */
    private static array $data_parsers;

    /**
     * Get inbound data. It is the class entry point and serve as an constructor.
     *
     * @param  string|array  $gate
     * @return void
     */
    public static function getData(string $date_from, string $date_to, array $data_parsers = [], string $team = 'ECC%', $gate = '%')
    {
        self::$date_from = $date_from;
        self::$date_to = $date_to;
        self::$team = $team;
        self::$gate = $gate;

        foreach ($data_parsers as $parser_class) {
            $parser_instance = new $parser_class;

            self::$data_parsers[Str::snake(\class_basename($parser_class))] = self::handleGetData($parser_instance);
        }

        return self::$data_parsers;
    }

    /**
     * Handle the get data logic
     */
    protected static function handleGetData(DataParsersContract $parser_instance): array
    {
        return $parser_instance->handle(self::$date_from, self::$date_to, self::$team, self::$gate);
    }
}
