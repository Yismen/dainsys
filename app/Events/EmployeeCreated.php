<?php

namespace App\Events;

use App\Models\Employee;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class EmployeeCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $employee;

    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
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
