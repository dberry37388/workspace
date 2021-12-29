<?php

namespace App\Http\Controllers\Api\v1\Project;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Http\Requests\Api\v1\UpdateProjectRequest;
use App\Http\Resources\Api\v1\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class UpdateProjectApiController extends BaseApiController
{
    /**
     * Store a new resource
     *
     * @param UpdateProjectRequest $request
     * @param Project $project
     * @return JsonResponse
     */
    public function __invoke(UpdateProjectRequest $request, Project $project): JsonResponse
    {
        $project->update($request->validated());

        return $this->respondResource(new ProjectResource($project));
    }
}
