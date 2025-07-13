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
                                    <h5>{{ __('view.button.notify') }}</h5>
                                    <p class="">{{ __('view.data.confirm_delete') }}</p>
                                    <div class="">
                                        <button class="btn btn-outline-dark m-1 btn-cancel-delete">{{ __('view.button.cancel') }}</button>
                                        <a href="#" id="confirmDelete"
                                            class="btn btn-danger btn-confirm-delete">{{ __('view.button.delete') }}</a>
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
                                        class="ri-draft-line me-1 fs-15"></i>{{ __('view.category_posts.post') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('view.category_posts.category') }}
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
                                {{ __('view.category_posts.category') }}
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row pd-0 mr-0 mb-2 align-items-center">
                                <div class="col-12 col-xl-3 mb-2 mb-xl-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm"
                                            placeholder="tìm kiếm danh mục..." aria-label="tìm kiếm danh mục..."
                                            aria-describedby="button-addon1">
                                        <button class="btn btn-primary btn-wave" type="button" id="button-addon1">
                                            {{ __('view.button.search') }}
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-9 text-xl-end text-start">
                                    <button class="btn btn-sm btn-primary btn-wave waves-light" data-bs-toggle="modal"
                                        data-bs-target="#create-category-post">
                                        <i class="ri-add-line fw-medium align-middle me-1"></i>
                                        {{ __('view.category_posts.category') }}
                                    </button>
                                </div>
                                <div class="modal modal-lg fade mr-0" id="create-category-post" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.create') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('category_posts.store') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="name"
                                                                class="form-label">{{ __(key: 'view.category_posts.name') }}</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="{{ __('view.enter.name') }}">
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label
                                                                class="form-label">{{ __('view.category_posts.category') }}</label>
                                                            <select name="parent_id" class="form-control" id="parent_id">
                                                                <option value="0">Không có</option>
                                                                @foreach ($category_posts as $category)
                                                                    @include(
                                                                        'admin.partials.category-option',
                                                                        [
                                                                            'category' => $category,
                                                                            'prefix' => '',
                                                                        ]
                                                                    )
                                                                @endforeach
                                                            </select>
                                                            @error('parent_id')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="note"
                                                                class="form-label">{{ __('view.category_posts.note') }}</label>
                                                            <textarea class="form-control" id="note" name="note" placeholder="{{ __('view.enter.note') }}"
                                                                rows="5"></textarea>
                                                            @error('note')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="image"
                                                                class="form-label">{{ __('view.category_posts.image') }}</label>
                                                            <input type="file" name="image" id="image"
                                                                class="form-control">
                                                            @error('image')
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
                                <div class="modal modal-lg fade mr-0" id="editCategoryPostModal" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title">{{ __('view.button.create') }}</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('category_posts.update') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body px-4">
                                                    <div class="row gy-2">
                                                        <input type="hidden" id="id" name="id">
                                                        <div class="col-xl-6 col-12">
                                                            <label for="name"
                                                                class="form-label">{{ __(key: 'view.category_posts.name') }}</label>
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="{{ __('view.enter.name') }}">
                                                            @error('name')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-6 col-12">
                                                            <label
                                                                class="form-label">{{ __('view.category_posts.category') }}</label>
                                                            <select name="parent_id" class="form-control" id="parent_id">
                                                                <option value="0">Không có</option>
                                                                @foreach ($category_posts as $category)
                                                                    @include(
                                                                        'admin.partials.category-option',
                                                                        [
                                                                            'category' => $category,
                                                                            'prefix' => '',
                                                                        ]
                                                                    )
                                                                @endforeach
                                                            </select>
                                                            @error('parent_id')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="note"
                                                                class="form-label">{{ __('view.category_posts.note') }}</label>
                                                            <textarea class="form-control" id="note" name="note" placeholder="{{ __('view.enter.note') }}"
                                                                rows="5"></textarea>
                                                            @error('note')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="image"
                                                                class="form-label">{{ __('view.category_posts.image') }}</label>
                                                            <input type="file" name="image" id="image"
                                                                class="form-control">
                                                            @error('image')
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
                            </div>

                            <div class="table-responsive">
                                <table class="table text-nowrap table-bordered border-primary table-checkall">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('view.category_posts.image') }}</th>
                                            <th scope="col">{{ __('view.category_posts.name') }}</th>
                                            <th scope="col">{{ __('view.category_posts.slug') }}</th>
                                            <th scope="col">{{ __('view.category_posts.note') }}</th>
                                            <th scope="col">{{ __('view.button.function') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img class="avatar avatar-xl p-1"
                                                        src="{{ $item->image !=null ?  asset('storage/'. $item->image) : asset('images/icon/icon-category.png') }}" />
                                                </td>
                                                <td>
                                                    <a href={{ $item->children->count() > 0 ? route('category_posts.sub_category', $item->id) : '#' }}
                                                        class="text-primary">{{ $item->name }}</a>
                                                </td>
                                                <td>
                                                    {{ $item->slug }}
                                                </td>
                                                <td>
                                                    {{ $item->note }}
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-icon btn-sm btn-primary btn-edit-category-post"
                                                        data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                        data-parent_id="{{ $item->parent_id }}"
                                                        data-note="{{ $item->note }}" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="ri-edit-line"></i>
                                                    </button>

                                                    <a href="{{ route('category_posts.destroy', $item->id) }}"
                                                        class="btn btn-icon btn-sm btn-danger btn-delete">
                                                        <i data-id="{{ $item->id }}" class="ri-delete-bin-line"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6"> {{ __('view.data.nullable') }}</td>
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
