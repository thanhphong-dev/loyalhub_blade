@extends('layouts.main')

@section('content')
    <section class="main_containt_details">
        <div class="container group_content_app_details">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="row group_top">
                        <div class="col-lg-4 col-12 group_thumbnail_app">
                            <img class="" src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->slug }}">
                        </div>
                        <div class="col-lg-8 col-12 group_details_app">
                            <div class="top">
                                <p><strong class="title_app">{{ $post->title }}</strong></p>
                                <p class="group_cate_app">
                                    <span>Wind Lập Trình</span>
                                    <span>
                                        <a href="{{ route('client_work.index') }}">
                                            Thương hiệu tiêu biểu
                                        </a>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row group_bottom">
                        <div class="pro-thumb col-lg-12 col-12">
                            {{-- slider img  --}}
                            <div class="slick-slide img">
                                <img class="slider_img" src="{{ asset('storage/' . $post->thumbnail) }}"
                                    alt="{{ $post->slug }}" title="{{ $post->slug }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fv-content col-lg-12 col-12">
                            {!! $post->content !!}
                        </div>
                    </div>


                </div>
                <div class="col-lg-4 col-12 group_app_featured">
                    <p class="title_app_featured">Khách hàng nổi bật</p>
                    <div class="bor-box-related lpost-box">
                        @foreach ($customersOutStandings as $customersOutStanding)
                            <div class="sb-post clearfix sb-post-related">
                            <a class="img hv-scale" href="{{ route('client_work.detail', $customersOutStanding->slug) }}" title="{{ $customersOutStanding->slug }}">
                                <img src="{{ asset('storage/'. $customersOutStanding->thumbnail) }}" alt="{{ $customersOutStanding->slug }}">
                            </a>
                            <div class="ct">
                                <h3 class="title"><a class="smooth" href="{{ route('client_work.detail', $customersOutStanding->slug) }}"
                                        title="">{{ $customersOutStanding->title }}</a></h3>
                                <p>{{ \Illuminate\Support\Str::words($customersOutStanding->description, 20, '...') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="container group_product_app_related">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <hr>
                    <p>Xem thêm các khách hàng tiêu biểu khác</p>
                </div>
            </div>
        </div>
    </section>
    <section class="group_app h-apps h-apps-details">
        <div class="container group_app_in_details">
            <div class="row wrap_list_app">
                @foreach ($getAlls as $getAll)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12 item">
                        <div class="apps-item">
                            <a class="cnv-img-4x3" aria-label="text"
                                href="{{ route('client_work.detail', $getAll->slug) }}">
                                <img class="apps-img lazy" data-src="{{ asset('storage/' . $getAll->thumbnail) }}"
                                    alt="{{ $getAll->slug }}" title="{{ $getAll->slug }}">
                            </a>
                            <div class="title">
                                <a href="{{ route('client_work.detail', $getAll->slug) }}"
                                    class="article-title">{{ $getAll->title }}</a>
                            </div>
                            <div class="description">
                                {{ $getAll->description }}
                            </div>
                            <div class="continue">
                                <a href="{{ route('client_work.detail', $getAll->slug) }}" class="article-title"
                                    title="">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="col-lg-12 d-flex justify-content-center pagination_view">
                    {{ $getAlls->links('pagination::bootstrap-4') }}
                </div>
            </div>

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
                            <img class="lazy" data-src="{{ asset('storage/'.$customer->logo) }}">
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
