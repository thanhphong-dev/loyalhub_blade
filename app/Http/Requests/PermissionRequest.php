<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'slug'        => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => __('validation.required', ['attribute' => __('view.permission.name')]),
            'name.string'        => __('validation.string', ['attribute' => __('view.permission.name')]),
            'name.max'           => __('validation.max.string', ['attribute' => __('view.permission.name')]),
            'slug.required'      => __('validation.required', ['attribute' => __('view.permission.slug')]),
            'slug.string'        => __('validation.string', ['attribute' => __('view.permission.slug')]),
            'description.string' => __('validation.max.string', ['attribute' => __('view.permission.description')]),
        ];
    }
}
