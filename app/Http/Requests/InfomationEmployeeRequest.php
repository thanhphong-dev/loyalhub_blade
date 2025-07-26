<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class InfomationEmployeeRequest extends FormRequest
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
            'avatar_url'            => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'frist_name'            => ['required', 'string', 'max:255'],
            'last_name'             => ['required', 'string', 'max:255'],
            'email'                 => ['required', 'email', Rule::unique('users', 'email')->ignore($this->route('employee')->id)],
            'phone_number'          => ['nullable', 'string'],
            'address'               => ['nullable', 'string'],
            'role_id'               => ['required', 'exists:roles,id'],
            'password'              => ['nullable', Password::min(8)->uncompromised(), 'confirmed'],
            'password_confirmation' => ['same:password'],
            'current_password'      => ['required_with:password', 'nullable', 'current_password'],
        ];
    }

    public function attributes(): array
    {
        return [
            'password'              => __('view.employee.new_password'),
            'password_confirmation' => __('view.employee.password_confirmation'),
            'frist_name'            => __('view.employee.frist_name'),
            'last_name'             => __('view.employee.last_name'),
            'address'               => __('view.employee.address'),
            'avatar_url'            => __('view.employee.avatar'),
            'email'                 => __('view.employee.email'),
            'role_id'               => __('view.employee.role'),
            'phone_number'          => __('view.employee.phone_number'),
            'current_password'      => __('view.employee.current_password'),
        ];
    }

    public function messages(): array
    {
        return [
            'password.confirmed'  => __('passwords.confirmed', ['attribute' => __('view.employee.password_confirmation')]),
            'avatar_url.image'    => __('validation.image', ['attribute' => __('view.employee.avatar')]),
            'avatar_url.mimes'    => __('validation.mimetypes', ['attribute' => __('view.employee.avatar')]),
            'frist_name.required' => __('validation.required', ['attribute' => __('view.employee.frist_name')]),
            'frist_name.string'   => __('validation.string', ['attribute' => __('view.employee.frist_name')]),
            'last_name.required'  => __('validation.required', ['attribute' => __('view.employee.last_name')]),
            'last_name.string'    => __('validation.string', ['attribute' => __('view.employee.last_name')]),
            'email.required'      => __('validation.required', ['attribute' => __('view.employee.email')]),
            'email.email'         => __('validation.email', ['attribute' => __('view.employee.email')]),
            'role_id.exists'      => __('validation.exists', ['attribute' => __('view.employee.role')]),
            'current_password'    => __('validation.current_password', ['attribute' => __('view.employee.current_password')]),
        ];
    }
}
