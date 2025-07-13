@extends('layouts.main')

@section('content')
    <section class="banner_post">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h3 class="title_banner_post">Đội ngủ Lập Trình GenZ</h3>
                    <h3 class="title_big_banner_post">Tin tức</h3>
                    <p class="description">
                        Chuyên trang blog và tin tức mới nhất từ Wind Lập Trình, chia sẻ kinh nghiệm, giải pháp công nghệ
                        cho doanh nghiệp như
                        CRM, ERP, giải pháp bán hàng...
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
                            <a class="smooth" href="#" title=""><img class="icon_home_post"
                                    src="{{ asset('images/icon/home.png') }}" alt=""></a>
                            <a class="smooth" href="{{ route('news.index') }}" title="">Tin tức &amp; Blog</a>
                            <a class="smooth" href="{{ route('client_work.index') }}" title="">Client Works điển
                                hình</a>
                            <a class="smooth" href="{{ route('tech.index') }}" title="">Bảng tin Công nghệ</a>
                        </div>
                        <div class="nav-cas-mobile owl-carousel d-lg-none">
                            <div class="item">
                                <a class="smooth" href="{{ url('/') }}" title="">Trang chủ</a>
                            </div>
                            <div class="item">
                                <a class="smooth" href="{{ route('news.index') }}" title="">Tin tức &amp; Blog</a>
                            </div>
                            <div class="item">
                                <a class="smooth" href="{{ route('client_work.index') }}" title="">Client Works điển
                                    hình</a>
                            </div>
                            <div class="item">
                                <a class="smooth" href="{{ route('tech.index') }}" title="">Bảng tin Công nghệ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 clearfix">
                <div class="row">
                    <div class="post2 col-lg-12 col-12 group_post_new group_post_big_new">
                        @foreach ($new_headers as $new_header)
                            <div class="item_post">
                                <a class="img hv-scale hv-over cnv-img-16x9"
                                    href="{{ route('news.detail', $new_header->slug) }}" title="">
                                    <img class="lazy" alt="{{ $new_header->slug }}" title="{{ $new_header->slug }}"
                                        data-src={{ asset('storage/' . $new_header->thumbnail) }}
                                        title="{{ $new_header->slug }}">
                                </a>

                                <div class="ct">
                                    <h2 class="title"><a class="smooth"
                                            href="{{ route('news.detail', $new_header->slug) }}"title="{{ $new_header->slug }}">{{ $new_header->title }}</a>
                                    </h2>
                                    <p>
                                        <span class="cate_post">{{ $new_header->category->name }}</span> - <span
                                            class="time_post">{{ $new_header->created_at->format('d/m/Y') }}</span>
                                    </p>
                                    <div class="des">
                                        {{ $new_header->description }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @foreach ($new_bodys as $new_body)
                        <div class="post2 col-lg-6 col-12 group_post_new">
                            <div class="item_post">
                                <a class="img hv-scale hv-over cnv-img-3x2"
                                    href="{{ route('news.detail', $new_body->slug) }}" title="">
                                    <img class="lazy" alt="{{ $new_body->slug }}" title="{{ $new_body->slug }}"
                                        data-src="{{ 'storage/' . $new_body->thumbnail }}" title="{{ $new_body->slug }}">
                                </a>
                                <div class="ct">
                                    <h2 class="title">
                                        <a class="smooth" href="{{ route('news.detail', $new_body->slug) }}"
                                            title="{{ $new_body->slug }}">{{ $new_body->title }}</a>
                                    </h2>
                                    <p>
                                        <span class="cate_post">{{ $new_body->category->name }}</span> - <span
                                            class="time_post">{{ $new_body->created_at->format('d/m/Y') }}</span>
                                    </p>
                                    <div class="des">
                                        {{ $new_body->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-12 clearfix text-center">
                        {{ $new_bodys->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bor-box">
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fwindlaptrinh.official&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                </div>
                <div class="sidebar sidebar_group_post">
                    <div class="feature articles bor-box">
                        <h3 class="header upper">Bài viết nổi bật</h3>
                        @foreach ($post_outstandings as $post_outstanding)
                            <div class="article">
                                <div class="metatype">
                                    <a href="{{ route('news.detail', $post_outstanding->slug) }}" class="__ap_processed">
                                        {{ $post_outstanding->title }}
                                    </a>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <span class="since">{{ $post_outstanding->created_at->format('d/m/Y') }}</span>
                                </div>
                                <a href="{{ route('news.detail', $post_outstanding->slug) }}"
                                    target=""class="header __ap_processed">
                                    {{ $post_outstanding->description }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <img class="lazy" data-src="{{ 'storage/' . $customer->logo }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="customers_partner customers_partner_mobile">
                @foreach ($customers as $customer)
                    <div class="item">
                        <a href="#"><img class="lazy" data-src="{{ 'storage/' . $customer->logo }}"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
