@extends('layouts.main')

@section('content')
    <div class="banner">
        <img src="{{ asset('assets/images/storage/thum/uu-dai.png') }}" alt="">
    </div>



    <div class="container page_details_featured">
        <div class="headbox">
            <h2 class="title"><span>Thiết kế Website chuyên nghiệp cho Brand của bạn</span> <br></h2>
            <p>
                Wind Lập Trình cung cấp dịch vụ thiết kế phần mềm theo quy trình riêng của doanh nghiệp,
                giúp bạn tối ưu vận hành, tiết kiệm chi phí và tăng hiệu suất làm việc
            </p>
        </div>
    </div>
    <section class="feature">
        <div class="container">
            @foreach ($websites as $website)
                <div class="row grid-feature">
                    @if ($loop->iteration % 2 == 1)
                        <div class="col-md-6 order2">
                            <div class="hv-scale">
                                <img src="{{ asset('storage/'. $website->thumbnail) }}" caption="false" width="570" height="503">
                            </div>
                        </div>
                        <div class="col-md-6 order1">
                            <div class="i-title">{{ $website->title }}</div>
                            <div class="desc">
                                <p>{{ $website->description }}</p>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6 order1">
                            <div class="i-title">{{ $website->title }}</div>
                            <div class="desc">
                                <p>{{ $website->description }}</p>
                            </div>
                        </div>
                        <div class="col-md-6 order2">
                            <div class="hv-scale">
                                <img src="{{ asset('storage/'. $website->thumbnail) }}" caption="false" width="570" height="503">
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
