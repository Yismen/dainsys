<?php

namespace App\Jobs;

use App\Models\Performance;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Database\Eloquent\Collection;

class UpdateBillableHoursAndRevenue implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $performances;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Collection $performances)
    {
        $this->performances = $performances;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->performances->each(function (Performance $performance) {
            $performance->parseBillableHoursAndRevenue($performance->load('campaign.revenueType'));
        });
    }
}
