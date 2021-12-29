<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectResourceCollection extends ResourceCollection
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'items' => ProjectResource::collection($this->collection)
        ];
    }
}
