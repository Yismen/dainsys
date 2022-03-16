<?php

namespace App\Http\Controllers\Api\V2;

use App\Campaign;
use App\Http\Controllers\Controller;
use App\Http\Resources\CampaignResource;

/**
 * @group Performances
 */
class CampaignsController extends Controller
{
    /**
     * Performances Campaigns
     *
     * Collection of camaigns information
     *
     * @response 200 {
     *      "data": [
     *          {
     *              "id": 1,
     *              "name": "asdfasfas-downtimes",
     *              "project_id": 1,
     *              "source_id": 5,
     *              "revenue_type_id": 1,
     *              "sph_goal": 24,
     *              "rate": 40
     *          }
     *      ]
     *  }
     */
    public function __invoke()
    {
        $campaigns = Campaign::query()
            ->orderBy('name')
            ->with([
                'project',
                'source',
                'revenueType',
            ])
            ->get();

        return CampaignResource::collection($campaigns);
    }
}
