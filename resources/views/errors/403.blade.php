@extends('layouts.app')

@section('content')
    <div class="main-content app-content">
        <div class="container-fluid mb-4 ">
            <div class="page error-bg" id="particles-js">
                <div class="row authentication coming-soon justify-content-center g-0 my-auto">
                    <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-7 col-sm-9 col-11 my-auto">
                        <div class="rounded">
                            <div class="bg-white p-5 error-img text-center rounded">
                                <div class="row align-items-center mx-0 g-0">
                                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="row align-items-center justify-content-center text-center h-100">
                                            <div class="col-xl-10 col-lg-10 col-md-12 col-12">
                                                <p class="error-text mb-4">{{ __("view.errors.403.notification") }}</p>
                                                <p class="fs-5  fw-medium mb-2">
                                                    {{ __("view.errors.403.title") }},
                                                    {{ Auth::user()->full_name }}
                                                </p>
                                                <p class="fs-15 mb-4 text-muted">
                                                    {{ __("view.errors.403.message") }}
                                                </p>
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
    </div>
@endsection
