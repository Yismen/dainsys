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

            $model->parseBillableHoursAndRevenue();
        }));
    }

    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function prunable()
    {
        return static::where('created_at', '<=', now()->subYears(3)->startOfMonth());
    }

    /**
     * Update billable hours attribute.
     *
     * @return void
     */
    public function parseBillableHoursAndRevenue()
    {
        $this->load('campaign.revenueType');

        switch (strtolower($this->campaign->revenueType->name)) {
            case 'sales or production':
                $this->billable_hours = $this->production_time;
                $this->revenue = $this->transactions * $this->campaign->revenue_rate;
                break;
            case 'login time':
                $this->billable_hours = $this->login_time;
                $this->revenue = $this->login_time * $this->campaign->revenue_rate;
                break;
            case 'production time':
                $this->billable_hours = $this->production_time;
                $this->revenue = $this->production_time * $this->campaign->revenue_rate;
                break;
            case 'talk time':
                $this->billable_hours = $this->talk_time;
                $this->revenue = $this->talk_time * $this->campaign->revenue_rate;
                break;
            case 'downtime':
                $this->billable_hours = 0;
                $this->revenue = 0;
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
