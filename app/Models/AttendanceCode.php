<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class AttendanceCode extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['name', 'color', 'absence'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'code_id');
    }

    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn($name) => ucwords(trim((string) $name)));
    }
}
