<?php

namespace App\Http\Requests;

use App\Enums\ServiceStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class ServiceRequest extends FormRequest
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
            'price'       => ['nullable', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'status'      => ['required', 'integer', new Enum(ServiceStatus::class)],
            'category_id' => ['required', 'integer', 'exists:service_categories,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => __('validation.required', ['attribute' => __('view.service.name')]),
            'name.string'          => __('validation.string', ['attribute' => __('view.service.name')]),
            'name.max'             => __('validation.max.string', ['attribute' => __('view.service.name')]),
            'price.min'            => __('validation.min.numeric', ['attribute' => __('view.service.price')]),
            'price.numeric'        => __('validation.numeric', ['attribute' => __('view.service.price')]),
            'description.string'   => __('validation.string', ['attribute' => __('view.service.description')]),
            'status.reuqired'      => __('validation.required', ['attribute' => __('view.service.status')]),
            'status.integer'       => __('validation.integer', ['attribute' => __('view.service.status')]),
            'category_id.required' => __('validation.required', ['attribute' => __('view.service.category')]),
            'category_id.integer'  => __('validation.integer', ['attribute' => __('view.service.category')]),
            'category_id.exists'   => __('validation.exists', ['attribute' => __('view.service.category')]),
        ];
    }
}
