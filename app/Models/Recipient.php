<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipient extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'title'];

    /**
     * The reports that belong to the Recipient
     */
    public function reports(): BelongsToMany
    {
        return $this->belongsToMany(Report::class);
    }
}
