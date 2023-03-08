<?php

namespace App\Repositories;

use App\Models\Site;

class SiteRepository
{
    public $data;

    public function all()
    {
        $instance = new self();

        return $instance->query()->get();
    }

    public static function actives()
    {
        $instance = new self();

        return $instance->query()->whereHas('employees', function ($query) {
            $query->actives();
        })->get();
    }

    protected function query()
    {
        return Site::orderBy('name');
    }
}
