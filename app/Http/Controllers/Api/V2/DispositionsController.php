<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Resources\DispositionResource;
use App\Models\RingCentral\Disposition;

/**
 * @group Performances
 */
class DispositionsController extends Controller
{
    /**
     * Performances Dispositions
     *
     * Collection of dispositions information
     *
     * @response 200 {
     *      "data": [
     *          {
     *              "name",
     *              "contacts",
     *              "sales",
     *              "upsales",
     *              "cc_sales",
     *          }
     *      ]
     *  }
     */
    public function __invoke()
    {
        $campaigns = Disposition::query()
            ->orderBy('name')
            ->get();

        return DispositionResource::collection($campaigns);
    }
}
