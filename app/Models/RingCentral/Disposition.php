<?php

namespace App\Models\RingCentral;

use App\Models\DainsysModel as Model;

class Disposition extends Model
{
    protected $fillable = ['name', 'contacts', 'sales', 'upsales', 'cc_sales'];

    public function getConnectionName()
    {
        return app()->isProduction() ? 'poliscript' : config('database.default') ;
    }

    public function getTable()
    {
        return 'ecco_dispositions';
    }
}
