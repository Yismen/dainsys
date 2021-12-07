<?php

namespace App;

use App\DainsysModel as Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PaymentType extends Model
{
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
