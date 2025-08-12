<?php

namespace App\Http\Requests;

use App\Enums\CustomerServicePaymentMethod;
use App\Enums\CustomerStatus;
use App\Enums\CustomerStatusPayment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CustomerServiceRequest extends FormRequest
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
            'customer_id'    => ['required', 'integer', 'exists:customers,id'],
            'start_date'     => ['required', 'date'],
            'end_date'       => ['required', 'date'],
            'note'           => ['nullable', 'string'],
            'payment_method' => ['required', 'integer', new Enum(CustomerServicePaymentMethod::class)],
            'total_paid'     => ['required', 'numeric', 'min:0'],
            'status'         => ['required', new Enum(CustomerStatus::class)],
            'status_payment' => ['required', new Enum(CustomerStatusPayment::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'customer_id.required'    => __('validation.required', ['attribute' => __('view.customer_service.customer')]),
            'start_date.required'     => __('validation.required', ['attribute' => __('view.customer_service.start_date')]),
            'start_date.date'         => __('validation.date', ['attribute' => __('view.customer_service.start_date')]),
            'end_date.required'       => __('validation.required', ['attribute' => __('view.customer_service.end_date')]),
            'end_date.date'           => __('validation.date', ['attribute' => __('view.customer_service.end_date')]),
            'note.string'             => __('validation.string', ['attribute' => __('view.customer_service.note')]),
            'payment_method.required' => __('validation.required', ['attribute' => __('view.customer_service.payment_method')]),
            'payment_method.integer'  => __('validation.integer', ['attribute' => __('view.customer_service.payment_method')]),
            'total_paid.required'     => __('validation.required', ['attribute' => __('view.customer_service.total_paid')]),
            'total_paid.numeric'      => __('validation.numeric', ['attribute' => __('view.customer_service.total_paid')]),
            'status.required'         => __('validation.required', ['attribute' => __('view.customer_service.status')]),
            'status_payment.required' => __('validation.required', ['attribute' => __('view.customer_service.status')]),

        ];
    }
}
