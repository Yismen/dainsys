<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class TerminationReason extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    /**
     * mass assignable
     */
    protected $fillable = ['reason', 'description'];

    protected function reason(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($reason) {
            return $this->attributes['reason'] = ucwords(trim($reason));

            return ['reason' => ucwords(trim($reason))];
        });
    }
}
