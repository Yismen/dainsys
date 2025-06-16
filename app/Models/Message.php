<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Message extends Model
{
    protected $fillable = ['sender_id', 'recipient_id', 'title', 'body', 'read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function userList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            return User::orderBy('name')->pluck('name', 'id');
        });
    }
}
