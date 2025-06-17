<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Performance;
use Illuminate\Database\Eloquent\Builder;

class BillableHoursAndRevenueService
{
    public $dates;

    public function __construct(string $dates, public $revenue_type, public $campaign, public string $date_field = 'date')
    {
        $this->dates = preg_split('/[,|]+/', $dates, -1, PREG_SPLIT_NO_EMPTY);
    }

    public function query(): Builder
    {
        return Performance::query()
            ->with('campaign.revenueType')
            ->when(
                count($this->dates) === 1,
                function ($query): void {
                    $query->whereDate($this->date_field, Carbon::parse($this->dates[0]));
                },
                function ($query): void {
                    $query->whereBetween($this->date_field, [
                        Carbon::parse($this->dates[0])->startOfDay(),
                        Carbon::parse($this->dates[1])->endOfDay(),
                    ]);
                }
            )
            ->when(
                $this->revenue_type,
                function ($query): void {
                    $query->whereHas('campaign.revenueType', function ($query): void {
                        $query->where('name', 'like', "{$this->revenue_type}%");
                    });
                }
            )
            ->when(
                $this->campaign,
                fn($query) => $query->whereHas(
                    'campaign',
                    fn($q) => $q->where('name', 'like', "{$this->campaign}%")
                )
            )
        ;
    }
}
