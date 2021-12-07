<?php

namespace App\Http\Controllers\Api\Performances;

use App\Project;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;

/**
 * @group Performances
 */
class ProjectsController extends Controller
{
    /**
     * Performances Projects
     *
     * Collection of performances data for many months back.
     *
     * @response 200 {
     *      "data": [
     *          {
     *              "id": 1,
     *              "name": "Administracion",
     *              "client": null
     *          }
     *      ]
     *  }
     */
    public function __invoke()
    {
        $projects = Project::with('client')->get();

        return ProjectResource::collection($projects);
    }
}
