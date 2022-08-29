<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipient extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'title'];

    /**
     * The reports that belong to the Recipient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reports(): BelongsToMany
    {
        return $this->belongsToMany(Report::class);
    }
}
