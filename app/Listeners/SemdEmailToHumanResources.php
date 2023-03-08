<?php

namespace App\Listeners;

use App\Events\EmployeeCreate;
use App\Events\EmployeeCreated;

class SemdEmailToHumanResources
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  EmployeeCreate  $event
     *
     * @return void
     */
    public function handle(EmployeeCreated $event)
    {
    }
}
