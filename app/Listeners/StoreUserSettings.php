<?php

namespace App\Listeners;

use App\Events\CreateUserSettings;
use App\Models\AppSetting;
use Illuminate\Http\Request;

class StoreUserSettings
{
    protected $request;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     *
     * @return void
     */
    public function handle(CreateUserSettings $event)
    {
        $event->user->app_setting()->save(
            new AppSetting(
                $event->user->settings
            )
        );
    }
}
