@extends('layouts.main')

@section('content')
    <div class="banner">
        <img src="{{ asset('assets/images/storage/thum/zalo-app.png') }}" alt="">
    </div>



    <div class="container page_details_featured">
        <div class="headbox">
            <h2 class="title"><span>Giải pháp Zalo Mini App trọn gói tại Wind Lập Trình</span> <br></h2>
            <p>
                Tiếp cận hàng triệu khách hàng trên Zalo với Mini App thiết kế riêng cho doanh nghiệp.
                Từ bán hàng, đặt lịch đến chăm sóc khách hàng – tất cả gói gọn trong một giải pháp thông minh,
                dễ triển khai và chuẩn thương hiệu
            </p>
        </div>
    </div>
    <section class="feature">
        <div class="container">
            @foreach ($zalos as $zalo)
                <div class="row grid-feature">
                    @if ($loop->iteration % 2 == 1)
                        <div class="col-md-6 order2">
                            <div class="hv-scale">
                                <img src="{{ asset('storage/'. $zalo->thumbnail) }}" caption="false" width="570" height="503">
                            </div>
                        </div>
                        <div class="col-md-6 order1">
                            <div class="i-title">{{ $zalo->title }}</div>
                            <div class="desc">
                                <p>{{ $zalo->description }}</p>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6 order1">
                            <div class="i-title">{{ $zalo->title }}</div>
                            <div class="desc">
                                <p>{{ $zalo->description }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 order2">
                            <div class="hv-scale">
                                <img src="{{ asset('storage/'. $zalo->thumbnail) }}" caption="false" width="570" height="503">
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach

        </div>
    </section>

    <section class="banner-feature">
        <div class="container">
            <div class="head-title">
                Các tính năng khác
            </div>
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($banners as $banner)
                        <div class="swiper-slide">
                            <a href="#">
                                <img class="lazy"
                                     data-src="{{ asset('storage/'. $banner->url) }}"
                                     title="{{ $banner->slug }}" alt="{{ $banner->slug }}">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    @include('template.function.index');

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
                    <a href="{{ route('client_work.index') }}">
                        <img class="lazy" data-src="{{ asset('storage/'. $customer->logo) }}">
                    </a>
                </div>
                @endforeach
            </div>

            <div class="customers_partner customers_partner_mobile">
                @foreach ($customers as $customer)
                    <div class="item">
                    <a href="{{ route('client_work.index') }}">
                        <img class="lazy" data-src="{{ asset('storage/'. $customer->logo) }}">
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
