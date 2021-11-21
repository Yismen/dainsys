<?php

namespace App\Http\Controllers\Api\Performances;

use App\Site;
use App\Http\Controllers\Controller;
use App\Http\Resources\SiteResource;

class SitesController extends Controller
{
    public function __invoke()
    {
        $campaigns = Site::get();

        return SiteResource::collection($campaigns);
    }
}
