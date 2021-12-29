<?php

namespace App\Services\Traits;

trait HandlesPatchRequests
{
    protected function modifyRulesForPatchRequest(array $rules): array
    {
        $sentWithRequest = $this->request->all();

        foreach ($rules as $field => $rule) {
            if (!$this->request->has($field)) {
                unset($rules[$field]);
            }
        }

        return $rules;
    }
}
