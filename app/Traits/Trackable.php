<?php

namespace App\Traits;

use App\Models\Track;

/**
 * summary
 */
trait Trackable
{
    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            $model->recordChanges();
        });
    }

    protected function recordChanges()
    {
        if (auth()->check()) {
            $this->changes()->create($this->getDiff());
        }
    }

    protected function getDiff()
    {
        $after = $this->getDirty();

        return [
            'user_id' => auth()->user()->id,
            'before' => json_encode(array_intersect_key(optional($this->fresh())->toArray() ?? $this->toArray(), $after)),
            'after' => json_encode($after),
        ];
    }

    public function changes()
    {
        return $this->morphMany(Track::class, 'trackable')->latest()->take(35);
    }
}
