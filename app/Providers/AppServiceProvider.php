<?php

namespace App\Providers;

use App\Models\User;
use Laravel\Passport\Passport;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Notifications\UserAppNotification;
use App\Notifications\QueueFailingNotification;

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

        Model::preventLazyLoading(! $this->app->isProduction());

        Queue::failing(function (JobFailed $jobFailed) {
            $users = User::whereHas('roles', function ($query) {
                $query->where('name', 'like', 'admin');
            })
                ->get()
                ->each
                ->notify(new QueueFailingNotification($jobFailed));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {}
}
