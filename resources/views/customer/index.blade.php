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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('view.customer.list') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                {{ __('view.customer.list') }}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row pd-0 mr-0 mb-2 align-items-center">
                                <div class="col-12 col-xl-3 mb-2 mb-xl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="tìm kiếm danh mục..." aria-label="tìm kiếm danh mục..."
                                            aria-describedby="button-addon1">
                                        <button class="btn btn-purple tn-wave" type="button" id="button-addon1">
                                            {{ __('view.button.search') }}
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-9 text-xl-end text-start">
                                    <button class="btn btn-sm btn-purple btn-wave waves-light" data-bs-toggle="modal"
                                        data-bs-target="#create-customer">
                                        <i class="ri-add-line fw-medium align-middle me-1"></i>
                                        {{ __('view.customer.model') }}
                                    </button>
                                </div>

                                <!-- Start::add customer modal -->
                                <div class="modal modal-lg fade mr-0" id="create-customer" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.create') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form id="create-customer-form" action="{{ route('customers.create') }}"
                                                enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="fullname" class="form-label">
                                                                {{ __('view.customer.full_name') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="fullname"
                                                                name="fullname"
                                                                placeholder="{{ __('view.placeholder.full_name') }}">
                                                            <small class="text-danger error-fullname"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="phone_numer" class="form-label">
                                                                {{ __('view.customer.phone_number') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="phone_number"
                                                                name="phone_number"
                                                                placeholder="{{ __('view.placeholder.phone_number') }}">
                                                            <small class="text-danger error-phone_number"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="email" class="form-label">
                                                                {{ __('view.customer.email') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="email"
                                                                name="email"
                                                                placeholder="{{ __('view.placeholder.email') }}">
                                                            <small class="text-danger error-email"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="address" class="form-label">
                                                                {{ __('view.customer.address') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="address"
                                                                placeholder="{{ __('view.placeholder.address') }}">
                                                            <small class="text-danger error-address"></small>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="website" class="form-label">
                                                                {{ __('view.customer.website') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="website"
                                                                name="website"
                                                                placeholder="{{ __('view.placeholder.website') }}">
                                                            <small class="text-danger error-website"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="source" class="form-label">
                                                                {{ __('view.customer.source') }}
                                                            </label>
                                                            <select name="source" class="form-control" id="source">
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
                                                            <select name="status" class="form-control" id="status">
                                                                @foreach ($customerStatus as $item)
                                                                    <option value="{{ $item->value }}">
                                                                        {{ $item->lable() }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-status"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="assigned_staff_id" class="form-label">
                                                                {{ __('view.customer.assigned_staff') }}
                                                            </label>
                                                            <select name="assigned_staff_id" class="form-control"
                                                                id="assigned_staff_id">
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
                                                                id="service_id">
                                                                @foreach ($services as $service)
                                                                    <option value="{{ $service->id }}">
                                                                        {{ $service->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-service_id"></small>
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
                                <!-- End::add customer modal -->

                                <!-- Start::update customer modal -->
                                <div class="modal modal-lg fade mr-0" id="update-customer" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.update') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form id="update-customer-form" action="{{ route('customers.update') }}"
                                                enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="edit-id" name="id">
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
                                                                @foreach ($customerStatus as $item)
                                                                    <option value="{{ $item->value }}">
                                                                        {{ $item->lable() }}
                                                                    </option>
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
                                                        <div class="col-xl-12">
                                                            <a href="#" class="file-download badge bg-success text-white"
                                                                id="edit-file"
                                                                download>
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
                                <!-- End::update customer modal -->

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
                                            <th scope="col">{{ __('view.customer.address') }}</th>
                                            <th scope="col">{{ __('view.customer.status') }}</th>
                                            <th scope="col">{{ __('view.customer.website') }}</th>
                                            <th scope="col">{{ __('view.customer.service') }}</th>
                                            <th scope="col">{{ __('view.customer.source') }}</th>
                                            <th scope="col">{{ __('view.customer.assigned_staff') }}</th>
                                            <th scope="col">{{ __('view.customer.user_create') }}</th>
                                            <th scope="col">{{ __('view.button.function') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customers as $customer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <span class="avatar avatar-ms avatar-rounded">
                                                        <img src="{{ $customer->logo ? asset('storage/' . $customer->logo) : asset('images/employee/avatar.png') }}"
                                                            alt="img">
                                                    </span>
                                                </td>
                                                <td>{{ $customer->fullname }}</td>
                                                <td>{{ $customer->email ? $customer->email : 'null' }}</td>
                                                <td>{{ $customer->phone_number ? $customer->phone_number : 'null' }}</td>
                                                <td>{{ $customer->address ? $customer->address : 'null' }}</td>
                                                <td>
                                                    <span class="badge {{ $customer->status->colorClass() }} text-white">
                                                        {{ $customer->status->lable() }}
                                                    </span>
                                                </td>
                                                <td>{{ $customer->website ? $customer->website : 'null' }}</td>
                                                <td>{{ $customer->service->name }}</td>
                                                <td>
                                                    <span class="badge {{ $customer->source->colorClass() }} text-white">
                                                        {{ $customer->source->lable() }}
                                                    </span>
                                                </td>
                                                <td>{{ $customer->assignedStaff->full_name }}</td>
                                                <td>{{ $customer->userCreate->full_name }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-icon btn-sm btn-purple btn-edit-customer"
                                                        type="button" data-toggle="tooltip" data-placement="top"
                                                        data-customer="{{ $customer }}"
                                                        title="{{ __('view.button.update') }}">
                                                        <i class="ri-edit-line"></i>
                                                    </button>
                                                    <a href="{{ asset('storage/'. $customer->file) }}"
                                                        title="{{ __('view.button.delete') }}"
                                                        download
                                                        class="btn btn-icon btn-sm btn-success dowload-file-customer">
                                                        <i class="ri-download-line"></i>
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        data-url="{{ route('customers.destroy', $customer) }}"
                                                        title="{{ __('view.button.delete') }}"
                                                        class="btn btn-icon btn-sm btn-danger delete-customer">
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
    @vite(['resources/js/pages/customer/index.js'])
@endsection
