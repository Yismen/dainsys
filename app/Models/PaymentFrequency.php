<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PaymentFrequency extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    use Sluggable;

    protected $fillable = ['name', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ],
        ];
    }
}
