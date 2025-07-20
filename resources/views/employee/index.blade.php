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
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="tìm kiếm nhân sự..." aria-label="tìm kiếm nhân sự..."
                                            aria-describedby="button-addon1">
                                        <button class="btn btn-system btn-wave" type="button" id="button-addon1">
                                            {{ __('view.button.search') }}
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-9 text-xl-end text-start">
                                    <button class="btn btn-sm btn-system btn-wave waves-light" data-bs-toggle="modal"
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
                                            <div class="modal-body px-4">
                                                <div class="row gy-2">
                                                    <div class="col-xl-6 col-12">
                                                        <label for="frist_name" class="form-label">
                                                            {{ __('view.employee.frist_name') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="frist_name"
                                                            value="{{ old('frist_name') }}" name="frist_name">
                                                        <small class="text-danger error-frist_name"></small>
                                                    </div>
                                                    <div class="col-xl-6 col-12">
                                                        <label for="last_name" class="form-label">
                                                            {{ __('view.employee.last_name') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="last_name"
                                                            value="{{ old('last_name') }}" name="last_name">
                                                        <small class="text-danger error-last_name"></small>
                                                    </div>
                                                    <div class="col-xl-6 col-12">
                                                        <label for="email" class="form-label">
                                                            {{ __('view.employee.email') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="email"
                                                            value="{{ old('email') }}" name="email">
                                                        <small class="text-danger error-email"></small>
                                                    </div>
                                                    <div class="col-xl-6 col-12">
                                                        <label for="phone_number" class="form-label">
                                                            {{ __('view.employee.phone_number') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="phone_number"
                                                            value="{{ old('phone_number') }}" name="phone_number">
                                                        <small class="text-danger error-phone_number"></small>
                                                    </div>
                                                    <div class="col-xl-6 col-12">
                                                        <label for="address" class="form-label">
                                                            {{ __('view.employee.address') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control" id="address"
                                                            value="{{ old('address') }}" name="address">
                                                        <small class="text-danger error-address"></small>
                                                    </div>
                                                    <div class="col-xl-6 col-12">
                                                        <label for="role" class="form-label">
                                                            {{ __('view.employee.role') }}
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <select name="parent_id" class="form-control" id="parent_id">
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->id }}">
                                                                    {{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">{{ __('view.button.cancel') }}</button>
                                                <button type="submit"
                                                    class="btn btn-system">{{ __('view.button.confirm') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::add employee modal -->
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
                                                    <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                        <img src={{ asset('assets/images/faces/3.jpg') }} alt="img">
                                                    </span>
                                                </td>
                                                <td>{{ $employee->full_name }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->phone_number }}</td>
                                                <td>{{ $employee->address }}</td>
                                                <td>
                                                    <span
                                                        class="badge bg-light text-dark">{{ $employee->role->name }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="dropdown ms-2">
                                                        <button
                                                            class="btn btn-icon btn-secondary-light btn-sm btn-wave waves-light"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <i class="ti ti-dots-vertical"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"> Sửa
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:void(0);"> Xóa
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
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
@endsection
