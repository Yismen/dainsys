<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Campaign extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['name', 'project_id', 'source_id', 'revenue_type_id', 'sph_goal', 'revenue_rate'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function revenueType()
    {
        return $this->belongsTo(RevenueType::class);
    }

    public function performances()
    {
        return $this->hasMany(Performance::class);
    }

    protected function projectList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => Project::orderBy('name')->get());
    }

    protected function sourceList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => Source::orderBy('name')->get());
    }

    protected function revenueTypeList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => RevenueType::orderBy('name')->get());
    }
}
