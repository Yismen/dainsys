<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Ars extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'ars';
    
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];


    protected $fillable = ['name'];

    // Relationships =============================================
    public function employees()
    {
        return $this->hasMany('App\Employee', 'ars_id');
    }
    
    // Methods ===================================================
    
    // Scopes ====================================================
    
    // Accessors =================================================
    
    // Mutators ==================================================
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = trim(ucwords($name));
    }
    
}