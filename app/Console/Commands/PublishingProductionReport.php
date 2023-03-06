<?php

namespace App\Console\Commands;

use Dainsys\RingCentral\Console\Commands\ProductionReportCommand;

class PublishingProductionReport extends ProductionReportCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'publishing:production-report 
        {dates?}
        ';

    /**
        * List of dialGroups to query. Provide all dialGroups.
        *
        * @return array
        */
    public function dialGroups(): array
    {
        return ['PUB%'];
    }

    /**
        * List of teams to query.
        *
        * @return array
        */
    public function teams(): array
    {
        return ['ECC%'];
    }

    /**
    * Email subject
    */
    public function subject(): string
    {
        return str($this->name)->replace(':', ' ')->headline();
    }
}
