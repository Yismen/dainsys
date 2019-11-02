<?php

namespace App\Repositories\Capillus;

use Illuminate\Support\Facades\DB;

abstract class CapillusBase
{
    /**
     * Current connection as a property
     *
     * @var DB::connection
     */
    protected $connection;

    public function __construct()
    {        
        $this->connection = $this->connection();
    }

    /**
     * Current connection
     *
     * @return DB::connection
     */
    public function connection($connection = 'poliscript')
    {
        return DB::connection($connection);
    }
}