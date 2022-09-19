<?php

namespace App\Models;

use App\Traits\Trackable;
use App\Traits\PerformanceTrait;
use App\ModelFilters\FilterableTrait;
use App\Models\DainsysModel as Model;
use function Illuminate\Events\queueable;

use Illuminate\Database\Eloquent\Prunable;

class Performance extends Model
{
    use Trackable;
    use PerformanceTrait;
    use FilterableTrait;
    use Prunable;

    protected $fillable = [
        'away_time',
        'billable_hours',
        'break_time',
        'calls',
        'campaign_id',
        'cc_sales',
        'contacts',
        'date',
        'downtime_reason_id',
        'employee_id',
        'file_name',
        'login_time',
        'lunch_time',
        'name',
        'off_hook_time',
        'pending_dispo_time',
        'production_time',
        'reported_by',
        'revenue',
        'sph_goal',
        'supervisor_id',
        'talk_time',
        'training_time',
        'transactions',
        'unique_id',
        'upsales',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(queueable(function (self $model) {
            $employee = Employee::findOrfail($model->employee_id);

            $model->unique_id = $model->date . '-' . $model->employee_id . '-' . $model->campaign_id;
            $model->name = $employee->fullName;

            $model->load('campaign.revenueType');

            $model->parseBillableHoursAndRevenue($model);
        }));
    }

    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function prunable()
    {
        return static::where('created_at', '<=', now()->subYears(3)->startOfYear());
    }

    /**
     * Update billable hours attribute.
     *
     * @return void
     */
    public function parseBillableHoursAndRevenue(Performance $model)
    {
        switch (strtolower($model->campaign->revenueType->name)) {
            case 'sales or production':
                $model->billable_hours = $model->production_time;
                $model->revenue = $model->transactions * $model->campaign->revenue_rate;
                break;
            case 'login time':
                $model->billable_hours = $model->login_time;
                $model->revenue = $model->login_time * $model->campaign->revenue_rate;
                break;
            case 'production time':
                $model->billable_hours = $model->production_time;
                $model->revenue = $model->production_time * $model->campaign->revenue_rate;
                break;
            case 'talk time':
                $model->billable_hours = $model->talk_time;
                $model->revenue = $model->talk_time * $model->campaign->revenue_rate;
                break;
            case 'downtime':
                $model->billable_hours = 0;
                $model->revenue = 0;
                break;
            default:
                // code...
                break;
        }

        $this->withoutEvents(function () {
            $this->save();
        });
    }
}
