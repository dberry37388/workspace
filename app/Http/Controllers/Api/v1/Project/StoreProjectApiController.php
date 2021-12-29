<?php

namespace App\Http\Controllers\Api\v1\Project;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Http\Requests\Api\v1\StoreProjectRequest;
use App\Http\Resources\Api\v1\ProjectResource;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class StoreProjectApiController extends BaseApiController
{
    /**
     * Store a new resource
     *
     * @param StoreProjectRequest $request
     * @return JsonResponse
     */
    public function __invoke(StoreProjectRequest $request): JsonResponse
    {
        $project = Project::create($request->validated());

        return $this->respondResource(new ProjectResource($project));
    }
}
