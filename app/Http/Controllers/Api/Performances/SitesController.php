<?php

namespace App\Http\Controllers\Api\Performances;

use App\Site;
use App\Http\Controllers\Controller;
use App\Http\Resources\SiteResource;

/**
 * @group Performances
 */
class SitesController extends Controller
{
    /**
     * Performances Sites
     *
     * Collection of employees' sites.
     *
     * @response 200 {
     *      "data": [
     *          {
     *              "id": 1,
     *              "name": "Yismen Jorge",
     *          }
     *      ]
     *  }
     */
    public function __invoke()
    {
        $campaigns = Site::get();

        return SiteResource::collection($campaigns);
    }
}
