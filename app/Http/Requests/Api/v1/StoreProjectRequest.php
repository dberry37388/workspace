<?php

namespace App\Http\Requests\Api\v1;

use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
{
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
        return [
            'name' => ['required', 'max:75'],
            'key' => ['required', 'max:10', Rule::unique('projects')],
            'description' => ['required', 'max:1000'],
            'is_private' => ['sometimes', 'boolean'],
            'properties' => ['sometimes', 'json'],
            'creator_id' => ['required', Rule::exists('users', 'id')],
            'owner_id' => ['required', Rule::exists('users', 'id')],
        ];
    }
}
