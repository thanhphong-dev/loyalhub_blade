@extends('layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <div class="mt-2">
                {{-- alert delete  --}}
                <div id="overlay" class="overlay d-none">
                    <div class="alert">
                        <div class="card p-0 bg-white border-0">
                            <div class="alert custom-alert1 alert-danger">
                                <div class="text-center px-5 pb-0 svg-danger">
                                    <svg class="custom-alert-icon" xmlns="http://www.w3.org/2000/svg" height="1.5rem"
                                        viewBox="0 0 24 24" width="1.5rem" fill="#000000">
                                        <path d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zM12 17.3c-.72 0-1.3-.58-1.3-1.3 0-.72.58-1.3 1.3-1.3 0 .72-.58 1.3-1.3 1.3zm1-4.3h-2V7h2v6z" />
                                    </svg>
                                    <h5>Thông báo</h5>
                                    <p class="">Bạn chắc chắc muốn xóa thông tin này!</p>
                                    <div class="">
                                        <button class="btn btn-outline-dark m-1 btn-cancel-delete">Hủy</button>
                                        <a href="#" id="confirmDelete"
                                            class="btn btn-danger btn-confirm-delete">Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end alert delete  --}}
            </div>
            <!-- Page Header -->
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
            <!-- Page Header Close -->

            <!--Start:: row-4 -->
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
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="tìm kiếm danh mục..." aria-label="tìm kiếm danh mục..."
                                            aria-describedby="button-addon1">
                                        <button class="btn btn-system btn-wave" type="button" id="button-addon1">
                                            {{ __('view.button.search') }}
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-9 text-xl-end text-start">
                                    <button class="btn btn-sm btn-system btn-wave waves-light" data-bs-toggle="modal"
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
                                                                name="name" placeholder="nhập tên...">
                                                            <small class="text-danger error-name"></small>
                                                        </div>

                                                        <div class="col-xl-12">
                                                            <label for="description" class="form-label">
                                                                {{ __('view.role.description') }}
                                                            </label>
                                                            <textarea class="form-control" id="description" name="description" placeholder="nhập nội dung..." rows="5"></textarea>
                                                            <small class="text-danger error-description"></small>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                        {{ __('view.button.cancel') }}
                                                    </button>
                                                    <button type="submit" class="btn btn-system">
                                                        {{ __('view.button.confirm') }}
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::add role modal -->

                                <!-- Start::edit role modal -->
                                <div class="modal modal-lg fade mr-0" id="update-role" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.update') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('roles.update') }}" method="post">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="edit-id" name="id">
                                                        <div class="col-12">
                                                            <label for="name" class="form-label">
                                                                {{ __('view.role.name') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="edit-name"
                                                                name="name" placeholder="nhập tên...">
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="col-xl-12">
                                                            <label for="description" class="form-label">
                                                                {{ __('view.role.description') }}
                                                            </label>
                                                            <textarea class="form-control" id="edit-description" name="description" placeholder="nhập nội dung..."
                                                                rows="5"></textarea>
                                                            @error('description')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                        {{ __('view.button.cancel') }}
                                                    </button>
                                                    <button type="submit" class="btn btn-system">
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
                                            <th scope="col">Tên</th>
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($roles as $role)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <span class="badge btn-system">
                                                        {{ $role->name }}
                                                    </span>
                                                </td>
                                                <td> {{ $role->description }} </td>
                                                <td>
                                                    <button class="btn btn-icon btn-sm btn-system btn-edit-role"
                                                        type="button" data-toggle="tooltip" data-placement="top"
                                                        data-role="{{ $role }}" title="Edit">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <a href="#" class="btn btn-icon btn-sm btn-danger btn-delete">
                                                        <i data-id="" class="ri-delete-bin-line"></i>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('page-scripts')
        @vite(['resources/js/pages/role/index.js'])
    @endpush
@endsection
