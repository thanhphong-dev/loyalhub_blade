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
                                    <i class="ri-id-card-line me-1 fs-15"></i>
                                    {{ __('view.employee.model') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('view.employee.list') }}
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                {{ __('view.employee.model') }}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row pd-0 mr-0 mb-2 align-items-center">

                                <div class="col-12 col-xl-3 mb-2 mb-xl-0">
                                    <form action="{{ route('employees.index') }}" method="get">
                                        <div class="input-group">
                                            <input type="search" class="form-control form-control-sm" name='search'
                                                value="{{ request('search') }}"
                                                placeholder="{{ __('view.employee.search') }}"
                                                aria-label="{{ __('view.employee.search') }}"
                                                aria-describedby="button-addon1">
                                            <button class="btn btn-purple btn-wave" type="submit" id="search">
                                                {{ __('view.button.search') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-12 col-xl-9 text-xl-end text-start">
                                    <button class="btn btn-sm btn-purple btn-wave waves-light" data-bs-toggle="modal"
                                        data-bs-target="#create-employee">
                                        <i class="ri-add-line fw-medium align-middle me-1"></i>
                                        {{ __('view.employee.model') }}
                                    </button>
                                </div>
                                <!-- Start::add employee modal -->
                                <div class="modal modal-lg fade mr-0" id="create-employee" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.create') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form id="create-employee-form" action="{{ route('employees.create') }}"
                                                method="post">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="frist_name" class="form-label">
                                                                {{ __('view.employee.frist_name') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="frist_name"
                                                                value="{{ old('frist_name') }}" name="frist_name">
                                                            <small class="text-danger error-frist_name"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="last_name" class="form-label">
                                                                {{ __('view.employee.last_name') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="last_name"
                                                                value="{{ old('last_name') }}" name="last_name">
                                                            <small class="text-danger error-last_name"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="email" class="form-label">
                                                                {{ __('view.employee.email') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="email"
                                                                value="{{ old('email') }}" name="email">
                                                            <small class="text-danger error-email"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="phone_number" class="form-label">
                                                                {{ __('view.employee.phone_number') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="phone_number"
                                                                value="{{ old('phone_number') }}" name="phone_number">
                                                            <small class="text-danger error-phone_number"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="address" class="form-label">
                                                                {{ __('view.employee.address') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="address"
                                                                value="{{ old('address') }}" name="address">
                                                            <small class="text-danger error-address"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="role_id" class="form-label">
                                                                {{ __('view.employee.role') }}
                                                            </label>
                                                            <select name="role_id" class="form-control" id="role_id">
                                                                @foreach ($roles as $role)
                                                                    <option value="{{ $role->id }}">
                                                                        {{ $role->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-role_id"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">{{ __('view.button.cancel') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-purple">{{ __('view.button.confirm') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::add employee modal -->

                                <!-- Start::update employee modal -->
                                <div class="modal modal-lg fade mr-0" id="update-employee" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.update') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form id="update-employee-form" action="{{ route('employees.update') }}"
                                                enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="modal-body px-4">

                                                    <!-- Tabs navigation -->
                                                    <ul class="nav nav-tabs mb-3" id="employeeTab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="info-tab"
                                                                data-bs-toggle="tab" data-bs-target="#info"
                                                                type="button" role="tab" aria-controls="info"
                                                                aria-selected="true">
                                                                {{ __('view.employee.informartion') }}
                                                            </button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="password-tab"
                                                                data-bs-toggle="tab" data-bs-target="#password"
                                                                type="button" role="tab" aria-controls="password"
                                                                aria-selected="false">
                                                                {{ __('view.employee.current_password') }}
                                                            </button>
                                                        </li>
                                                    </ul>

                                                    <!-- Tabs content -->
                                                    <div class="tab-content" id="employeeTabContent">

                                                        <input type="hidden" id="edit-id" name="id">

                                                        <!-- Tab 1: Thông tin -->
                                                        <div class="tab-pane fade show active" id="info"
                                                            role="tabpanel" aria-labelledby="info-tab">
                                                            <div class="row gy-2">
                                                                <div class="col-xl-4 col-12 p-0 m-0">
                                                                    {{-- <div class="col-12">
                                                                        <img id="edit-avatar_url" class="rounded-circle"
                                                                            style="width: 200px; height: 200px;"
                                                                            src="{{ old('avatar_url') ? old('avatar_url') : asset('images/employee/avatar.png') }}"
                                                                            alt="{{ __('view.employee.avatar') }}">
                                                                    </div>

                                                                    <div class="col-12 mt-4">
                                                                        <input type="file" id="avatar_url"
                                                                            name="avatar_url" accept="image/*">
                                                                        @error('avatar_url')
                                                                            <small
                                                                                class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div> --}}
                                                                    <div class="col-12 mt-4">
                                                                        <span
                                                                            class="avatar avatar-xxl p-1 bg-light border avatar-rounded">
                                                                            <img src="{{ old('avatar_url') ? old('avatar_url') : asset('images/employee/avatar.png') }}"
                                                                                alt="" id="edit-avatar_url">
                                                                            <span
                                                                                class="badge rounded-pill bg-purple avatar-badge">
                                                                                <input type="file" name="avatar_url"
                                                                                    accept="image/*"
                                                                                    class="position-absolute w-100 h-100 op-0"
                                                                                    id="avatar_url">
                                                                                <i class="fe fe-camera"></i>
                                                                            </span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-8 col-12 p-0 m-0">
                                                                    <div class="row p-0 m-0">
                                                                        <div class="col-xl-6 col-12">
                                                                            <label for="frist_name" class="form-label">
                                                                                {{ __('view.employee.frist_name') }}
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                id="edit-frist_name" name="frist_name"
                                                                                value="{{ old('frist_name') }}">
                                                                            <small
                                                                                class="text-danger error-frist_name"></small>
                                                                        </div>
                                                                        <div class=" col-xl-6 col-12">
                                                                            <label for="last_name" class="form-label">
                                                                                {{ __('view.employee.last_name') }}
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                id="edit-last_name" name="last_name"
                                                                                value="{{ old('last_name') }}">
                                                                            <small
                                                                                class="text-danger error-last_name"></small>
                                                                        </div>
                                                                        <div class="col-12 mt-2">
                                                                            <label for="email" class="form-label">
                                                                                {{ __('view.employee.email') }}
                                                                            </label>
                                                                            <input type="email" class="form-control"
                                                                                id="edit-email" name="email"
                                                                                value="{{ old('email') }}">
                                                                            <small class="text-danger error-email"></small>
                                                                        </div>
                                                                        <div class="col-12 mt-2">
                                                                            <label for="phone_number" class="form-label">
                                                                                {{ __('view.employee.phone_number') }}
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                id="edit-phone_number" name="phone_number"
                                                                                value="{{ old('phone_number') }}">
                                                                            <small
                                                                                class="text-danger error-phone_number"></small>
                                                                        </div>
                                                                        <div class="col-xl-6 col-12 mt-2">
                                                                            <label for="address" class="form-label">
                                                                                {{ __('view.employee.address') }}
                                                                            </label>
                                                                            <input type="text" class="form-control"
                                                                                id="edit-address" name="address"
                                                                                value="{{ old('address') }}">
                                                                            <small
                                                                                class="text-danger error-address"></small>
                                                                        </div>
                                                                        <div class="col-xl-6 col-12 mt-2">
                                                                            <label for="role_id" class="form-label">
                                                                                {{ __('view.employee.role') }}
                                                                            </label>
                                                                            <select name="role_id" class="form-control"
                                                                                id="edit-role_id">
                                                                                @foreach ($roles as $role)
                                                                                    <option value="{{ $role->id }}">
                                                                                        {{ $role->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <small
                                                                                class="text-danger error-role_id"></small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Tab 2: Thay đổi mật khẩu -->
                                                        <div class="tab-pane fade" id="password" role="tabpanel"
                                                            aria-labelledby="password-tab">
                                                            <div class="row gy-2 mt-2">
                                                                <div class="col-12">
                                                                    <label for="password" class="form-label">
                                                                        {{ __('view.employee.new_password') }}
                                                                    </label>
                                                                    <input type="password" class="form-control"
                                                                        name="password" id="new_password">
                                                                    <small class="text-danger error-password"></small>
                                                                </div>
                                                                <div class="col-12">
                                                                    <label for="password_confirmation" class="form-label">
                                                                        {{ __('view.employee.password_confirmation') }}
                                                                    </label>
                                                                    <input type="password" class="form-control"
                                                                        name="password_confirmation"
                                                                        id="password_confirmation">
                                                                    <small
                                                                        class="text-danger error-password_confirmation"></small>
                                                                </div>
                                                            </div>
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
                                <!-- End::update employee modal -->

                            </div>

                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered border-primary table-checkall">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('view.employee.avatar') }}</th>
                                            <th scope="col">{{ __('view.employee.full_name') }}</th>
                                            <th scope="col">{{ __('view.employee.email') }}</th>
                                            <th scope="col">{{ __('view.employee.phone_number') }}</th>
                                            <th scope="col">{{ __('view.employee.address') }}</th>
                                            <th scope="col">{{ __('view.employee.role') }}</th>
                                            <th scope="col">{{ __('view.button.function') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($employees as $employee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td scope="row">
                                                    <span class="avatar avatar-ms avatar-rounded">
                                                        <img src="{{ $employee->avatar_url ? asset('storage/' . $employee->avatar_url) : asset('images/employee/avatar.png') }}"
                                                            alt="img">
                                                    </span>
                                                </td>
                                                <td>{{ $employee->full_name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->phone_number }}</td>
                                                <td>{{ $employee->address }}</td>
                                                <td>
                                                    <span class="badge bg-purple text-white">
                                                        {{ $employee->roles->pluck('name')->implode(', ') }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-icon btn-sm btn-purple btn-edit-employee"
                                                        type="button" data-toggle="tooltip" data-placement="top"
                                                        data-employee="{{ $employee }}"
                                                        title="{{ __('view.button.update') }}">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <a href="javascript:void(0);"
                                                        data-url="{{ route('employees.destroy', $employee) }}"
                                                        data-id="{{ $employee->id }}"
                                                        title="{{ __('view.button.delete') }}"
                                                        class="btn btn-icon btn-sm btn-danger delete-employee">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8">{{ __('view.data.null') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-2">
                                    {{ $employees->links('pagination::bootstrap-5') }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('page-scripts')
        <script>
            const getNotification = "{{ __('view.notyf.notification') }}"
            const getConfirm = "{{ __('view.notyf.confirm') }}"
            const getMessSuccess = "{{ __('view.notyf.delete') }}"
            const getMessError = "{{ __('view.notyf.error') }}"
            const btnSubmit = "{{ __('view.notyf.btn_confirm') }}"
            const btnCancel = "{{ __('view.notyf.btn_cancel') }}"
        </script>
        @vite(['resources/js/pages/employee/index.js'])
    @endpush
@endsection
