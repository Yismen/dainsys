<?php

namespace App\ModelFilters;

class LoginNameFilter extends BaseModelFilter
{
    public function recents($request)
    {
        return $this->whereHas('employee', function ($query) {
            $query->recents();
        });
    }
}
