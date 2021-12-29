<?php

namespace App\Services\Traits;

trait QueryBuilderBindableTrait
{
    public function resolveRouteBinding($value, $field = null)
    {
        return (new $this->queryClass)
            ->where($field ?? $this->getRouteKeyName(), $value)
            ->first();
    }
}
