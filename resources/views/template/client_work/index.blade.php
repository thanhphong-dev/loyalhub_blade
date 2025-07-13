@extends('layouts.main')

@section('content')
    <section class="banner_post">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h3 class="title_banner_post">Đội ngủ Lập Trình GenZ</h3>
                    <h3 class="title_big_banner_post">Dự án tiêu biểu từ Wind Lập Trình</h3>
                    <p class="description">
                        Danh mục các dự án tiêu biểu Wind Lập Trình đã triển khai thành công. Với Mini App chăm sóc khách
                        hàng, các doanh nghiệp dễ dàng xây dựng tập khách hàng trung thành, nâng cao trải nghiệm và giảm chi
                        phí marketing.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="menu_post">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="nav-bar nav-bar-menu-post">

                        <div class="nav-tab">
                            <a class="smooth" href="/" title=""><img class="icon_home_post"
                                    src="{{ asset('images/icon/home.png') }}" alt=""></a>
                            <a class="smooth" href="{{ route('client_work.index') }}" title="">Tất cả</a>
                            @foreach ($categories as $category)
                                <a class="smooth" href="{{ route('client_work.category', $category->slug) }}"
                                    title="{{ $category->slug }}">{{ $category->name }}</a>
                            @endforeach

                        </div>
                        <div class="nav-cas-mobile owl-carousel d-lg-none">
                            <div class="item">
                                <a class="smooth" href="/" title="">Trang chủ</a>
                            </div>
                            <div class="item">
                                <a class="smooth" href="{{ route('client_work.index') }}" title="">Tất cả</a>
                            </div>
                            @foreach ($categories as $category)
                                <div class="item">
                                    <a class="smooth" href="{{ route('client_work.category', $category->slug) }}"
                                        title="{{ $category->slug }}">{{ $category->name }}</a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="group_app h-apps">
        <div class="container">
            @yield('all_projects')
        </div>
    </section>
    <section class="partner" id="khach-hang" data-animate-in="fadeIn">
        <div class="container">
            <div class="headbox">
                <h2 class="title">Hơn 60+ doanh nghiệp đã sử dụng Solution Marketing</h2>
                <p>
                    <span style="font-family: arial, helvetica, sans-serif;">
                        Để xây dựng thương hiệu hiệu quả, gia tăng
                        doanh thu, đầy đủ thông tin trên mọi nền tảng e-commerce
                    </span>
                </p>
            </div>
            <div class="customers_partner customers_partner_desktop">
                @foreach ($customers as $customer)
                    <div class="li">
                    <a href="#">
                        <img class="lazy" data-src="{{ asset('storage/'. $customer->logo) }}">
                    </a>
                </div>
                @endforeach
            </div>

            <div class="customers_partner customers_partner_mobile">
                @foreach ($customers as $customer)
                    <div class="item">
                        <a href="#">
                            <img class="lazy" data-src="{{ asset('storage/'. $customer->logo) }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
