<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Profile extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['gender', 'bio', 'photo', 'phone', 'education', 'skills', 'work', 'location'];

    /**
     * ==========================================
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ======================================
     * Accessors
     */
    protected function skillsArray(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn() => explode(',', $this->skills));
    }

    protected function skillsObject(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            $returned = [];
            $skills = explode(',', $this->skills);
            foreach ($skills as $skill) {
                array_push($returned, ucwords(trim($skill)));
            }
            return (object) $returned;
        });
    }

    /**
     * ========================================
     * Methods
     */

    /**
     * ==========================================
     * Scopes
     */
    public function scopeNotCurrent($query)
    {
        return $query->where('id', '<>', $this->id);
    }

    /**
     * =======================================
     * Mutators
     */
}
