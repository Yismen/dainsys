<?php

namespace App\Models;

use App\Models\DainsysModel as Model;
use Illuminate\Database\Eloquent\Builder;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['user_id', 'name', 'phone', 'works_at', 'position', 'secondary_phone', 'email'];

    /**
     * A contact belongs to a user
     *
     * @return relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Accesor: morph the attribute before it is retrieved.
     *
     * @param string $work
     *
     * @return mutated
     */
    protected function worksAt(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function ($work) {
            return ucwords(trim($work));
        });
    }

    /**
     * mutate the position attribute after it is retrieved
     *
     * @param string $position
     *
     * @return mutated
     */
    protected function position(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(get: function ($position) {
            return ucwords(trim($position));
        });
    }

    /**
     * Mutate the name attribute before it is inserted.
     *
     * @param string $name
     *
     * @return mutated attribute
     */
    protected function name(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($name) {
            return ['name' => ucwords(trim($name))];
        });
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        /**
         * Hide contacts not owed by current user
         */
        static::addGlobalScope('user', function (Builder $builder): void {
            if (auth()->check()) {
                $builder->whereUserId(auth()->user()->id);
            }
        });
    }
}
