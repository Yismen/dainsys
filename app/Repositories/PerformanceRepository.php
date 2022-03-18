<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Performance;
use Illuminate\Support\Facades\DB;

class PerformanceRepository
{
    protected $performance;

    public function __construct()
    {
        $this->performance = new Performance();
    }

    public function monthlyManyMonths(int $months = 12)
    {
        $start_of_month = Carbon::now()->subMonths($months)->startOfMonth();
        $dateClause = env('DB_CONNECTION') === 'sqlite' ?
            'strftime("%Y-%b", date)' :
            'DATE_FORMAT(date, "%Y-%b")';

        return $this->baseQeury()
            ->addSelect(DB::raw($dateClause . ' as month'))
            ->groupBy('month')
            ->whereDate('date', '>=', $start_of_month)
            ->whereDate('date', '<', now()->today())
            ->get();
    }

    public function weeklyManyWeeks(int $weeks = 12)
    {
        $start_of_week = Carbon::now()->subWeeks($weeks)->startOfWeek();
        $dateClause = env('DB_CONNECTION') === 'sqlite' ?
            'strftime("%Y-%w", date)' :
            'DATE_FORMAT(date, "%Y-%w")';

        return $this->baseQeury()
            ->addSelect(DB::raw($dateClause . ' as week'))
            ->groupBy('week')
            ->whereDate('date', '>=', $start_of_week)
            ->whereDate('date', '<', now()->today())
            ->get();
    }

    public function monthToDateData()
    {
        $date = Carbon::now()->subDay()->startOfMonth();

        return Performance::filter(request()->all())
            ->whereDate('date', '>=', $date)
            ->whereDate('date', '<', now());
    }

    public function weekToDate()
    {
        $date = Carbon::now()->subDay()->startOfWeek();

        return Performance::filter(request()->all())
            ->whereDate('date', '>=', $date)
            ->whereDate('date', '<', now()->subDay());
    }

    public function downtimes()
    {
        return $this->performance
            ->with('employee', 'campaign.project', 'downtimeReason')
            ->whereHas('downtimeReason')
            ->whereHas(
                'campaign',
                function ($query) {
                    return $query->with('project')
                        ->where('name', 'like', '%downtime%')
                        ->orWhereHas('project', function ($query) {
                            return $query->where('name', 'like', '%downtime%');
                        });
                }
            );
    }

    public function datatables()
    {
        return Performance::query()
            ->with(
                [
                    'campaign.project',
                    'supervisor',
                    'employee.termination',
                ]
            )
            ->select([
                'id',
                'date',
                'employee_id',
                'campaign_id',
                'supervisor_id',
                'login_time',
                'production_time',
                'transactions',
                'revenue',
            ]);
    }

    protected function baseQeury()
    {
        $performance_query = Performance::filter(request()->all())
            ->select(
                DB::raw('
                sum(revenue) as revenue,
                sum(login_time) as login_time,
                sum(revenue) / sum(login_time) as rph,
                sum(transactions) as sales,
                sum(production_time) as production_time,
                sum(transactions) / sum(production_time) as sph,
                sum(production_time) / sum(login_time) as efficiency,
                sum(sph_goal * production_time) / sum(production_time) as sph_goal
            ')
            )
            ->orderBy('date');

        return $performance_query;
    }
}
