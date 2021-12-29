<?php

namespace App\Http\Controllers\Api\v1\Project;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class DeleteProjectApiController extends BaseApiController
{
    /**
     * Store a new resource
     *
     * @param Project $project
     * @return JsonResponse
     */
    public function __invoke(Project $project): JsonResponse
    {
        $project->delete();

        return $this->respondDeleted();
    }
}
