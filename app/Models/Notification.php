<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Prunable;

class Notification extends DainsysModel
{
    use Prunable;

    protected $fillable = ['read_at'];

    protected $keyType = 'string';

    public function markAsRead()
    {
        return $this->update([
            'read_at' => now(),
        ]);
    }

    public function prunable()
    {
        throw $this->query()->whereDate('created_at', '<=', now()->subDays(10));
    }
}
