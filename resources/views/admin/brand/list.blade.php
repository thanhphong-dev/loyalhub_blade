@extends('layouts.admin')

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
            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style2 mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><i
                                        class="ri-earth-line me-1 fs-15"></i>{{ __('view.brands.name') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('view.brands.category') }}</li>
                        </ol>
                    </nav>
                </div>

            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header justify-content-between">
                            <div class="card-title">
                                {{ __('view.brands.list') }}
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row pd-0 mr-0 mb-2 align-items-center">
                                <div class="col-12 col-xl-3 mb-2 mb-xl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="{{ __('view.search.name') }}"
                                            aria-label="{{ __('view.search.name') }}" aria-describedby="button-addon1">
                                        <button class="btn btn-primary btn-wave" type="button" id="button-addon1">
                                            {{ __('view.button.search') }}
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-9 text-xl-end text-start">
                                    <button class="btn btn-sm btn-primary btn-wave waves-light" data-bs-toggle="modal"
                                        data-bs-target="#create-brand">
                                        <i class="ri-add-line fw-medium align-middle me-1"></i>
                                        {{ __('view.brands.name') }}
                                    </button>

                                </div>
                                <!-- Start::add brand modal -->
                                <div class="modal modal-lg fade mr-0" id="create-brand" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">
                                                    {{ __('view.button.create') }}
                                                </h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('brands.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="name"
                                                                class="form-label">{{ __('view.brands.title') }}</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="{{ __('view.enter.name') }}">
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="website"
                                                                class="form-label">{{ __('view.brands.website') }}</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="website"
                                                                placeholder="{{ __('view.enter.website') }}">
                                                            @error('website')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="description"
                                                                class="form-label">{{ __('view.brands.description') }}</label>
                                                            <textarea class="form-control" id="description" name="description" placeholder="{{ __('view.enter.description') }}"
                                                                rows="5"></textarea>
                                                            @error('description')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="logo"
                                                                class="form-label">{{ __('view.brands.logo') }}</label>
                                                            <input type="file" name="logo" id="logo"
                                                                class="form-control">
                                                            @error('logo')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">{{ __('view.button.cancel') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-primary">{{ __('view.button.confirm') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::add brand modal -->

                                <!-- Start::edit brand modal -->
                                <div class="modal modal-lg fade mr-0" id="editBrandModal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">
                                                    {{ __('view.button.create') }}
                                                </h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('brands.update') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="id" name="id">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="name"
                                                                class="form-label">{{ __('view.brands.title') }}</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="{{ __('view.enter.name') }}">
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="website"
                                                                class="form-label">{{ __('view.brands.website') }}</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="website"
                                                                placeholder="{{ __('view.enter.website') }}">
                                                            @error('website')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="description"
                                                                class="form-label">{{ __('view.brands.description') }}</label>
                                                            <textarea class="form-control" id="description" name="description" placeholder="{{ __('view.enter.description') }}"
                                                                rows="5"></textarea>
                                                            @error('description')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="logo"
                                                                class="form-label">{{ __('view.brands.logo') }}</label>
                                                            <input type="file" name="logo" id="logo"
                                                                class="form-control">
                                                            @error('logo')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">{{ __('view.button.cancel') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-primary">{{ __('view.button.confirm') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::edit brand modal -->
                            </div>

                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered border-primary table-checkall">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Website</th>
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Chức năng</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($brands as $brand)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img class="avatar avatar-xl p-1"
                                                        src="{{ asset('storage/'. $brand->logo) }}" />
                                                </td>
                                                <td>
                                                    {{ $brand->name }}
                                                </td>
                                                <td>
                                                    {{ $brand->website }}
                                                </td>

                                                <td>
                                                    {{ $brand->description }}
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-icon btn-sm btn-primary btn-edit-brand"
                                                        data-id="{{ $brand->id }}"
                                                        data-name="{{  $brand->name }}"
                                                        data-description="{{ $brand->description }}"
                                                        data-website="{{ $brand->website }}"
                                                        data-logo="{{ $brand->logo }}"
                                                        type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <a href="{{ route('brands.destroy', $brand->id) }}"
                                                        class="btn btn-icon btn-sm btn-danger btn-delete">
                                                        <i data-id="{{ $brand->id }}" class="ri-delete-bin-line"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">Hiện tại không có thông tin hiển thị nào !</td>
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
@endsection
