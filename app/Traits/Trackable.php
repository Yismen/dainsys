<?php

namespace App\Traits;

use App\Models\Track;

/**
 * summary
 */
trait Trackable
{
    public function changes()
    {
        return $this->morphMany(Track::class, 'trackable')->latest()->take(35);
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model): void {
            $model->recordChanges();
        });
    }

    protected function recordChanges()
    {
        $diff  = $this->getDiff();

        if (auth()->check() && empty($diff) === false) {
            $this->changes()->create($diff);
        }
    }

    protected function getDiff(): ?array
    {
        $after = $this->getDirty();
        $before = array_intersect_key(
            $this->fresh()->toArray(),
            $after
        );

        if (empty(array_diff_assoc($after, $before))) {
            return [];
        }

        return [
            'user_id' => auth()->user()->id ?? null,
            'before' => json_encode($before),
            'after' => json_encode($after),
        ];
    }
}
