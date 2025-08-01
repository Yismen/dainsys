<?php

namespace App\Console\Commands\Common\Traits;

use App\Models\User;
use App\Notifications\UserAppNotification;
use Illuminate\Support\Facades\Cache;

trait NotifyUsersOnFailedCommandsTrait
{
    /**
     * Array of roles to query the users. All users with
     * these roles will receive this notification;
     *
     * @var array
     */
    public $notifiable_roles = ['admin'];

    /**
     * Notify all queried users;
     *
     * @param  \Throwable  $th
     * @return object
     */
    protected function notifyUsers($th)
    {
        Cache::flush();

        try {
            $users = User::role($this->notifiable_roles)->get();
            $time = now();
            $class_name = static::class;

            foreach ($users as $user) {
                $user->notify(new UserAppNotification(
                    'Command failed!',
                    "Command {$class_name} failed at ! {$time} with exception {$th->getMessage()}"
                ));
            }

            return $this;
        } catch (\Throwable) {
            // throw $th;
        }
    }

    /**
     * Save the exception to a log.
     *
     *
     * @return object
     */
    protected function logError(\Throwable $th)
    {
        return $this;
    }

    /**
     * Wrapper to Notify all desired users and log the errors
     *
     *
     * @return void
     */
    protected function notifyUsersAndLogError(\Throwable $th)
    {
        $this->logError($th)->notifyUsers($th);
    }
}
