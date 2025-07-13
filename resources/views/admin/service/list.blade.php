@extends('layouts.admin')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <div class="mt-2">
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

            </div>
            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style2 mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"><i
                                        class="ri-earth-line me-1 fs-15"></i>Dịch vụ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                        </ol>
                    </nav>
                </div>

            </div>
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
                                            placeholder="tìm kiếm danh sách..." aria-label="tìm kiếm danh sách..."
                                            aria-describedby="button-addon1">
                                        <button class="btn btn-primary btn-wave" type="button" id="button-addon1">Tìm
                                            kiếm</button>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-9 text-xl-end text-start">
                                    <button class="btn btn-sm btn-primary btn-wave waves-light" data-bs-toggle="modal"
                                        data-bs-target="#create-service">
                                        <i class="ri-add-line fw-medium align-middle me-1"></i> Dịch vụ
                                    </button>

                                </div>
                                <!-- Start::add service modal -->
                                <div class="modal modal-lg fade mr-0" id="create-service" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Thêm dịch vụ</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('services.store') }}" method="post">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="name" class="form-label">Tên</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="nhập tên...">
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label class="form-label">Trạng thái</label>
                                                            <select name="status" class="form-control" id="status">
                                                                @foreach ($serviceStatus as $status)
                                                                    <option value="{{ $status->value }}">
                                                                        {{ $status->label() }}</option>
                                                                @endforeach

                                                            </select>
                                                            @error('status')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="price" class="form-label">Giá</label>
                                                            <input type="text" class="form-control" id="price"
                                                                name="price" placeholder="nhập giá...">
                                                            @error('price')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="brand_id" class="form-label">Thương hiệu</label>
                                                            <select name="brand_id" class="form-control" id="brand_id">
                                                                @foreach ($brands as $brand)
                                                                    <option value="{{ $brand->id }}">
                                                                        {{ $brand->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('brand_id')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="description" class="form-label">Nội dung</label>
                                                            <textarea class="form-control" id="description" name="description" placeholder="nhập nội dung..." rows="5"></textarea>
                                                            @error('description')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::add service modal -->

                                <!-- Start::edit service modal -->
                                <div class="modal modal-lg fade mr-0" id="editServiceModal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">Chinh sửa</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('services.update') }}" method="post">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="id" name="id">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="name" class="form-label">Tên</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="nhập tên...">
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label class="form-label">Trạng thái</label>
                                                            <select name="status" class="form-control" id="status">
                                                                @foreach ($serviceStatus as $status)
                                                                    <option value="{{ $status->value }}">
                                                                        {{ $status->label() }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('status')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="price" class="form-label">Giá</label>
                                                            <input type="text" class="form-control" id="price"
                                                                name="price" placeholder="nhập giá...">
                                                            @error('price')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="brand_id" class="form-label">Thương hiệu</label>
                                                            <select name="brand_id" class="form-control" id="brand_id">
                                                                @foreach ($brands as $brand)
                                                                    <option value="{{ $brand->id }}">
                                                                        {{ $brand->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('brand_id')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="description" class="form-label">Nội dung</label>
                                                            <textarea class="form-control" id="description" name="description" placeholder="nhập nội dung..." rows="5"></textarea>
                                                            @error('description')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Hủy</button>
                                                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::edit service modal -->
                            </div>

                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered border-primary table-checkall">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tên</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Thương hiệu</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($services as $service)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td scope="row">
                                                    {{ $service->name }}
                                                </td>
                                                <td>
                                                    {{ number_format($service->price, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    {{ $service->brand->name }}
                                                </td>
                                                <td>
                                                    <span class="badge bg-success text-wihte">
                                                        {{ $service->status->label() }} </span>
                                                </td>
                                                <td>
                                                    {{ $service->description }}
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-icon btn-sm btn-primary btn-edit-service"
                                                        data-id="{{ $service->id }}" data-name="{{ $service->name }}"
                                                        data-price="{{ $service->price }}"
                                                        data-brand_id="{{ $service->brand_id }}"
                                                        data-status="{{ $service->status }}"
                                                        data-description="{{ $service->description }}" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <a href="{{ route('services.destroy', $service->id) }}"
                                                        class="btn btn-icon btn-sm btn-danger btn-delete">
                                                        <i data-id="{{ $service->id }}" class="ri-delete-bin-line"></i>
                                                    </a>
                                                </td>
                                                </td>
                                            </tr>
                                        @empty
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
