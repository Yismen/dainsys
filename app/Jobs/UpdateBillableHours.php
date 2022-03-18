<?php

namespace App\Jobs;

use App\Performance;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateBillableHours implements ShouldQueue
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
    public array $options;

    public function __construct(array $options)
    {
        $this->options = $options;
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
            ->when(
                $this->options['revenue_type'],
                fn ($query) => $query->whereHas(
                    'campaign.revenueType',
                    fn ($q) => $q->where(
                        'name',
                        'like',
                        "{$this->options['revenue_type']}%"
                    )
                )
            )
            ->when(
                $this->options['months'],
                fn ($query) => $query->whereDate('date', '>=', now()->subMonths($this->options['months'])),
                fn ($query) => $query->whereDate('date', '>=', now()->subMonth()->startOfMonth())
            )
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
