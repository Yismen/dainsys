<?php

namespace App\Jobs;

use App\Models\Performance;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateBillableHoursAndRevenue implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $revenue_type;
    public $campaign;
    public int $days;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($days = 0, $revenue_type = null, $campaign = null)
    {
        $this->days = (int)$days;
        $this->revenue_type = $revenue_type;
        $this->campaign = $campaign;
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
                $this->revenue_type,
                fn ($query) => $query->whereHas(
                    'campaign.revenueType',
                    fn ($q) => $q->where('name', 'like', "{$this->revenue_type}%")
                )
            )
            ->when(
                $this->campaign,
                fn ($query) => $query->whereHas(
                    'campaign',
                    fn ($q) => $q->where('name', 'like', "{$this->campaign}%")
                )
            )
            ->when(
                $this->days > 0,
                fn ($query) => $query->whereDate('date', '>=', now()->subDays($this->days)),
                fn ($query) => $query->whereDate('date', '>=', now()->subDay())
            )
            ->get();

        $performances->each(fn (Performance $q) => $q->parseBillableHoursAndRevenue());
    }
}
