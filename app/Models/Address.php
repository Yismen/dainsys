<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class Address extends Model
{
    protected $fillable = ['employee_id', 'sector', 'street_address', 'city'];

    protected $table = 'addresses';

    /**
     * -------------------------------------------------------------------
     * Relatioships
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    protected function sector(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($sector) {
            return $this->attributes['sector'] = ucwords(trim($sector));
            return ['sector' => ucwords(trim($sector))];
        });
    }

    protected function streetAddress(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($street_address) {
            return $this->attributes['street_address'] = ucwords(trim($street_address));
            return ['street_address' => ucwords(trim($street_address))];
        });
    }

    protected function city(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(set: function ($city) {
            return $this->attributes['city'] = ucwords(trim($city));
            return ['city' => ucwords(trim($city))];
        });
    }
}
