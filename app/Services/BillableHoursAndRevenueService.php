<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Performance;
use Illuminate\Database\Eloquent\Builder;

class BillableHoursAndRevenueService
{
    public $dates;

    public $revenue_type;

    public $campaign;

    public function __construct(string $dates, $revenue_type, $campaign)
    {
        $this->dates = preg_split('/[,|]+/', $dates, -1, PREG_SPLIT_NO_EMPTY);

        $this->revenue_type = $revenue_type;
        $this->campaign = $campaign;
    }

    public function query(): Builder
    {
        return Performance::query()
            ->with('campaign.revenueType')
            ->when(
                count($this->dates) === 1,
                function ($query) {
                    $query->whereDate('date', Carbon::parse($this->dates[0]));
                },
                function ($query) {
                    $query->whereBetween('date', [
                        Carbon::parse($this->dates[0])->startOfDay(),
                        Carbon::parse($this->dates[1])->endOfDay(),
                    ]);
                }
            )
            ->when(
                $this->revenue_type,
                function ($query) {
                    $query->whereHas('campaign.revenueType', function ($query) {
                        $query->where('name', 'like', "{$this->revenue_type}%");
                    });
                }
            )
            ->when(
                $this->campaign,
                fn ($query) => $query->whereHas(
                    'campaign',
                    fn ($q) => $q->where('name', 'like', "{$this->campaign}%")
                )
            )
        ;
    }
}
