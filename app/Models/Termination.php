<?php

namespace App\Models;

use App\Events\EmployeeTerminated;
use App\Models\DainsysModel as Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Termination extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use SoftDeletes;

    protected $fillable = ['employee_id', 'termination_date', 'termination_type_id', 'termination_reason_id', 'can_be_rehired', 'comments', 'employee_data'];

    protected $casts = [
        'can_be_rehired' => 'boolean',
        'termination_date' => 'datetime',
        // 'employee_data' => 'json',
    ];

    protected static function booted()
    {
        static::created(function (Termination $termination): void {
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
        return $this->belongsTo(\App\Models\Employee::class);
    }

    public function terminationType()
    {
        return $this->belongsTo(\App\Models\TerminationType::class);
    }

    public function terminationReason()
    {
        return $this->belongsTo(\App\Models\TerminationReason::class);
    }

    // protected function terminationDate(): \Illuminate\Database\Eloquent\Casts\Attribute
    // {
    //     return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($date) {
    //         $date = Carbon::parse($date)->format('Y-m-d');
    //         return ['termination_date' => $date];
    //     });
    // }
    protected function employeeData(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn ($data) => json_decode((string) $data));
    }

    protected function casts(): array
    {
        return [
            'can_be_rehired' => 'boolean',
            'termination_date' => 'datetime',
        ];
    }
}
