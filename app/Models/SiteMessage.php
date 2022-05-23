<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class SiteMessage extends Model
{
    protected $fillable = ['customer_name', 'phone', 'email', 'contact_types_id', 'message', 'answer'];

    public function contacttypes()
    {
        return $this->belongsTo('App\Models\ContactType', 'contact_types_id');
    }
}
