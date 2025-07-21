<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateEmployeeRequest extends FormRequest
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
            'avatar_url' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'frist_name' => ['required', 'string'],
            'last_name'  => ['required', 'string'],
            'email'      => [
                'required',
                'email',
                Rule::unique('users', 'email')->whereNull('deleted_at'), ],
            'phone_number' => ['nullable'],
            'role_id'      => ['required', 'exists:roles,id'],
        ];
    }

    public function message(): array
    {
        return [
            'avatar_url.image'    => __('validation.image', ['attribute' => __('view.employee.avatar')]),
            'avatar_url.mimes'    => __('validation.mimetypes', ['attribute' => __('view.employee.avatar')]),
            'frist_name.required' => __('validation.required', ['attribute' => __('view.employee.frist_name')]),
            'frist_name.string'   => __('validation.string', ['attribute' => __('view.employee.frist_name')]),
            'last_name.required'  => __('validation.required', ['attribute' => __('view.employee.last_name')]),
            'last_name.string'    => __('validation.string', ['attribute' => __('view.employee.last_name')]),
            'email.required'      => __('validation.required', ['attribute' => __('view.employee.email')]),
            'email.email'         => __('validation.email', ['attribute' => __('view.employee.email')]),
            'role_id.exists'      => __('validation.exists', ['attribute' => __('view.employee.role')]),

        ];
    }
}
