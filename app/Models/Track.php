<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Track extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = ['user_id', 'before', 'after'];

    public function trackable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function modifications(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function () {
            $return = [];
            $before = json_decode($this->before, true);
            $after = json_decode($this->after, true);
            $diff = array_diff_assoc($after, $before);
            foreach ($diff as $key => $value) {
                $return[$key] = [
                    'old' => $before[$key],
                    'new' => $value,
                ];
            }

            return $return;
        });
    }

    public function hasModification(): bool
    {
        return empty($this->modifications) === false;
    }
}
