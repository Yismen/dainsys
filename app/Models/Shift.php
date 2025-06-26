<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Shift extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use Sluggable;

    protected $fillable = ['employee_id', 'start_at', 'end_at', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    /**
     * Return the sluggable configuration array for this model.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'employee.fullName',
                'onUpdate' => true,
            ],
        ];
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    protected function startAt(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn ($start_at) => Carbon::parse($start_at)->format('H:i'));
    }

    protected function endAt(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn ($start_at) => Carbon::parse($start_at)->format('H:i'));
    }

    protected function employeesList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => Employee::actives()
            ->orderBy('first_name')
            ->orderBy('second_first_name')
            ->orderBy('last_name')
            ->get());
    }
}
