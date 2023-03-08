<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class EmployeesUpdates extends Event
{

    use SerializesModels;
    private $employees;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($employees)
    {
        $this->employees = $employees;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
