<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAppointmentRequest extends FormRequest
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
            'title'       => ['required', 'string', 'max:255'],
            'date'        => ['required', 'date'],
            'start_time'  => ['required'],
            'end_time'    => ['required'],
            'customer_id' => ['required', 'integer', 'exists:customers,id'],
        ];
    }

    public function messages()
    {
        return [
            'title.required'       => __('validation.required', ['attribute' => __('view.customer_appointment.title')]),
            'title.string'         => __('validation.string', ['attribute' => __('view.customer_appointment.title')]),
            'title.max'            => __('validation.max.string', ['attribute' => __('view.customer_appointment.title')]),
            'date.required'        => __('validation.required', ['attribute' => __('view.customer_appointment.date')]),
            'date.date'            => __('validation.required', ['attribute' => __('view.customer_appointment.date')]),
            'start_time.required'  => __('validation.required', ['attribute' => __('view.customer_appointment.start_time')]),
            'end_time.required'    => __('validation.required', ['attribute' => __('view.customer_appointment.end_time')]),
            'customer_id.required' => __('validation.required', ['attribute' => __('view.customer_appointment.customer')]),
        ];
    }
}
