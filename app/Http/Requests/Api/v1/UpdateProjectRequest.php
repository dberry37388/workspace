<?php

namespace App\Http\Requests\Api\v1;

use App\Services\Traits\HandlesPatchRequests;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    use HandlesPatchRequests;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['sometimes', 'required', 'max:75'],
            'key' => ['sometimes', 'required', 'max:10', Rule::unique('projects')],
            'description' => ['sometimes', 'required', 'max:1000'],
            'is_private' => ['sometimes', 'boolean'],
            'properties' => ['sometimes', 'json'],
            'creator_id' => ['sometimes|required', Rule::exists('users', 'id')],
            'owner_id' => ['sometimes', 'required', Rule::exists('users', 'id')],
        ];

        if (strtolower($this->getMethod()) === 'patch') {
            $rules = $this->modifyRulesForPatchRequest($rules);
        }

        return $rules;
    }
}
