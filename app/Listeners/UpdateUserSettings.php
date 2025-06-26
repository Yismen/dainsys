<?php

namespace App\Listeners;

use App\Events\EditUserSettings;
use Illuminate\Http\Request;

class UpdateUserSettings
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private readonly Request $request) {}

    /**
     * Handle the event.
     *
     *
     * @return void
     */
    public function handle(EditUserSettings $event)
    {
        $event->user->app_setting->update(
            $event->user->settings
        );
    }
}
