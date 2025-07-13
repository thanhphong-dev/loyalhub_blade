@extends('layouts.main')

@section('content')
    <section class="banner_post">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h3 class="title_banner_post">Đội ngủ Lập Trình GenZ</h3>
                    <h3 class="title_big_banner_post">Solution - Thương mại điện tử</h3>
                    <p class="description">
                        Hiện đang có khoảng trên 40 doanh nghiệp sử dụng dịch vụ tại Wind Lập Trình
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
                            <a class="smooth" href="{{ url('/') }}" title=""><img class="icon_home_post"
                                    src={{ asset('images/icon/home.png') }} alt=""></a>
                            <a class="smooth" href="#" title="">Tin tức &amp; Blog</a>
                            <a class="smooth" href={{ url('/blog/brand') }} title="">Doanh nghiệp nói về Wind</a>
                            <a class="smooth" href="#" title="">Tài nguyên</a>
                        </div>
                        <div class="nav-cas-mobile owl-carousel d-lg-none">
                            <div class="item">
                                <a class="smooth" href="" title="">Trang chủ</a>
                            </div>
                            <div class="item">
                                <a class="smooth" href="" title="">Tin tức &amp; Blog</a>
                            </div>
                            <div class="item">
                                <a class="smooth" href="" title="">
                                    Doanh nghiệp nói về Wind
                                </a>
                            </div>

                            <div class="item">
                                <a class="smooth" href="" title="">
                                    Thư viện
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @yield('child-content')

    <section class="partner" id="khach-hang" data-animate-in="fadeIn">
        <div class="container">
            <div class="headbox">
                <h2 class="title">Hơn 60+ doanh nghiệp đã sử dụng Solution Marketing</h2>
                <p>
                    <span style="font-family: arial, helvetica, sans-serif;">
                        Để xây dựng thương hiệu hiệu quả, gia tăng doanh thu, đầy
                        đủ thông tin trên mọi nền tảng e-commerce
                    </span>
                </p>
            </div>
            <div class="customers_partner customers_partner_desktop">
                @foreach ($customers as $customer)
                    <div class="li">
                        <a href="#"><img class="lazy" data-src={{ asset('storage/' . $customer->logo) }}></a>

                    </div>
                @endforeach

            </div>

            <div class="customers_partner customers_partner_mobile">
                <div class="item">
                    <a href="#"><img class="lazy"
                            data-src={{ asset('images/logo/usanaillasvegas.png') }}></a>
                </div>
                @foreach ($customers as $customer)
                    <div class="item">
                        <a href="#"><img class="lazy"
                                data-src={{ asset('storage/'. $customer->logo) }}></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
