<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'default', 'description'];

    /**
     * The employees that belong to the Process
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class)->withTimestamps();
    }

    /**
     * Get all of the steps for the Process
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function steps(): HasMany
    {
        return $this->hasMany(Step::class);
    }
}
