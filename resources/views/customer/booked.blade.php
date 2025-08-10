@extends('layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style2 mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">
                                    <i class="ri-group-line me-1 fs-15"></i>
                                    {{ __('view.customer.model') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('view.customer.schedule') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                {{ __('view.customer.schedule') }}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row pd-0 mr-0 mb-2 align-items-center">
                                <div class="col-12 col-xl-3 mb-2 mb-xl-0">
                                    <form action="{{ route('customer_appointments.booked') }}" method="get">
                                        <div class="input-group">
                                            <input type="search" class="form-control form-control-sm"
                                                name='search' value="{{ request('search') }}"
                                                placeholder="{{ __('view.search.customer') }}"
                                                aria-label="{{ __('view.search.customer') }}"
                                                aria-describedby="button-addon1">
                                            <button class="btn btn-purple tn-wave" type="submit" id="search">
                                                {{ __('view.button.search') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Start::update customer booked modal -->
                                <div class="modal modal-lg fade mr-0" id="update-customer-appointment" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.update') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form id="update-customer-appointment-form"
                                                action="{{ route('customer_appointments.update_booked') }}"
                                                enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-body px-4 scroll-bar-modal">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="customer_id" name="customer_id">
                                                        <input type="hidden" id="customer_appointment_id"
                                                            name="customer_appointment_id">

                                                        <div class="col-xl-4 col-12">
                                                            <div class="row">
                                                                <div class="col-12 mt-4">
                                                                    <span
                                                                        class="avatar avatar-xxl p-1 bg-light border avatar-rounded">
                                                                        <img src="{{ old('logo') ? old('logo') : asset('images/employee/avatar.png') }}"
                                                                            alt="" id="edit-logo">
                                                                        <span
                                                                            class="badge rounded-pill bg-purple avatar-badge">
                                                                            <input type="file" name="logo"
                                                                                accept="image/*"
                                                                                class="position-absolute w-100 h-100 op-0"
                                                                                id="customer-logo">
                                                                            <i class="fe fe-camera"></i>
                                                                        </span>
                                                                    </span>
                                                                    <small class="text-danger error-logo"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-8 col-12">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="fullname" class="form-label">
                                                                        {{ __('view.customer.full_name') }}
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="edit-fullname" name="fullname"
                                                                        placeholder="{{ __('view.placeholder.full_name') }}">
                                                                    <small class="text-danger error-fullname"></small>
                                                                </div>
                                                                <div class="col-12 mt-1">
                                                                    <label for="phone_numer" class="form-label">
                                                                        {{ __('view.customer.phone_number') }}
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="edit-phone_number" name="phone_number"
                                                                        placeholder="{{ __('view.placeholder.phone_number') }}">
                                                                    <small class="text-danger error-phone_number"></small>
                                                                </div>
                                                                <div class="col-12 mt-1">
                                                                    <label for="email" class="form-label">
                                                                        {{ __('view.customer.email') }}
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="edit-email" name="email"
                                                                        placeholder="{{ __('view.placeholder.email') }}">
                                                                    <small class="text-danger error-email"></small>
                                                                </div>
                                                                <div class="col-12 mt-1">
                                                                    <label for="address" class="form-label">
                                                                        {{ __('view.customer.address') }}
                                                                    </label>
                                                                    <input type="text" class="form-control"
                                                                        id="edit-address" name="address"
                                                                        placeholder="{{ __('view.placeholder.address') }}">
                                                                    <small class="text-danger error-address"></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-1">
                                                            <label for="website" class="form-label">
                                                                {{ __('view.customer.website') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="edit-website"
                                                                name="website"
                                                                placeholder="{{ __('view.placeholder.website') }}">
                                                            <small class="text-danger error-website"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="source" class="form-label">
                                                                {{ __('view.customer.source') }}
                                                            </label>
                                                            <select name="source" class="form-control" id="edit-source">
                                                                @foreach ($customerSource as $item)
                                                                    <option value="{{ $item->value }}">
                                                                        {{ $item->lable() }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-source"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="status" class="form-label">
                                                                {{ __('view.customer.status') }}
                                                            </label>
                                                            <select name="status" class="form-control" id="edit-status">
                                                                @foreach ($customerStatus as $status)
                                                                    @if (in_array($status, App\Enums\CustomerStatus::groupBooked()))
                                                                        <option value="{{ $status->value }}">
                                                                            {{ $status->lable() }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-status"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="assigned_staff_id" class="form-label">
                                                                {{ __('view.customer.assigned_staff') }}
                                                            </label>
                                                            <select name="assigned_staff_id" class="form-control"
                                                                id="edit-assigned_staff_id">
                                                                @foreach ($employees as $employee)
                                                                    <option value="{{ $employee->id }}">
                                                                        {{ $employee->full_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-assigned_staff_id"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="service_id" class="form-label">
                                                                {{ __('view.customer.service') }}
                                                            </label>
                                                            <select name="service_id" class="form-control"
                                                                id="edit-service_id">
                                                                @foreach ($services as $service)
                                                                    <option value="{{ $service->id }}">
                                                                        {{ $service->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-service_id"></small>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="title" class="form-label">
                                                                {{ __('view.customer_appointment.title') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="edit-title"
                                                                name="title" placeholder="">
                                                            <small class="text-danger error-title"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="start_time" class="form-label">
                                                                {{ __('view.customer_appointment.start_time') }}
                                                            </label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-text text-muted"> <i
                                                                            class="ri-time-line"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        name="start_time" id="start_time"
                                                                        placeholder="Choose time">
                                                                </div>
                                                            </div>
                                                            <small class="text-danger error-start_time"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="end_time" class="form-label">
                                                                {{ __('view.customer_appointment.end_time') }}
                                                            </label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-text text-muted"> <i
                                                                            class="ri-time-line"></i>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                        name="end_time" id="end_time"
                                                                        placeholder="Choose time">
                                                                </div>
                                                            </div>
                                                            <small class="text-danger error-end_time"></small>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="date" class="form-label">
                                                                {{ __('view.customer_appointment.date') }}
                                                            </label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-text text-muted"> <i
                                                                            class="ri-calendar-line"></i> </div>
                                                                    <input type="text" class="form-control"
                                                                        name="date" id="date"
                                                                        placeholder="Choose date">
                                                                </div>
                                                            </div>
                                                            <small class="text-danger error-date"></small>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <a href="#"
                                                                class="file-download badge bg-success text-white"
                                                                id="edit-file" download>
                                                                <i class="ri-file-download-line"></i>
                                                                <span>File đính kèm</span>
                                                            </a>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="file" class="form-label">
                                                                {{ __('view.customer.file') }}
                                                            </label>
                                                            <input type="file" class="form-control" id="file"
                                                                name="file">
                                                            <small class="text-danger error-file"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                        {{ __('view.button.cancel') }}
                                                    </button>
                                                    <button type="submit" class="btn btn-purple">
                                                        {{ __('view.button.confirm') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::update customer booked modal -->

                                <!-- Start::create customer use service modal -->
                                <div class="modal modal-lg fade mr-0" id="create-customer-service" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.service') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form id="create-customer-service-form" action="{{ route('customer_services.create') }}"
                                                enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="edit-id" name="customer_id">
                                                        <div class="col-12">
                                                            <label for="total_paid" class="form-label">
                                                                {{ __('view.customer_service.total_paid') }}
                                                            </label>
                                                            <input type="text" class="form-control"
                                                                id="edit-total_paid" name="total_paid" placeholder="{{ __('view.placeholder.total_paid') }}">
                                                            <small class="text-danger error-total_paid"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="start_date" class="form-label">
                                                                {{ __('view.customer_service.start_date') }}
                                                            </label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-text text-muted"> <i
                                                                            class="ri-calendar-line"></i> </div>
                                                                    <input type="text" class="form-control"
                                                                        name="start_date" id="start_date"
                                                                        placeholder="{{ __('view.placeholder.start_date') }}">
                                                                </div>
                                                            </div>
                                                            <small class="text-danger error-start_date"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="end_date" class="form-label">
                                                                {{ __('view.customer_service.end_date') }}
                                                            </label>
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-text text-muted"> <i
                                                                            class="ri-calendar-line"></i> </div>
                                                                    <input type="text" class="form-control"
                                                                        name="end_date" id="end_date"
                                                                        placeholder="{{ __('view.placeholder.end_date') }}">
                                                                </div>
                                                            </div>
                                                            <small class="text-danger error-end_date"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="payment_method" class="form-label">
                                                                {{ __('view.customer_service.payment_method') }}
                                                            </label>
                                                            <select name="payment_method" class="form-control"
                                                                id="edit-payment_method">
                                                                @foreach ($customerPaymentMethods as $customerPaymentMethod)
                                                                    <option value="{{ $customerPaymentMethod->value }}">
                                                                        {{ $customerPaymentMethod->lable() }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-payment_method"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="status" class="form-label">
                                                                {{ __('view.customer.status') }}
                                                            </label>
                                                            <select name="status" class="form-control" id="edit-status">
                                                                @foreach ($customerStatus as $status)
                                                                    @if (in_array($status, App\Enums\CustomerStatus::groupService()))
                                                                        <option value="{{ $status->value }}">
                                                                            {{ $status->lable() }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-status"></small>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="status_payment" class="form-label">
                                                                {{ __('view.customer_service.status_payment') }}
                                                            </label>
                                                            <select name="status_payment" class="form-control"
                                                                id="edit-status_payment">
                                                                @foreach ($customerStatusPayments as $customerStatusPayment)
                                                                     @if (in_array($customerStatusPayment, App\Enums\CustomerStatusPayment::groupProcessing()))
                                                                        <option value="{{ $customerStatusPayment->value }}">
                                                                            {{ $customerStatusPayment->lable() }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-status_payment"></small>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="note" class="form-label">
                                                                {{ __('view.customer_service.note') }}
                                                            </label>
                                                            <textarea class="form-control" id="edit-note" name="note" placeholder="nhập ghi chú..." rows="5"></textarea>
                                                            <small class="text-danger error-note"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                        {{ __('view.button.cancel') }}
                                                    </button>
                                                    <button type="submit" class="btn btn-purple">
                                                        {{ __('view.button.confirm') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::create customer use service modal -->
                            </div>

                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered border-primary table-checkall">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('view.customer.logo') }}</th>
                                            <th scope="col">{{ __('view.customer.full_name') }}</th>
                                            <th scope="col">{{ __('view.customer.email') }}</th>
                                            <th scope="col">{{ __('view.customer.phone_number') }}</th>
                                            <th scope="col">{{ __('view.customer.status') }}</th>
                                            <th scope="col">{{ __('view.customer.date') }}</th>
                                            <th scope="col">{{ __('view.customer.time') }}</th>
                                            <th scope="col">{{ __('view.customer.service') }}</th>
                                            <th scope="col">{{ __('view.customer.source') }}</th>
                                            <th scope="col">{{ __('view.customer.assigned_staff') }}</th>
                                            <th scope="col">{{ __('view.customer.user_create') }}</th>
                                            <th scope="col">{{ __('view.button.function') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customerAppoinments as $customerAppoinment)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <span class="avatar avatar-ms avatar-rounded">
                                                        <img src="{{ $customerAppoinment->customer->logo ? asset('storage/' . $customerAppoinment->customer->logo) : asset('images/employee/avatar.png') }}"
                                                            alt="img">
                                                    </span>
                                                </td>
                                                <td>{{ $customerAppoinment->customer->fullname }}</td>
                                                <td>{{ $customerAppoinment->customer->email ? $customerAppoinment->customer->email : 'null' }}
                                                </td>
                                                <td>{{ $customerAppoinment->customer->phone_number ? $customerAppoinment->customer->phone_number : 'null' }}
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge {{ $customerAppoinment->customer->status->colorClass() }} text-white">
                                                        {{ $customerAppoinment->customer->status->lable() }}
                                                    </span>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($customerAppoinment->date)->format('d/m/Y') }}
                                                </td>

                                                <td>{{ \Carbon\Carbon::parse($customerAppoinment->start_time)->format('H:i') . ' - ' . \Carbon\Carbon::parse($customerAppoinment->end_time)->format('H:i') }}
                                                </td>
                                                <td>{{ $customerAppoinment->customer->service->name }}</td>
                                                <td>
                                                    <span
                                                        class="badge {{ $customerAppoinment->customer->source->colorClass() }} text-white">
                                                        {{ $customerAppoinment->customer->source->lable() }}
                                                    </span>
                                                </td>
                                                <td>{{ $customerAppoinment->customer->assignedStaff->full_name }}</td>
                                                <td>{{ $customerAppoinment->customer->userCreate->full_name }}</td>
                                                <td class="text-center">
                                                    <button
                                                        class="btn btn-icon btn-sm btn-purple btn-edit-customer-appointment"
                                                        type="button" data-toggle="tooltip" data-placement="top"
                                                        data-customer="{{ $customerAppoinment->customer }}"
                                                        data-customer_appoinment='@json($customerAppoinment)'
                                                        title="{{ __('view.button.update') }}">
                                                        <i class="ri-edit-line"></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-icon btn-sm btn-warning btn-create-customer-service"
                                                        type="button" data-toggle="tooltip" data-placement="top"
                                                        data-customer="{{ $customerAppoinment->customer }}"
                                                        title="{{ __('view.button.service') }}">
                                                        <i class="ri-store-2-line"></i>
                                                    </button>

                                                    <a href="{{ asset('storage/' . $customerAppoinment->customer->file) }}"
                                                        title="{{ __('view.button.dowload') }}" download
                                                        class="btn btn-icon btn-sm btn-success dowload-file-customer">
                                                        <i class="ri-download-line"></i>
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        data-url="{{ route('customer_appointments.destroy', $customerAppoinment) }}"
                                                        title="{{ __('view.button.delete') }}"
                                                        class="btn btn-icon btn-sm btn-danger delete-customer-booked">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="13">{{ __('view.data.null') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const getNotification = "{{ __('view.notyf.notification') }}"
        const getConfirm = "{{ __('view.notyf.confirm') }}"
        const getMessSuccess = "{{ __('view.notyf.delete') }}"
        const getMessError = "{{ __('view.notyf.error') }}"
        const btnSubmit = "{{ __('view.notyf.btn_confirm') }}"
        const btnCancel = "{{ __('view.notyf.btn_cancel') }}"
    </script>
    @vite(['resources/js/pages/customer/date.js', 'resources/js/pages/customer/booked.js'])
@endsection
