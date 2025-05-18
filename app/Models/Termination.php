<?php

namespace App\Models;

use Carbon\Carbon;
use App\Events\EmployeeTerminated;
use App\Models\DainsysModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Termination extends Model
{
    use SoftDeletes;

    protected $fillable = ['employee_id', 'termination_date', 'termination_type_id', 'termination_reason_id', 'can_be_rehired', 'comments', 'employee_data'];

    protected $casts = [
        'can_be_rehired' => 'boolean',
        'termination_date' => 'datetime'
    ];

    protected static function booted()
    {
        static::created(function (Termination $termination) {
            $employee = $termination->employee->load([
                'site',
                'project',
                'position',
            ]);

            EmployeeTerminated::dispatch($employee, $termination);
        });
    }

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function terminationType()
    {
        return $this->belongsTo('App\Models\TerminationType');
    }

    public function terminationReason()
    {
        return $this->belongsTo('App\Models\TerminationReason');
    }

    public function setTerminationDateAttribute($date)
    {
        $date = Carbon::parse($date)->format('Y-m-d');
        $this->attributes['termination_date'] = $date;
    }

    public function getEmployeeDataAttribute($data)
    {
        return json_decode($data);
    }
}
