<?php

namespace App\Events;

use App\Models\Employee;
use App\Models\Termination;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmployeeTerminated
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public Employee $employee;
    public Termination $termination;

    public function __construct(Employee $employee, Termination $termination)
    {
        $this->employee = $employee;
        $this->termination = $termination;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return [];
    }
}
