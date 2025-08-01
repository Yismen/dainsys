<?php

namespace App\Models;

use App\ModelFilters\FilterableTrait;
use App\Models\DainsysModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;

class LoginName extends Model
{
    use FilterableTrait;
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use Sluggable;

    protected $fillable = ['login', 'employee_id'];

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

    /**
     * -------------------------------------------------------
     * Relatioships.
     */
    public function employee()
    {
        return $this->belongsTo(\App\Models\Employee::class);
    }

    /**
     * --------------------------------------------
     * Accessors.
     */
    protected function employeesList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => Employee::select('id', 'first_name', 'second_first_name', 'last_name', 'second_last_name')
            ->orderBy('first_name')
            ->orderBy('second_first_name')
            ->orderBy('last_name')
            ->orderBy('second_last_name')
            ->get()
            ->pluck('fullName', 'id'));
    }
}
