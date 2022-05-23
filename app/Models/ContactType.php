<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class ContactType extends Model
{
    protected $fillable = ['contact_type', 'description'];

    public function sitemessages()
    {
        return $this->hasMany('App\Models\SiteMessage', 'id');
    }
}
