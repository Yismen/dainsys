<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Illuminate\Mail\Events\MessageSent::class => [
            \App\Listeners\RemoveTemporaryMailAttachments::class,
        ],
        \Illuminate\Notifications\Events\NotificationSent::class => [
            \App\Listeners\AppNotificationReceived::class,
        ],
        \App\Events\EmployeeDeactivated::class => [
            \App\Listeners\SemdEmailToHumanResources::class,
        ],
        \App\Events\EmployeeTerminated::class => [
            \App\Listeners\UpdateTerminationDataField::class,
            \App\Listeners\NotifyEmployeesTerminated::class,
        ],
        \App\Events\EmployeeReactivated::class => [
            \App\Listeners\EmployeeReactivated::class,
        ],
        \App\Events\EmployeeCreated::class => [
            // \App\Listeners\NotifyEmployeeCreated::class,
            \App\Listeners\CreateEmployeeShift::class,
            \App\Listeners\CreateEmployeeSchedule::class,
            \App\Listeners\AssignEmployeeToAutomaticProcesses::class,
        ],
        // \App\Events\MessageCreated::class => [
        //     \App\Listeners\NotifyUserOfANewMessage::class,
        // ],
        \App\Events\CreateUserSettings::class => [
            \App\Listeners\StoreUserSettings::class,
        ],
        \App\Events\EditUserSettings::class => [
            \App\Listeners\UpdateUserSettings::class,
        ],
        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\UserLoggedIn::class,
        ],
        \Illuminate\Auth\Events\Logout::class => [
            \App\Listeners\UserLoggedOut::class,
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param \Illuminate\Contracts\Events\Dispatcher $events
     */
    public function boot()
    {
        parent::boot();
    }
}
