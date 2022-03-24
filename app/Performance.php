<?php

namespace App;

use App\Traits\Trackable;
use App\DainsysModel as Model;
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
        'date',
        'employee_id',
        'supervisor_id',
        'login_time',
        'production_time',
        'transactions',
        'campaign_id',
        'revenue',
        // 'unique_id',
        // 'name',
        // 'sph_goal',
        // 'talk_time',
        // 'billable_hours',
        // 'contacts',
        // 'calls',
        // 'upsales',
        // 'cc_sales',
        // 'downtime_reason_id',
        // 'reported_by',
        // 'file_name'
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $employee = Employee::findOrfail($model->employee_id);

            $model->unique_id = $model->date . '-' . $model->employee_id . '-' . $model->campaign_id;
            $model->name = $employee->fullName;
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

    public function parseBillableHours()
    {
        switch ($this->campaign->revenueType->name) {
            case 'Sales Or Production':
                $this->billable_hours = $this->production_time;
                $this->save();
                break;
            case 'Login Time':
                $this->billable_hours = $this->login_time;
                $this->save();
                break;
            case 'Production Time':
                $this->billable_hours = $this->production_time;
                $this->save();
                break;
            case 'Talk Time':
                $this->billable_hours = $this->talk_time;
                $this->save();
                break;
            case 'Downtime':
                $this->billable_hours = 0;
                $this->save();
                break;

            default:
                // code...
                break;
        }
    }
}
