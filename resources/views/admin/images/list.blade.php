@extends('layouts.admin')

@section('content')
    <!-- Start::app-content -->
    <div class="main-content app-content">
        <div class="container-fluid">
            <div class="mt-2">
                {{-- alert success  --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show custom-alert-icon shadow-sm" role="alert">
                        <svg class="svg-success text-success" xmlns="http://www.w3.org/2000/svg" height="1.5rem"
                            viewBox="0 0 24 24" width="1.5rem" fill="#0CC763">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M9 2.00318V2H19.9978C20.5513 2 21 2.45531 21 2.9918V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5501 3 20.9932V8L9 2.00318ZM5.82918 8H9V4.83086L5.82918 8ZM11 4V9C11 9.55228 10.5523 10 10 10H5V20H19V4H11Z">
                            </path>
                        </svg>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class="bi bi-x"></i></button>
                    </div>
                @endif
                {{-- end alert success  --}}

                {{-- alert error  --}}

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show custom-alert-icon shadow-sm" role="alert">
                        <svg class="svg-danger text-danger" xmlns="http://www.w3.org/2000/svg" height="1.5rem"
                            viewBox="0 0 24 24" width="1.5rem" fill="#ff383c">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zM12 17.3c-.72 0-1.3-.58-1.3-1.3 0-.72.58-1.3 1.3-1.3.72 0 1.3.58 1.3 1.3 0 .72-.58 1.3-1.3 1.3zm1-4.3h-2V7h2v6z" />
                        </svg>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class="bi bi-x"></i></button>
                    </div>
                @endif
                {{-- end alert error  --}}

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
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><i
                                        class="ti ti-home-2 me-1 fs-15"></i>Bài viết</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hình ảnh</li>
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
                                Danh sách
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row pd-0 mr-0 mb-2 align-items-center">
                                <div class="col-12 col-xl-3 mb-2 mb-xl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="tìm kiếm hình ảnh..." aria-label="tìm kiếm hình ảnh..."
                                            aria-describedby="button-addon1">
                                        <button class="btn btn-primary btn-wave" type="button" id="button-addon1">
                                            Hình ảnh
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-9 text-xl-end text-start">
                                    <button class="btn btn-sm btn-primary btn-wave waves-light" data-bs-toggle="modal"
                                        data-bs-target="#create-image">
                                        <i class="ri-add-line fw-medium align-middle me-1"></i> Hình ảnh
                                    </button>
                                </div>
                                <!-- Start::add image modal -->
                                <div class="modal modal-lg fade mr-0" id="create-image" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{__('view.button.create')}}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('images.create') }}" method="post"  enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <div class="col-xl-12">
                                                            <label for="url" class="form-label">{{ __('view.images.url') }}</label>
                                                            <input type="file" name="url[]" id="url" class="form-control" multiple>
                                                            @error('url')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">{{ __('view.images.type') }}</label>
                                                            <select name="type" class="form-control" id="type">
                                                                @foreach ($imageType as $item)
                                                                    <option value="{{ $item->value }}">{{ $item->lable() }}</option>
                                                                @endforeach
                                                            </select>
                                                              @error('type')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">{{ __('view.button.cancel') }}</button>
                                                    <button type="submit" class="btn btn-primary">{{ __('view.button.confirm') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::add image modal -->

                                <!-- Start::edit image modal -->
                                <div class="modal modal-lg fade mr-0" id="editImageModal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{__('view.button.create')}}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('images.update') }}" method="post"  enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="id" name="id">
                                                        <div class="col-xl-12">
                                                            <label for="url" class="form-label">{{ __('view.images.url') }}</label>
                                                            <input type="file" name="url[]" id="url" class="form-control" multiple>
                                                            @error('url')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label">{{ __('view.images.type') }}</label>
                                                            <select name="type" class="form-control" id="type">
                                                                @foreach ($imageType as $item)
                                                                    <option value="{{ $item->value }}">{{ $item->lable() }}</option>
                                                                @endforeach
                                                            </select>
                                                              @error('type')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">{{ __('view.button.cancel') }}</button>
                                                    <button type="submit" class="btn btn-primary">{{ __('view.button.confirm') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::edit image modal -->
                            </div>

                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered border-primary table-checkall">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Đường dẫn</th>
                                            <th scope="col">Slug</th>
                                            <th scope="col">Danh mục</th>
                                            <th scope="col">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($images as $image)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td scope="row">
                                                   <img class="avatar avatar-xl p-1"
                                                        src="{{ asset('storage/'. $image->url) }}" />
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary text-white">{{ $image->slug }}</span>
                                                </td>
                                                <td>
                                                   {{ $image->type->lable() }}
                                                </td>
                                                <td class="text-center">
                                                     <button class="btn btn-icon btn-sm btn-primary btn-edit-image"
                                                        data-id="{{ $image->id }}"
                                                        data-url="{{ $image->url }}"
                                                        data-type="{{ $image->type }}"
                                                        type="button" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <a href="{{ route('images.destroy', $image->id) }}"
                                                        class="btn btn-icon btn-sm btn-danger btn-delete">
                                                        <i data-id="{{ $image->id }}" class="ri-delete-bin-line"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">{{ __('view.data.nullable') }}</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--End:: row-4 -->

        </div>
    </div>
    <!-- End::app-content -->
@endsection
