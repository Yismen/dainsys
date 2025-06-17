<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Password extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use Sluggable;

    /**
     * mass assignable
     */
    protected $fillable = ['slug', 'title', 'url', 'username', 'password'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ],
        ];
    }

    public function modelName()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * ========================================
     * Methods
     */

    /**
     * ==========================================
     * Scopes
     */
    public function ScopeForCurrentUser($query)
    {
        return $query->where('user_id', \Illuminate\Support\Facades\Auth::user()->id);
    }

    /**
     * ======================================
     * Accessors
     */

    /**
     * =======================================
     * Mutators
     */
}
