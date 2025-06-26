<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Carbon\Carbon;

class Attendance extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['employee_id', 'user_id', 'code_id', 'comments', 'date'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reporter()
    {
        return $this->user();
    }

    public function attendance_code()
    {
        return $this->belongsTo(AttendanceCode::class, 'code_id');
    }

    protected function date(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn ($date) => Carbon::parse($date)->format('Y-m-d'));
    }

    protected function codesList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => AttendanceCode::all());
    }

    protected function employeesList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => auth()->user()->supervisors->load(['employees' => fn ($query) => $query->actives()->sorted(),
        ])->map(fn ($item, $key) => $item->employees)->collapse());
    }

    protected function casts(): array
    {
        return [
            'date' => 'datetime',
        ];
    }
}
