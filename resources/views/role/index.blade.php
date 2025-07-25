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
                                    {{ __('view.role.model') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('view.role.list') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                {{ __('view.role.model') }}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row pd-0 mr-0 mb-2 align-items-center">
                                <div class="col-12 col-xl-3 mb-2 mb-xl-0">
                                    <form action="{{ route('roles.index') }}" method="get">
                                        <div class="input-group">
                                            <input type="search" class="form-control form-control-sm" name='search'
                                                value="{{ request('search') }}"
                                                placeholder="{{ __('view.role.search') }}"
                                                aria-label="{{ __('view.role.search') }}"
                                                aria-describedby="button-addon1">
                                            <button class="btn btn-purple btn-wave" type="submit" id="search">
                                                {{ __('view.button.search') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 col-xl-9 text-xl-end text-start">
                                    <button class="btn btn-sm btn-purple btn-wave waves-light" data-bs-toggle="modal"
                                        data-bs-target="#create-role">
                                        <i class="ri-add-line fw-medium align-middle me-1"></i>
                                        {{ __('view.role.model') }}
                                    </button>
                                </div>

                                <!-- Start::add role modal -->
                                <div class="modal modal-lg fade mr-0" id="create-role" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.create') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form id="create-role-form" action="{{ route('roles.create') }}" method="post">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <div class="col-12">
                                                            <label for="name" class="form-label">
                                                                {{ __('view.role.name') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="{{ __('view.placeholder.name') }}">
                                                            <small class="text-danger error-name"></small>
                                                        </div>

                                                        <div class="col-xl-12">
                                                            <label for="description" class="form-label">
                                                                {{ __('view.role.description') }}
                                                            </label>
                                                            <textarea class="form-control" id="description" name="description" rows="5">
                                                            </textarea>
                                                            <small class="text-danger error-description"></small>
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
                                <!-- End::add role modal -->

                                <!-- Start::edit role modal -->
                                <div class="modal modal-lg fade mr-0" id="update-role-form" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.update') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form id="update-role" action="{{ route('roles.update') }}" method="post">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="edit-id" name="id">
                                                        <div class="col-12">
                                                            <label for="name" class="form-label">
                                                                {{ __('view.role.name') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="edit-name"
                                                                name="name" placeholder="{{ __('view.placeholder.name') }}">
                                                            <small class="text-danger error-name"></small>
                                                        </div>

                                                        <div class="col-xl-12">
                                                            <label for="description" class="form-label">
                                                                {{ __('view.role.description') }}
                                                            </label>
                                                            <textarea class="form-control" id="edit-description" name="description"
                                                                placeholder="{{ __('view.placeholder.description') }}"
                                                                rows="5">
                                                            </textarea>
                                                            <small class="text-danger error-description"></small>
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
                                <!-- End::edit role modal -->
                            </div>

                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered border-primary table-checkall">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __("view.role.name") }}</th>
                                            <th scope="col">{{ __("view.role.description") }}</th>
                                            <th scope="col">{{ __("view.button.function") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($roles as $role)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <span class="badge btn-purple">
                                                        {{ $role->name }}
                                                    </span>
                                                </td>
                                                <td> {{ $role->description }} </td>
                                                <td>
                                                    <button class="btn btn-icon btn-sm btn-purple btn-edit-role"
                                                        type="button" data-toggle="tooltip" data-placement="top"
                                                        data-role="{{ $role }}" title="{{ __('view.button.update') }}">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <a href="javascript:void(0);"
                                                        data-url="{{ route('roles.destroy', $role) }}"
                                                        data-id="{{ $role->id }}"
                                                        title="{{ __('view.button.delete') }}"
\                                                       class="btn btn-icon btn-sm btn-danger delete-role">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">{{ __('view.data.null') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-2">
                                    {{ $roles->links('pagination::bootstrap-5') }}
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
        @vite(['resources/js/pages/role/index.js'])
    @endpush
@endsection
