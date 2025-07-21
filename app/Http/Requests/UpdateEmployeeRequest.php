<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateEmployeeRequest extends FormRequest
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
            'avatar_url'   => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'frist_name'   => ['required', 'string', 'max:255'],
            'last_name'    => ['required', 'string', 'max:255'],
            'email'        => ['required', 'email', Rule::unique('users')->ignore($this->id)],
            'phone_number' => ['nullable', 'string'],
            'address'      => ['nullable', 'string'],
            'role_id'      => ['required', 'exists:roles,id'],
            'password'     => ['nullable', Password::min(8)->uncompromised(), 'confirmed'],
        ];
    }

    public function attributes(): array
    {
        return [
            'new_password'     => __('view.employee.new_password'),
            'current_password' => __('view.employee.current_password'),
            'confirm_password' => __('view.employee.confirm_password'),
        ];
    }

    public function messages(): array
    {
        return [
            'password.confirmed' => __('passwords.confirmed', ['attribute' => __('view.employee.confirm_password')]),
        ];
    }
}
