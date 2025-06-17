<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'department_id', 'payment_type_id', 'payment_frequency_id', 'salary'];

    protected $appends = [
        'name_and_department',
        'pay_per_hours',
        // 'departments_list',
        // 'payment_types_list',
        // 'payment_frequencies_list'
    ];

    protected $with = [
        'department',
        'payment_type'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function payment_type()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function payment_frequency()
    {
        return $this->belongsTo(PaymentFrequency::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * -----------------------------------------------------
     * Accessors
     */
    protected function nameAndDepartment(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn() => ucwords(trim(
            $this->department?->name . '-' . $this->name
        )));
    }

    protected function departmentsList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn() => Department::select('id', 'name')->orderBy('name')->get());
    }

    protected function paymentTypesList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn() => Cache::rememberForever('payment_types_list', fn() => PaymentType::select('id', 'name')->orderBy('name')->get()));
    }

    protected function payPerHours(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            $salary = $this->salary;
            if ($this->payment_type) {
                if (strtolower((string) $this->payment_type->name) === 'salary') {
                    return $salary / 23.83 / 8;
                }
            }
            return $salary;
        });
    }

    protected function paymentFrequenciesList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn() => PaymentFrequency::select('id', 'name')->orderBy('name')->get());
    }

    /**
     * ----------------------------------------------------------
     * Mutators
     */
    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: fn($name) => ['name' => ucwords(strtolower(trim((string) $name)))]);
    }
}
