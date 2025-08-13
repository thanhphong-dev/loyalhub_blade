@extends('layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid">
            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <div class="">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0);">
                                        <i class="ri-draft-line me-1 fs-15"></i>
                                        {{ __('view.task.module') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ __('view.task.list') }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-sm-flex gap-3 mb-4">
                                <div class="input-group mb-2 mb-sm-0">
                                    <input type="text" class="form-control" placeholder="{{ __('view.task.search') }}"
                                        aria-describedby="button-addon2">
                                    <button class="btn btn-light border" type="submit">
                                        {{ __('view.button.search') }}
                                    </button>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-purple me-2 text-nowrap" data-bs-toggle="modal"
                                    data-bs-target="#add-board">
                                    <i class="ri-add-line me-1 fw-medium align-middle"></i>
                                    {{ __('view.task.module') }}
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-12">
                                    <div class="card custom-card border shadow-none mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3 flex-wrap">
                                                <div>
                                                    <span class="avatar avatar-md bg-primary">
                                                        <i class="ri-briefcase-line fs-18"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block mb-2">{{ __('view.task.pending') }}</span>
                                                    <h5 class="fw-semibold mb-2 lh-1">32 <span
                                                            class="text-success fw-semibold fs-12"><i
                                                                class="ti ti-arrow-narrow-up"></i>0.19%</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-12">
                                    <div class="card custom-card border shadow-none mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3 flex-wrap">
                                                <div>
                                                    <span class="avatar avatar-md bg-warning">
                                                        <i class="ri-briefcase-line fs-18"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block mb-2">
                                                        {{ __('view.task.in_progress') }}
                                                    </span>
                                                    <h5 class="fw-semibold mb-2 lh-1">43 <span
                                                            class="text-success fw-semibold fs-12"><i
                                                                class="ti ti-arrow-narrow-up"></i>0.29%</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-12">
                                    <div class="card custom-card border shadow-none mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3 flex-wrap">
                                                <div>
                                                    <span class="avatar avatar-md bg-success">
                                                        <i class="ri-briefcase-line fs-18"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block mb-2">
                                                        {{ __('view.task.completed') }}
                                                    </span>
                                                    <h5 class="fw-semibold mb-2 lh-1">26 <span
                                                            class="text-success fw-semibold fs-12"><i
                                                                class="ti ti-arrow-narrow-up"></i>0.54%</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-12">
                                    <div class="card custom-card border shadow-none mb-0">
                                        <div class="card-body">
                                            <div class="d-flex align-items-start gap-3 flex-wrap">
                                                <div>
                                                    <span class="avatar avatar-md bg-danger">
                                                        <i class="ri-briefcase-line fs-18"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <span class="d-block mb-2">
                                                        {{ __('view.task.overdue') }}
                                                    </span>
                                                    <h5 class="fw-semibold mb-2 lh-1">52 <span
                                                            class="text-danger fw-semibold fs-12"><i
                                                                class="ti ti-arrow-narrow-down"></i>0.16%</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ZYNIX-kanban-board">
                <div class="kanban-tasks-type new p-0 border bg-white rounded">
                    <div class="mb-3 p-3 pb-0">
                        <div
                            class="d-flex justify-content-between align-items-center p-2 border border-primary border-opacity-25 rounded">
                            <span class="d-block fw-medium fs-14">
                                <input class="form-check-input me-2" type="checkbox" value="" id="primaryChecked" readonly
                                    checked style="pointer-events: none;">
                                {{ __('view.task.pending') }}
                            </span>
                        </div>
                    </div>
                    <div class="p-3 pt-0 scroll-bar-modal" id="new-tasks">
                        <div class="kanban-tasks">
                            <div id="new-tasks-draggable" data-view-btn="new-tasks">
                                <div class="card custom-card">
                                    <div class="card-body p-0">
                                        <div class="p-3 kanban-board-head">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="task-badges"><span class="badge">#SPK123</span><span
                                                        class="ms-1 badge">UI/UX</span></div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);"
                                                        class="btn btn-icon btn-sm outline" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="kanban-content mt-2 mb-2">
                                                <h6 class="fw-medium mb-1 fs-15">New Dashboard design.</h6>
                                                <div class="kanban-task-description">Lorem ipsum dolor sit amet
                                                    consectetur adipisicing elit, Nulla soluta consectetur sit amet elit
                                                    dolor sit amet.</div>
                                            </div>
                                            <div class="mb-3">
                                                <p class="fs-13 fw-medium mb-2 text-muted">Sub Task<span
                                                        class="float-end fs-13 fw-normal">2/14</span></p>
                                                <div class="progress progress-xs mb-0" role="progressbar"
                                                    aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar progress-bar-striped" style="width: 55%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <div class="d-grid mt-3">
                            <button class="btn btn-primary-light btn-wave">
                                {{ __('view.button.show_all') }}
                            </button>
                        </div>
                    </div>

                </div>
                <div class="kanban-tasks-type todo border bg-white rounded">
                    <div class="mb-3 p-3 pb-0">
                        <div
                            class="d-flex justify-content-between align-items-center p-2 bg-white border border-secondary border-dashed border-opacity-25 rounded">
                            <span class="d-block fw-medium fs-14"><input
                                    class="form-check-input form-checked-secondary me-2" type="checkbox" value=""
                                    id="secondaryChecked" checked style="pointer-events: none;">
                                {{ __('view.task.in_progress') }}
                            </span>
                        </div>
                    </div>
                    <div class="p-3 pt-0 scroll-bar-modal" id="todo-tasks">
                        <div class="kanban-tasks">
                            <div id="todo-tasks-draggable" data-view-btn="todo-tasks">
                                <div class="card custom-card">
                                    <div class="card-body p-0">
                                        <div class="p-3 kanban-board-head">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="task-badges"><span class="badge">#SPK107</span><span
                                                        class="ms-1 badge">Admin</span><span
                                                        class="ms-1 badge">Authentication</span>
                                                </div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);"
                                                        class="btn btn-icon btn-sm outline" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="kanban-content mt-2 mb-3">
                                                <h6 class="fw-medium mb-1 fs-15">Adding Authentication Pages.</h6>
                                                <div class="kanban-task-description">Lorem ipsum dolor sit amet
                                                    consectetur adipisicing elit. Nulla soluta </div>
                                            </div>
                                            <div class="mb-3">
                                                <p class="fs-13 fw-medium mb-2 text-muted">Sub Task<span
                                                        class="float-end fs-13 fw-normal">03/45</span></p>
                                                <div class="progress progress-xs mb-0" role="progressbar"
                                                    aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar progress-bar-striped" style="width: 35%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <div class="d-grid mt-3">
                            <button class="btn btn-orange-light btn-wave">
                                {{ __("view.button.show_all") }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="kanban-tasks-type completed border bg-white rounded">
                    <div class="mb-3 p-3 pb-0">
                        <div
                            class="d-flex justify-content-between align-items-center p-2 bg-white border border-success border-opacity-25 rounded">
                            <span class="d-block fw-medium fs-15"><input
                                    class="form-check-input form-checked-success me-2" type="checkbox" value=""
                                    id="secondaryChecked3" checked style="pointer-events: none;">
                                {{ __("view.task.completed") }}
                                </span>
                        </div>
                    </div>
                    <div class="p-3 pt-0 scroll-bar-modal" id="completed-tasks">
                        <div class="kanban-tasks">
                            <div id="completed-tasks-draggable" data-view-btn="completed-tasks">
                                <div class="card custom-card">
                                    <div class="card-body p-0">
                                        <div class="p-3 kanban-board-head">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="task-badges"><span class="badge">#SPK04</span><span
                                                        class="ms-1 badge">UI/UX</span></div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);"
                                                        class="btn btn-icon btn-sm outline" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="kanban-content mt-2 mb-3">
                                                <h6 class="fw-medium mb-1 fs-15 ">Sash project update.</h6>
                                                <div class="kanban-task-description">Lorem ipsum dolor sit amet
                                                    consectetur adipisicing elit. Nulla soluta </div>
                                            </div>
                                            <div class="mb-3">
                                                <p class="fs-13 fw-medium mb-2 text-muted">Sub Task<span
                                                        class="float-end fs-13 fw-normal">13/16</span></p>
                                                <div class="progress progress-xs mb-0" role="progressbar"
                                                    aria-valuenow="56" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar progress-bar-striped" style="width: 56%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <div class="d-grid mt-3">
                            <button class="btn btn-success-light btn-wave">
                                {{ __("view.button.show_all") }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="kanban-tasks-type inreview border bg-white rounded">
                    <div class="mb-3 p-3 pb-0">
                        <div
                            class="d-flex justify-content-between align-items-center p-2 bg-white border border-danger border-opacity-25 rounded">
                            <span class="d-block fw-medium fs-15"><input class="form-check-input form-checked-danger me-2"
                                    type="checkbox" value="" id="secondaryChecked2" checked style="pointer-events: none;">
                                {{ __("view.task.overdue") }}
                            </span>
                        </div>
                    </div>
                    <div class="p-3 pt-0 scroll-bar-modal" id="inreview-tasks">
                        <div class="kanban-tasks">
                            <div id="inreview-tasks-draggable" data-view-btn="inreview-tasks">
                                <div class="card custom-card">
                                    <div class="card-body p-0">
                                        <div class="p-3 kanban-board-head">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="task-badges"><span class="badge">#SPK15</span><span
                                                        class="ms-1 badge">Review</span></div>
                                                <div class="dropdown">
                                                    <a aria-label="anchor" href="javascript:void(0);"
                                                        class="btn btn-icon btn-sm outline" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-eye-line me-1 align-middle d-inline-block"></i>View</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-delete-bin-line me-1 align-middle d-inline-block"></i>Delete</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-edit-line me-1 align-middle d-inline-block"></i>Edit</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="kanban-content mt-2 mb-3">
                                                <h6 class="fw-medium mb-1 fs-15 ">Sash project update.</h6>
                                                <div class="kanban-task-description">Lorem ipsum dolor sit amet
                                                    consectetur adipisicing elit. Nulla soluta </div>
                                            </div>
                                            <div class="mb-3">
                                                <p class="fs-13 fw-medium mb-2 text-muted">Sub Task<span
                                                        class="float-end fs-13 fw-normal">15/16</span></p>
                                                <div class="progress progress-xs mb-0" role="progressbar"
                                                    aria-valuenow="48" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-bar progress-bar-striped" style="width: 48%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-3 pt-0">
                        <div class="d-grid mt-3">
                            <button class="btn btn-danger-light btn-wave">
                                {{ __("view.button.show_all") }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
