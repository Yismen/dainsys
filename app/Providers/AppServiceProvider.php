<?php

namespace App\Providers;

use App\Models\User;
use App\Notifications\QueueFailingNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

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

        Queue::failing(function (JobFailed $jobFailed): void {
            $users = User::whereHas('roles', function ($query): void {
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
