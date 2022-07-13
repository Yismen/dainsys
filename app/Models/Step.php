<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'description', 'process_id', 'order'];

    public function process()
    {
        return $this->belongsTo(Process::class);
    }
}
