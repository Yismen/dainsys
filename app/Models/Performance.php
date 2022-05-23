<?php

namespace App\Models;

use App\Traits\Trackable;
use App\Models\DainsysModel as Model;
use App\Traits\PerformanceTrait;
use App\ModelFilters\FilterableTrait;
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

        static::saving(function (self $model) {
            $employee = Employee::findOrfail($model->employee_id);

            $model->unique_id = $model->date . '-' . $model->employee_id . '-' . $model->campaign_id;
            $model->name = $employee->fullName;

            $model->parseBillableHours();
        });
    }

    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function prunable()
    {
        return static::where('created_at', '<=', now()->subYears(2)->startOfMonth());
    }

    /**
     * Update billable hours attribute.
     *
     * @return void
     */
    public function parseBillableHours()
    {
        $this->load('campaign.revenueType');

        switch ($this->campaign->revenueType->name) {
            case 'Sales Or Production':
                $this->billable_hours = $this->production_time;
                break;
            case 'Login Time':
                $this->billable_hours = $this->login_time;
                break;
            case 'Production Time':
                $this->billable_hours = $this->production_time;
                break;
            case 'Talk Time':
                $this->billable_hours = $this->talk_time;
                break;
            case 'Downtime':
                $this->billable_hours = 0;
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
