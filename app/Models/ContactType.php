<?php

namespace App\Models;

use App\Models\DainsysModel as Model;

class ContactType extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    protected $fillable = ['contact_type', 'description'];

    public function sitemessages()
    {
        return $this->hasMany(\App\Models\SiteMessage::class, 'id');
    }
}
