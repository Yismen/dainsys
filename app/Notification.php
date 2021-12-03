<?php

namespace App;

class Notification extends DainsysModel
{
    protected $fillable = ['read_at'];

    protected $keyType = 'string';

    public function markAsRead()
    {
        return $this->update([
            'read_at' => now(),
        ]);
    }
}
