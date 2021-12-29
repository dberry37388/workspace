<?php

namespace App\Http\Controllers\Api\v1\Project;

use App\Http\Controllers\Api\v1\BaseApiController;
use App\Http\Requests\Api\v1\StoreProjectRequest;
use App\Http\Resources\Api\v1\ProjectResource;
use App\Http\Resources\Api\v1\ProjectResourceCollection;
use App\Queries\v1\ProjectQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ListProjectApiController extends BaseApiController
{
    /**
     * Store a new resource
     *
     * @param ProjectQuery $query
     * @return JsonResponse
     */
    public function __invoke(ProjectQuery $query): JsonResponse
    {
        return $this->respondResource(new ProjectResourceCollection($query->get()));
    }
}
