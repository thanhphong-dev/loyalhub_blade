<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => __('validation.required', ['attribute' => __('view.role.name')]),
            'name.string'          => __('validation.string', ['attribute' => __('view.role.name')]),
            'name.max'             => __('validation.max.string', ['attribute' => __('view.role.name')]),
            'description.required' => __('validation.required', ['attribute' => __('view.role.description')]),
            'description.string'   => __('validation.string', ['attribute' => __('view.role.description')]),
        ];
    }
}
