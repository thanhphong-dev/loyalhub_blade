@extends('layouts.auth')

@section('content')

    <div class="container d-flex justify-content-center align-items-center min-vh-100 " style="width: 1000px; margin: 0 auto">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #513da8; padding: 68px 0px">
                <div class="featured-image mb-3">
                    <img src="{{ asset('images/app/login.png') }}" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                   Loyal Hub
                </p>
                <small class="text-white text-wrap text-center text-contact"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">
                    Tự động hóa quy trình chăm sóc khách hàng
                </small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Hello, Employee</h2>
                        <p>Nhập thông tin cá nhân của bạn để đăng nhập vào trang quản lý khách hàng. Chúc bạn có một ngày
                            làm việc vui vẻ.</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="mb-3 col-12">
                                <input id="email" type="email"
                                    class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror"
                                    name="email" placeholder="Nhập email của bạn..." value="{{ old('email') }}" required
                                    autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class=" mb-3 col-12">
                                <input id="password" type="password"
                                    class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror"
                                    name="password" placeholder="Nhập mật khẩu..." required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12 forgot">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lưu mật khẩu') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="input-group mb-3 col-12">
                                <button type="submit" class="btn btn-lg btn-purple text-white w-100 fs-6">
                                    {{ __('Đăng nhập') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link forgot-password" href="{{ route('password.request') }}">
                                    {{ __('Quên mật khẩu?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
