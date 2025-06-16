<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Carbon\Carbon;

class Holiday extends Model
{
    protected $fillable = ['date', 'name', 'description'];
    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function ($name) {
            return ucwords($name);
        }, set: function ($name) {
            return $this->attributes['name'] = ucwords($name);
            return ['name' => ucwords($name)];
        });
    }
    protected function description(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function ($description) {
            return ucfirst($description);
        }, set: function ($description) {
            return $this->attributes['description'] = ucfirst($description);
            return ['description' => ucfirst($description)];
        });
    }

    public function scopeSinceManyMonthsAgo($query, $months = 6)
    {
        $date = Carbon::now()->subMonths($months)->startOfMonth();

        return $query->whereDate('date', '>=', $date);
    }
    protected function casts(): array
    {
        return [
            'date' => 'datetime',
        ];
    }
}
