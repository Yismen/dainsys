<?php

namespace App;

use App\DainsysModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;

class EscalClient extends Model
{
    use Sluggable;
    /**
     * mass assignable
     */
    protected $fillable = ['name'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name'],
                'onUpdate' => true
            ]
        ];
    }

    /**
     * ==========================================
     * Relationships
     */
    public function escal_records()
    {
        return $this->hasMany(EscalRecord::class);
    }

    public function getNameAttribute($name)
    {
        return ucwords($name);
    }

    /**
     * =======================================
     * Mutators
     */
    public function setNameAttribute($name)
    {
        return $this->attributes['name'] = ucwords($name);
    }
}
