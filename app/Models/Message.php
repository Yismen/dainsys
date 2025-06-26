<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Message extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['sender_id', 'recipient_id', 'title', 'body', 'read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function userList(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: fn () => User::orderBy('name')->pluck('name', 'id'));
    }
}
