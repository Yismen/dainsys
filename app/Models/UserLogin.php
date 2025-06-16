<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLogin extends Model
{
    use SoftDeletes;
    use Prunable;

    protected $fillable = ['user_id', 'logged_in_at', 'logged_out_at'];

    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function prunable()
    {
        return static::whereDate('created_at', '<=', now()->subMonths(3))->whereNotNull('logged_out_at');
    }
    protected function casts(): array
    {
        return [
            'logged_in_at' => 'datetime',
            'logged_out_at' => 'datetime',
        ];
    }
}
