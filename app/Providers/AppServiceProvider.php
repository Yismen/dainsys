<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Database\Eloquent\Model;
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
            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'like', 'admin');
            })->get();

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
