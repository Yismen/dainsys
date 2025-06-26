<?php

namespace App\Rules;

use Illuminate\Database\Eloquent\Model;

class UniqueForUserRule
{
    /**
     * Construct
     *
     * @param  int  $id
     * @param  string  $field
     */
    public function __construct(Model $model, $id, $field) {}
}
