<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Tag extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    /**
     * List of fields that can be updated/from a form
     *
     * @fillable [array]
     */
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->belongsToMany(\App\Models\Article::class);
    }
}
