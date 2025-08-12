<?php

namespace App\Http\Requests;

use App\Enums\CustomerSource;
use App\Enums\CustomerStatus;
use App\Enums\CustomerStatusPayment;
use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UpdateCustomerServiceRequest extends FormRequest
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
            'logo'     => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2028'],
            'fullname' => ['string', 'required', 'max:255'],
            'email'    => [
                'nullable',
                'email',
                Rule::unique('customers', 'email')->ignore($this->input('customer_id')),
            ],

            'phone_number'   => ['nullable', new PhoneNumberRule],
            'website'        => ['nullable', 'string', 'max:255'],
            'address'        => ['nullable', 'string', 'max:255'],
            'service_id'     => ['required', 'integer', 'exists:services,id'],
            'source'         => ['required', new Enum(CustomerSource::class)],
            'status'         => ['required', new Enum(CustomerStatus::class)],
            'file'           => ['nullable', 'file', 'mimes:doc,docx,pdf,xls,xlsx', 'max:2048'],
            'customer_id'    => ['required', 'integer', 'exists:customers,id'],
            'start_date'     => ['required', 'date'],
            'end_date'       => ['required', 'date'],
            'status_payment' => ['required', new Enum(CustomerStatusPayment::class)],
            'total_paid'     => ['required', 'numeric', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'logo.image'                 => __('validation.image', ['attribute' => __('view.customer.logo')]),
            'logo.mimes'                 => __('validation.mimes', ['attribute' => __('view.customer.logo')]),
            'logo.max'                   => __('validation.max.file', ['attribute' => __('view.customer.logo')]),
            'fullname.reuqired'          => __('validation.required', ['attribute' => __('view.customer.full_name')]),
            'fullname.string'            => __('validation.string', ['attribute' => __('view.customer.full_name')]),
            'fullname.max'               => __('validation.max.string', ['attribute' => __('view.customer.full_name')]),
            'email.email'                => __('validation.email', ['attribute' => __('view.customer.email')]),
            'website.string'             => __('validation.string', ['attribute' => __('view.customer.website')]),
            'website.max'                => __('validation.max.string', ['attribute' => __('view.customer.website')]),
            'address.string'             => __('validation.string', ['attribute' => __('view.customer.address')]),
            'address.max'                => __('validation.max.string', ['attribute' => __('view.customer.address')]),
            'service_id.required'        => __('validation.required', ['attribute' => __('view.customer.service')]),
            'service_id.integer'         => __('validation.integer', ['attribute' => __('view.customer.service')]),
            'service_id.exists'          => __('validation.exists', ['attribute' => __('view.customer.service')]),
            'source.required'            => __('validation.required', ['attribute' => __('view.customer.source')]),
            'status.required'            => __('validation.required', ['attribute' => __('view.customer.status')]),
            'assigned_staff_id.required' => __('validation.required', ['attribute' => __('view.customer.assigned_staff')]),
            'assigned_staff_id.integer'  => __('validation.integer', ['attribute' => __('view.customer.assigned_staff')]),
            'assigned_staff_id.exists'   => __('validation.exists', ['attribute' => __('view.customer.assigned_staff')]),
            'user_create.required'       => __('validation.required', ['attribute' => __('view.customer.user_create')]),
            'file.file'                  => __('validation.file', ['attribute' => __('view.customer.file')]),
            'file.mimes'                 => __('validation.mimes', ['attribute' => __('view.customer.file')]),
            'file.max'                   => __('validation.max.file', ['attribute' => __('view.customer.file')]),
            'customer_id.required'       => __('validation.required', ['attribute' => __('view.customer_service.customer')]),
            'start_date.required'        => __('validation.required', ['attribute' => __('view.customer_service.start_date')]),
            'start_date.date'            => __('validation.date', ['attribute' => __('view.customer_service.start_date')]),
            'end_date.required'          => __('validation.required', ['attribute' => __('view.customer_service.end_date')]),
            'end_date.date'              => __('validation.date', ['attribute' => __('view.customer_service.end_date')]),
            'total_paid.required'        => __('validation.required', ['attribute' => __('view.customer_service.total_paid')]),
            'total_paid.numeric'         => __('validation.numeric', ['attribute' => __('view.customer_service.total_paid')]),
            'status_payment.required'    => __('validation.required', ['attribute' => __('view.customer_service.status')]),
        ];
    }
}
