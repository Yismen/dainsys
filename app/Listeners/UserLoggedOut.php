<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;

class UserLoggedOut
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Handle the event.
     *
     *
     * @return void
     */
    public function handle(Logout $event)
    {
        $event->user->closeLoginSessions();
    }
}
