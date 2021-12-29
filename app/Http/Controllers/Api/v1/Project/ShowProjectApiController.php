<?php

namespace App\Http\Controllers\Api\v1\Project;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Http\Requests\Api\v1\UpdateProjectRequest;
use App\Http\Resources\Api\v1\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ShowProjectApiController extends BaseApiController
{
    /**
     * Store a new resource
     *
     * @param Project $project
     * @return JsonResponse
     */
    public function __invoke(Project $project): JsonResponse
    {
        return $this->respondResource(new ProjectResource($project));
    }
}
