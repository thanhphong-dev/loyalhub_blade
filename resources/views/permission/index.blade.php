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
                                    <i class="ti ti-settings me-1 fs-15"></i>
                                    {{ __('view.system.setting') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('view.system.permission') }}
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
                                {{ __('view.system.permission') }}
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-sm btn-purple btn-wave waves-light" data-bs-toggle="modal"
                                    data-bs-target="#create-permission">
                                    <i class="ri-add-line fw-medium align-middle me-1"></i>
                                    {{ __("view.permission.model") }}
                                </button>
                                <!-- Start::add permission modal -->
                                <div class="modal modal-lg fade" id="create-permission" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title ">{{ __("view.button.create") }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form id="create-permission-form" action={{ route('permissions.create') }} method="POST">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <div class="col-xl-12">
                                                            <label for="name" class="form-label">{{ __("view.permission.name") }}</label>
                                                            <input type="text" class="form-control" name="name"
                                                                id="name" placeholder="{{ __('view.placeholder.name') }}">
                                                            <small class="text-danger error-name"></small>
                                                        </div>
                                                        <div class="form-group col-xl-12">
                                                            <label for="slug" class="form-label">{{ __("view.permission.slug") }}</label>
                                                            <input type="text" class="form-control" name="slug"
                                                                id="slug" placeholder="{{ __('view.placeholder.slug_permission') }}">
                                                            <small class="text-danger error-slug"></small>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="description" class="form-label">{{ __("view.permission.description") }}</label>
                                                            <textarea class="form-control"
                                                                id="description"
                                                                name="description"
                                                                placeholder="{{ __('view.placeholder.description') }}"
                                                                rows="5">
                                                            </textarea>
                                                            <small class="text-danger error-description"></small>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">{{ __("view.button.cancel") }}</button>
                                                    <button type="submit" class="btn btn-purple">{{ __("view.button.confirm") }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::add permission modal -->

                                <!-- Start::edit permission modal -->
                                <div class="modal modal-lg fade" id="update-permission" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __("view.button.update") }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form id="update-permission-form" action="{{ route('permissions.update') }}" method="POST">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <input type="hidden" id="edit-id" name="id">
                                                    <div class="row gy-2">
                                                        <div class="col-xl-12">
                                                            <label for="edit-name" class="form-label">{{ __("view.permission.name") }}</label>
                                                            <input type="text" class="form-control" id="edit-name"
                                                                name="name" placeholder="{{ __('view.placeholder.name') }}">
                                                            <small class="text-danger error-name"></small>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="edit-slug" class="form-label">{{ __("view.permission.slug") }}</label>
                                                            <input type="text" class="form-control" id="edit-slug"
                                                                name="slug" placeholder="{{ __('view.placeholder.slug_permission') }}">
                                                            <small class="text-danger error-slug"></small>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="edit-description" class="form-label">
                                                                {{ __("view.permission.description") }}
                                                            </label>
                                                            <textarea class="form-control"
                                                                id="edit-description"
                                                                name="description"
                                                                placeholder="{{ __('view.placeholder.description') }}"
                                                                rows="5">
                                                            </textarea>
                                                            <small class="text-danger error-description"></small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">
                                                        {{ __("view.button.cancel") }}
                                                    </button>
                                                    <button type="submit" class="btn btn-purple">
                                                        {{ __("view.button.confirm") }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Start::edit permission modal -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered border-primary table-checkall">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __("view.permission.name") }}</th>
                                            <th scope="col">{{ __("view.permission.slug") }}</th>
                                            <th scope="col">{{ __("view.permission.description") }}</th>
                                            <th scope="col">{{ __("view.button.function") }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($permissions) > 0)
                                            @foreach ($permissions as $moduleName => $modulePermissions)
                                                <tr>
                                                    <td colspan="5">
                                                        <strong>
                                                            Module
                                                            {{ ucfirst($moduleName) }}
                                                        </strong>
                                                    </td>
                                                </tr>
                                                @foreach ($modulePermissions as $permission)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            {{ $permission->name }}
                                                        </td>
                                                        <td>
                                                            {{ $permission->slug }}
                                                        </td>
                                                        <td>
                                                            {{ $permission->description }}
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="hstack gap-2 fs-15">
                                                                <button
                                                                    class="btn btn-icon btn-sm btn-purple btn-edit-permission"
                                                                    data-permission="{{ $permission }}"
                                                                    type="button" data-toggle="tooltip"
                                                                    data-placement="top" title="Edit">
                                                                    <i class="ri-edit-line"></i>
                                                                </button>
                                                                <a href="javascript:void(0);"
                                                                    data-url="{{ route('permissions.destroy', $permission) }}"
                                                                    title="{{ __('view.button.delete') }}"
                                                                    class="btn btn-icon btn-sm btn-danger delete-permission">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4">Hiện tại chưa có thông tin quyền nào !</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
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
        @vite(['resources/js/pages/permission/index.js'])
    @endpush
@endsection
