<?php

namespace App\Queries\v1;

use App\Models\Project;
use Spatie\QueryBuilder\QueryBuilder;

class ProjectQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Project::query());

        $this->allowedFilters(['id', 'key', 'creator_id', 'owner_id', 'is_private', 'name'])
            ->allowedIncludes(['creator', 'owner'])
            ->defaultSort('order_index')
            ->allowedSorts('name', 'key', 'order_index');
    }
}
