<?php

namespace App\Http\Requests;

use App\Enums\CustomerStatus;
use App\Enums\TaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TaskRequest extends FormRequest
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
            'title'             => ['required', 'string', 'max:255'],
            'start_date'        => ['required', 'date'],
            'end_date'          => ['required', 'date'],
            'status'            => ['required', 'integer', new Enum(TaskStatus::class)],
            'description'       => ['nullable', 'string'],
            'assigned_staff_id' => ['required', 'integer', 'exists:users,id'],
            'customer_ids'      => ['required', 'array', 'min:1'],
            'customer_ids.*'    => ['integer', 'exists:customers,id'],
            'status_customer'   => ['required', 'integer', new Enum(CustomerStatus::class)],
        ];
    }

    public function messages()
    {
        return [
            'title.required'             => __('validation.required', ['attribute' => __('view.task.title')]),
            'title.string'               => __('validation.string', ['attribute' => __('view.task.title')]),
            'title.max'                  => __('validation.max.string', ['attribute' => __('view.task.title')]),
            'start_date.required'        => __('validation.required', ['attribute' => __('view.task.start_date')]),
            'start_date.date'            => __('validation.date', ['attribute' => __('view.task.start_date')]),
            'end_date.required'          => __('validation.required', ['attribute' => __('view.task.end_date')]),
            'end_date.date'              => __('validation.date', ['attribute' => __('view.task.end_date')]),
            'assigned_staff_id.required' => __('validation.required', ['attribute' => __('view.task.assigned_staff')]),
            'assigned_staff_id.integer'  => __('validation.integer', ['attribute' => __('view.task.assigned_staff')]),
            'assigned_staff_id.exists'   => __('validation.exists', ['attribute' => __('view.task.assigned_staff')]),
            'customer_ids.required'      => __('validation.required', ['attribute' => __('view.task.customer')]),
            'customer_ids.array'         => __('validation.array', ['attribute' => __('view.task.customer')]),
            'customer_ids.integer'       => __('validation.integer', ['attribute' => __('view.task.customer')]),
            'customer_ids.exists'        => __('validation.exists', ['attribute' => __('view.task.customer')]),
        ];
    }
}
