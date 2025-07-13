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
                            <a class="smooth" href="#" title=""><img class="icon_home_post"
                                    src={{ asset('images/icon/home.png') }} alt=""></a>
                            <a class="smooth" href="{{ route('news.index') }}" title="">Tin tức &amp; Blog</a>
                            <a class="smooth" href={{ route('client_work.index') }} title="">Doanh nghiệp nói về Wind</a>
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
                                <a class="smooth" href="{{ route('client_work.index') }}" title="">
                                    Doanh nghiệp nói về Wind
                                </a>
                            </div>

                            <div class="item">
                                <a class="smooth" href="{{ route('tech.index') }}" title="">
                                    Bảng tin Công nghệ
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single">
                    <h1 class="s-title">{{ $post->title }}</h1>
                    <time><i class="fa fa-calendar"></i>{{ $post->created_at->format('d/m/Y') }}</time>
                    <div class="fv-content">
                        <div class="kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q">
                            <div dir="auto"><span>{{ $post->description }}</span></div>
                        </div>
                        <div class="o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q">
                            <div dir="auto">
                                ️<span
                                    class="pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu">
                                    <img alt="{{ $post->slug }}" referrerpolicy="origin-when-cross-origin"
                                        src="{{ asset('storage/' . $post->thumbnail) }}"></span>
                            </div>
                        </div>
                        <div class="o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q">
                            <div dir="auto">{!! $post->content !!}</div>
                            <div dir="auto"></div>
                        </div>

                    </div>

                    <div class="s-social mb-2">
                        <span class="text">Chia sẻ:</span>
                        <div class="ctrl">
                            <ul class="cnv-social-icons list-inline">
                                <li class="list-inline-item"><a
                                        href="https://www.facebook.com/p/Wind-L%E1%BA%ADp-Tr%C3%ACnh-100083795057694/"
                                        onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;"
                                        class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="bor-box-related lpost-box">
                        @foreach ($tech_bodys as $tech_body)
                            <div class="sb-post clearfix sb-post-related pd-2">
                                <a class="img hv-scale" href="{{ route('tech.detail', $tech_body->slug) }}"
                                    title="{{ $tech_body->slug }}">
                                    <img class="lazy" data-src={{ asset('storage/' . $tech_body->thumbnail) }}
                                        alt="{{ $tech_body->slug }}">
                                </a>
                                <div class="ct mt-2 mr-2">
                                    <h3 class="title">
                                        <a class="smooth cate_related_post" href="{{ route('tech.detail', $tech_body->slug) }}"
                                            title="{{ $tech_body->slug }}">
                                            {{ $tech_body->title }}
                                        </a>
                                    </h3>
                                    <p>{!! $tech_body->description !!}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12 clearfix text-center">
                            {{ $tech_bodys->links('pagination::bootstrap-4') }}
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar sidebar_group_post">
                    <div class="bor-box">
                        <a href="../../ebooks/thu-vien-ebook.html"><img class="lazy"
                                data-src="/storage/banner-trang-trong/tai-mien-phi-ngay.png"></a>
                    </div>
                    <div class="bor-box">
                        <a href="../../collections/thuong-hieu-tieu-bieu.html"><img class="lazy"
                                data-src="/storage/banner-brand-tieu-bieu.jpg"></a>
                    </div>

                    <div class="bor-box">
                        <p><iframe width="100%" height="500" style="border: none; overflow: hidden;"
                                src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/profile.php?id=100083795057694&tabs=timeline&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                                scrolling="no" frameborder="0" allowfullscreen="allowfullscreen"
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </p>

                    </div>
                    <div class="feature articles bor-box">
                        <h3 class="header upper">Bài viết nổi bật</h3>
                        @foreach ($post_outstandings as $post_outstanding)
                            <div class="article">
                                <div class="metatype">
                                    <a href="chuc-mung-dookki-da-so-huu-app-cham-soc-khach-hang.html"
                                        class="__ap_processed">{{ $post_outstanding->title }}</a> <i class="fa fa-circle"
                                        aria-hidden="true"></i>
                                    <span class="since">{{ $post_outstanding->created_at->format('d/M/Y') }}</span>
                                </div>
                                <a href="chuc-mung-dookki-da-so-huu-app-cham-soc-khach-hang.html" target=""
                                    class="header __ap_processed">
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
                        <a href="blogs/case-study-dien-hinh.html">
                            <img class="lazy" data-src="{{ asset('storage/'. $customer->logo) }}">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="customers_partner customers_partner_mobile">
                @foreach ($customers as $customer)
                    <div class="item">
                        <a href="blogs/case-study-dien-hinh.html">
                            <img class="lazy" data-src="{{  asset('storage/'. $customer->logo) }}">
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
