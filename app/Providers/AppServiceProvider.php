<?php

namespace App\Providers;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;
use App\Notifications\UserAppNotification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Model::preventLazyLoading(!$this->app->isProduction());

        Queue::failing(function (JobFailed $event) {
            $users = User::role(['admin'])->get();

            foreach ($users as $user) {
                $job = class_basename($event->job);

                $user->notify(new UserAppNotification(
                    "Job {$job} Failed!",
                    "Event {$job} failed with exception {$event->exception}"
                ));
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Local providers here.
         */
        if ($this->app->environment() == 'local') {
            // $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }
}
