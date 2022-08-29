<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Report extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'key', 'active', 'description'];

    /**
     * The recipients that belong to the Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function recipients(): BelongsToMany
    {
        return $this->belongsToMany(Recipient::class);
    }
}
