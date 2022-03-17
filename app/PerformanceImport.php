<?php

namespace App;

use App\Traits\Trackable;
use App\DainsysModel as Model;
use App\Traits\PerformanceTrait;

class PerformanceImport extends Model
{
    use Trackable;
    use PerformanceTrait;

    protected $table = 'performances';

    protected $fillable = [
        'unique_id',
        'date',
        'employee_id',
        'name',
        'campaign_id',
        'supervisor_id',
        'sph_goal',
        'login_time',
        'production_time',
        'talk_time',
        'break_time',
        'lunch_time',
        'training_time',
        'away_time',
        'off_hook_time',
        'pending_dispo_time',
        'billable_hours',
        'contacts',
        'calls',
        'transactions',
        'upsales',
        'cc_sales',
        'revenue',
        'downtime_reason_id',
        'reported_by',
        'file_name',
    ];

    public static function removeExisting($unique_id)
    {
        $instance = new self();

        $instance->whereUniqueId($unique_id)
            ->delete();

        return $instance;
    }
}
