<?php

namespace App\Http\Controllers\Api\Performances;

use App\Project;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;

class ProjectsController extends Controller
{
    public function __invoke()
    {
        $projects = Project::with('client')->get();

        return ProjectResource::collection($projects);
    }
}
