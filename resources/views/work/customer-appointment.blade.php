@extends('layouts.app');

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
                                        {{ __('view.sidebar.module.work') }}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ __('view.sidebar.menu.customer_appointments') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">{{ __('view.sidebar.menu.customer_appointments') }}</div>
                        </div>
                        <div class="card-body">
                            <div id='calendar-appointment'></div>
                        </div>
                    </div>
                </div>
            </div>
            @include('work.appointment-upsert-modal')
        </div>
    </div>
    @push('page-scripts')
        <script>
            const getFailure = "{{ __('view.api.get.failure') }}";
            const notyfCreateSuccess = "{{ __('view.notyf.create') }}"
            const getNotification = "{{ __('view.notyf.notification') }}"
            const getConfirm = "{{ __('view.notyf.confirm') }}"
            const getMessSuccess = "{{ __('view.notyf.delete') }}"
            const getMessError = "{{ __('view.notyf.error') }}"
            const btnSubmit = "{{ __('view.notyf.btn_confirm') }}"
            const btnCancel = "{{ __('view.notyf.btn_cancel') }}"
            const notyfErrorCreateSchedule = "{{ __('view.notyf.error_create_schedule') }}"
            const notyfErrorUpdateSchedule = "{{ __('view.notyf.error_update_schedule') }}"
        </script>
        @vite(['resources/js/pages/work/date.js', 'resources/js/pages/work/customer-appointment.js'])
    @endpush
@endsection
