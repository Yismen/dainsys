<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class UserLoggedIn
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
    public function handle(Login $event)
    {
        $event->user->createLoginSession();
    }
}
