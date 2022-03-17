<?php

namespace App\Jobs;

use App\Performance;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateBillableHours
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $performances = Performance::query()
            ->with('campaign.revenueType')
            ->get();

        $performances->each(function ($query) {
            switch ($query->campaign->revenueType->name) {
                case 'Sales Or Production':
                    $query->billable_hours = $query->production_time;
                    $query->save();
                    break;
                case 'Login Time':
                    $query->billable_hours = $query->login_time;
                    $query->save();
                    break;
                case 'Production Time':
                    $query->billable_hours = $query->production_time;
                    $query->save();
                    break;
                case 'Talk Time':
                    $query->billable_hours = $query->talk_time;
                    $query->save();
                    break;

                default:
                // code...
                break;
            }
        });
    }
}
