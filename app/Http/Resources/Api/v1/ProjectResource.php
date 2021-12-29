<?php

namespace App\Http\Resources\Api\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'name' => $this->name,
            'key' => $this->key,
            'description' => $this->description,
            'is_private' => $this->is_private,
            'properties' => $this->properties,
            'creator_id' => $this->creator_id,
            'owner_id' => $this->owner_id,
            'updated_at' => $this->updated_at,
        ];
    }
}
