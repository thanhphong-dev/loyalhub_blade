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
                                        class="ri-team-line me-1 fs-15"></i>  {{ __('view.customers.name_customer') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">  {{ __('view.customers.list') }}</li>
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
                                {{ __('view.customers.list') }}
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row pd-0 mr-0 mb-2 align-items-center">
                                <div class="col-12 col-xl-3 mb-2 mb-xl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="tìm kiếm khách hàng..." aria-label="tìm kiếm khách hàng..."
                                            aria-describedby="button-addon1">
                                        <button class="btn btn-primary btn-wave" type="button" id="button-addon1">
                                            {{ __('view.button.search') }}
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-9 text-xl-end text-start">
                                    <button class="btn btn-sm btn-primary btn-wave waves-light" data-bs-toggle="modal"
                                        data-bs-target="#create-customer">
                                        <i class="ri-add-line fw-medium align-middle me-1"></i>
                                        {{ __('view.customers.name_customer') }}
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
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('customers.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="name"
                                                                class="form-label">{{ __('view.customers.name') }}</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ old('name') }}"
                                                                placeholder="{{ __('view.customers.placeholder.name') }}">
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label
                                                                class="form-label">{{ __('view.customers.type') }}</label>
                                                            <select name="type" class="form-control" id="type">
                                                                @foreach ($customerType as $type)
                                                                    <option value="{{ $type->value }}">
                                                                        {{ $type->lable() }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('type')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="email"
                                                                class="form-label">{{ __('view.customers.email') }}</label>
                                                            <input type="text" class="form-control" id="email"
                                                                name="email" value="{{ old('email') }}"
                                                                placeholder="{{ __('view.customers.placeholder.email') }}">
                                                            @error('email')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="phone"
                                                                class="form-label">{{ __('view.customers.phone') }}</label>
                                                            <input type="text" class="form-control" id="phone"
                                                                name="phone" value="{{ old('phone') }}"
                                                                placeholder="{{ __('view.customers.placeholder.phone') }}">
                                                            @error('phone')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="address"
                                                                class="form-label">{{ __('view.customers.address') }}</label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="address" value="{{ old('address') }}"
                                                                placeholder="{{ __('view.customers.placeholder.address') }}">
                                                            @error('address')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="website"
                                                                class="form-label">{{ __('view.customers.website') }}</label>
                                                            <input class="form-control" id="website" name="website"
                                                                value="{{ old('website') }}"
                                                                placeholder="nhập website..."></input>
                                                            @error('website')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="notes"
                                                                class="form-label">{{ __('view.customers.notes') }}</label>
                                                            <textarea class="form-control" id="notes" name="notes" value="{{ old('note') }}"
                                                                placeholder="{{ __('view.customers.placeholder.notes') }}" rows="5"></textarea>
                                                            @error('notes')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="logo"
                                                                class="form-label">{{ __('view.customers.logo') }}</label>
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
                                                    <button type="submit" class="btn btn-primary">{{ __('view.button.confirm') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::add customer modal -->
                                <!-- Start::edit customer modal -->
                                <div class="modal modal-lg fade mr-0" id="editCustomerModal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.create') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('customers.update') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="id" name="id">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="name"
                                                                class="form-label">{{ __('view.customers.name') }}</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" value="{{ old('name') }}"
                                                                placeholder="{{ __('view.customers.placeholder.name') }}">
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label
                                                                class="form-label">{{ __('view.customers.type') }}</label>
                                                            <select name="type" class="form-control" id="type">
                                                                @foreach ($customerType as $type)
                                                                    <option value="{{ $type->value }}">
                                                                        {{ $type->lable() }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('type')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="email"
                                                                class="form-label">{{ __('view.customers.email') }}</label>
                                                            <input type="text" class="form-control" id="email"
                                                                name="email" value="{{ old('email') }}"
                                                                placeholder="{{ __('view.customers.placeholder.email') }}">
                                                            @error('email')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="phone"
                                                                class="form-label">{{ __('view.customers.phone') }}</label>
                                                            <input type="text" class="form-control" id="phone"
                                                                name="phone" value="{{ old('phone') }}"
                                                                placeholder="{{ __('view.customers.placeholder.phone') }}">
                                                            @error('phone')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="address"
                                                                class="form-label">{{ __('view.customers.address') }}</label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="address" value="{{ old('address') }}"
                                                                placeholder="{{ __('view.customers.placeholder.address') }}">
                                                            @error('address')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="website"
                                                                class="form-label">{{ __('view.customers.website') }}</label>
                                                            <input class="form-control" id="website" name="website"
                                                                value="{{ old('website') }}"
                                                                placeholder="{{ __('view.customers.placeholder.website') }}"></input>
                                                            @error('website')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="notes"
                                                                class="form-label">{{ __('view.customers.notes') }}</label>
                                                            <textarea class="form-control" id="notes" name="notes" value="{{ old('notes') }}"
                                                                placeholder="{{ __('view.customers.placeholder.notes') }}" rows="5"></textarea>
                                                            @error('notes')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="logo"
                                                                class="form-label">{{ __('view.customers.logo') }}</label>
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
                                                    <button type="submit" class="btn btn-primary">{{ __('view.button.confirm') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End::edit customer modal -->
                                <!-- Start::add customer service modal -->
                                <div class="modal modal-lg fade mr-0" id="editCustomerServiceModal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.service') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('customer_services.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="customer_id" name="customer_id">
                                                        <div class="col-12">
                                                            <label
                                                                class="form-label">{{ __('view.customer_services.name') }}</label>
                                                            <select name="service_id" class="form-control"
                                                                id="service_id">
                                                                @foreach ($services as $service)
                                                                    <option value="{{ $service->id }}">
                                                                        {{ $service->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('service_id')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label
                                                                class="form-label">{{ __('view.customer_services.start_date') }}</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text text-muted"> <i
                                                                        class="ri-calendar-line"></i> </div>
                                                                <input type="text" class="form-control"
                                                                    id="start_date" name="start_date"
                                                                    placeholder="ngày bắt đầu...">
                                                            </div>
                                                            @error('start_date')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label
                                                                class="form-label">{{ __('view.customer_services.end_date') }}</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text text-muted"> <i
                                                                        class="ri-calendar-line"></i> </div>
                                                                <input type="text" class="form-control" id="end_date"
                                                                    name="end_date" placeholder="ngày kết thúc...">
                                                            </div>
                                                            @error('end_date')
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
                                <!-- End::add customer service modal -->
                            </div>

                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered border-primary table-checkall mb-2">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('view.customers.logo') }}</th>
                                            <th scope="col">{{ __('view.customers.name') }}</th>
                                            <th scope="col">{{ __('view.customers.email') }}</th>
                                            <th scope="col">{{ __('view.customers.phone') }}</th>
                                            <th scope="col">{{ __('view.customers.address') }}</th>
                                            <th scope="col">{{ __('view.customers.website') }}</th>
                                            <th scope="col">{{ __('view.customers.type') }}</th>
                                            <th scope="col">{{ __('view.customers.notes') }}</th>
                                            <th scope="col">{{ __('view.button.function') }}</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customers as $customer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img class="avatar avatar-xl p-1"
                                                        src="{{ $customer->logo != null ? asset('storage/' . $customer->logo) : asset('images/icon/icon-customer.png') }}" />
                                                </td>
                                                <td>
                                                    {{ $customer->name }}
                                                </td>
                                                <td>
                                                    {{ $customer->email ? $customer->email : 'null' }}
                                                </td>
                                                <td>
                                                    {{ $customer->phone ? $customer->phone : 'null' }}

                                                </td>
                                                <td>
                                                    {{ $customer->address ? $customer->address : 'null' }}

                                                </td>
                                                <td>
                                                    {{ $customer->website ? $customer->website : 'null' }}

                                                </td>
                                                <td>
                                                    @if ($customer->type->value == 0)
                                                        <span class="badge bg-primary text-white">
                                                            {{ $customer->type->lable() }}
                                                        </span>
                                                    @else
                                                        <span class="badge bg-danger text-white">
                                                            {{ $customer->type->lable() }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $customer->notes ? $customer->notes : 'null' }}
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-icon btn-sm btn-primary btn-edit-customer"
                                                        data-id="{{ $customer->id }}" data-name="{{ $customer->name }}"
                                                        data-email="{{ $customer->email }}"
                                                        data-phone="{{ $customer->phone }}"
                                                        data-address="{{ $customer->address }}"
                                                        data-description="{{ $customer->description }}"
                                                        data-website="{{ $customer->website }}"
                                                        data-logo="{{ $customer->logo }}"
                                                        data-notes="{{ $customer->notes }}"
                                                        data-type="{{ $customer->type }}" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <button class="btn btn-icon btn-sm btn-success btn-customer-service"
                                                        data-id="{{ $customer->id }}" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="ri-skype-line"></i>
                                                    </button>

                                                    <a href="{{ route('customers.destroy', $customer->id) }}"
                                                        class="btn btn-icon btn-sm btn-danger btn-delete">
                                                        <i data-id="{{ $customer->id }}" class="ri-delete-bin-line"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10">{{ __('view.data.nullable') }}</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                 {{ $customers->links('pagination::bootstrap-5') }}
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
