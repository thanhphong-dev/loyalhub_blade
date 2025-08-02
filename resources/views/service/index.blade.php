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
                                    <i class="ri-shopping-bag-3-line me-1 fs-15"></i>
                                    {{ __('view.service.model') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('view.service.list') }}
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
                                {{ __('view.service.list') }}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row pd-0 mr-0 mb-2 align-items-center">
                                <div class="col-12 col-xl-3 mb-2 mb-xl-0">
                                    <form action="{{ route('services.index') }}" method="get">
                                        <div class="input-group">
                                            <input type="search" class="form-control form-control-sm" name='search'
                                                value="{{ request('search') }}"
                                                placeholder="{{ __('view.service.search_service') }}"
                                                aria-label="{{ __('view.service.search_service') }}"
                                                aria-describedby="button-addon1">
                                            <button class="btn btn-purple btn-wave" type="submit" id="search">
                                                {{ __('view.button.search') }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 col-xl-9 text-xl-end text-start">
                                    <button class="btn btn-sm btn-purple btn-wave waves-light" data-bs-toggle="modal"
                                        data-bs-target="#create-service">
                                        <i class="ri-add-line fw-medium align-middle me-1"></i>
                                        {{ __('view.service.model') }}
                                    </button>
                                </div>
                                <!-- Start::add services modal -->
                                <div class="modal modal-lg fade mr-0" id="create-service" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.create') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form id="create-service-form" action="{{ route('services.create') }}"
                                                method="post">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="name" class="form-label">
                                                                {{ __('view.service.name') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name"
                                                                placeholder="{{ __('view.placeholder.name') }}">
                                                            <small class="text-danger error-name"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="status" class="form-label">
                                                                {{ __('view.service.status') }}
                                                            </label>
                                                            <select name="status" class="form-control" id="status">
                                                                @foreach ($serviceStatus as $item)
                                                                    <option value="{{ $item->value }}">
                                                                        {{ $item->lable() }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-status"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="price" class="form-label">
                                                                {{ __('view.service.price') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="price"
                                                                name="price"
                                                                placeholder="{{ __('view.placeholder.price') }}">
                                                            <small class="text-danger error-price"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="category_id" class="form-label">
                                                                {{ __('view.service.category') }}
                                                            </label>
                                                            <select name="category_id" class="form-control"
                                                                id="category_id">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-category_id"></small>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="description"
                                                                class="form-label">{{ __('view.service.description') }}</label>
                                                            <textarea class="form-control" id="description" name="description" placeholder="nhập mô tả..." rows="5"></textarea>
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
                                <!-- End::add services modal -->

                                <!-- Start::update services modal -->
                                <div class="modal modal-lg fade mr-0" id="update-service" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.create') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <form id="update-service-form" action="{{ route('services.update') }}"
                                                method="post">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="edit-id" name="id">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="name" class="form-label">
                                                                {{ __('view.service.name') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="edit-name"
                                                                name="name"
                                                                placeholder="{{ __('view.placeholder.name') }}">
                                                            <small class="text-danger error-name"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="status" class="form-label">
                                                                {{ __('view.service.status') }}
                                                            </label>
                                                            <select name="status" class="form-control" id="edit-status">
                                                                @foreach ($serviceStatus as $item)
                                                                    <option value="{{ $item->value }}">
                                                                        {{ $item->lable() }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-status"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="price" class="form-label">
                                                                {{ __('view.service.price') }}
                                                            </label>
                                                            <input type="text" class="form-control" id="edit-price"
                                                                name="price"
                                                                placeholder="{{ __('view.placeholder.price') }}">
                                                            <small class="text-danger error-price"></small>
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label for="category_id" class="form-label">
                                                                {{ __('view.service.category') }}
                                                            </label>
                                                            <select name="category_id" class="form-control"
                                                                id="edit-category_id">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <small class="text-danger error-category_id"></small>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="description" class="form-label">
                                                                {{ __('view.service.description') }}
                                                            </label>
                                                            <textarea class="form-control" id="edit-description" name="description" placeholder="nhập mô tả..." rows="5"></textarea>
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
                                <!-- End::update services modal -->
                            </div>

                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered border-purple table-checkall">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('view.service.name') }}</th>
                                            <th scope="col">{{ __('view.service.price') }}</th>
                                            <th scope="col">{{ __('view.service.status') }}</th>
                                            <th scope="col">{{ __('view.service.category') }}</th>
                                            <th scope="col">{{ __('view.service.description') }}</th>
                                            <th scope="col">{{ __('view.button.function') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($services as $service)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $service->name }}</td>
                                                <td>
                                                    {{ $service->price ? number_format($service->price, 0, ',', '.') . ' ₫' : 'null' }}
                                                </td>
                                                <td>
                                                    <span class="badge bg-success text-white">
                                                        {{ $service->status->lable() }}
                                                    </span>
                                                </td>
                                                <td>{{ $service->category->name }}</td>
                                                <td>{{ $service->description ? $service->description : 'null' }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-icon btn-sm btn-purple btn-edit-service"
                                                        type="button" data-toggle="tooltip" data-placement="top"
                                                        data-service="{{ $service }}"
                                                        title="{{ __('view.button.update') }}">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <a href="javascript:void(0);"
                                                        data-url="{{ route('services.destroy', $service) }}"
                                                        title="{{ __('view.button.delete') }}"
                                                        class="btn btn-icon btn-sm btn-danger delete-service">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7">{{ __('view.data.null') }}</td>
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
        <script>
            const getNotification = "{{ __('view.notyf.notification') }}"
            const getConfirm = "{{ __('view.notyf.confirm') }}"
            const getMessSuccess = "{{ __('view.notyf.delete') }}"
            const getMessError = "{{ __('view.notyf.error') }}"
            const btnSubmit = "{{ __('view.notyf.btn_confirm') }}"
            const btnCancel = "{{ __('view.notyf.btn_cancel') }}"
        </script>
        @vite(['resources/js/pages/service/index.js'])
    @endpush
@endsection
