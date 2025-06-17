<?php

namespace App\Models;

use App\ModelFilters\FilterableTrait;
use App\Models\DainsysModel as Model;

class OvernightHour extends Model
{
    use FilterableTrait;
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['date', 'employee_id', 'hours', 'unique_id'];

    protected $casts = [
        'date' => 'datetime',
        'hours' => 'float',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model): void {
            if (! $model->unique_id) {
                $model->unique_id = implode('-', [$model->date->format('Y-m-d'), $model->employee_id, 'punch']);
            }
        });

        static::updating(function ($model): void {
            if (! $model->unique_id) {
                $model->unique_id = implode('-', [$model->date->format('Y-m-d'), $model->employee_id, 'punch']);
            }
        });
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * During import remove any data previously captured
     *
     * @param date text $date
     * @param  int  $employee_id
     * @return void
     */
    public function removeDuplicated($unique_id)
    {
        $duplicateds = $this->where('unique_id', $unique_id)
            ->get();

        foreach ($duplicateds as $duplicated) {
            $duplicated->delete();
        }
    }
}
