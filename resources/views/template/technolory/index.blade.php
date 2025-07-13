@extends('layouts.main')

@section('content')
    <section class="banner_post">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <h3 class="title_banner_post">Đội ngủ Lập Trình GenZ</h3>
                    <h3 class="title_big_banner_post">Bảng tin Công nghệ</h3>
                    <p class="description">
                        Góc chia sẻ công nghệ thực tiễn từ Wind Lập Trình – đồng hành cùng doanh nghiệp trong hành trình số hóa.
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
                            <a class="smooth" href="{{ route('client_work.index') }}" title="">Client Works điển hình</a>
                            <a class="smooth" href="{{ route('tech.index') }}" title="">Bảng tin Công nghệ</a>
                        </div>
                        <div class="nav-cas-mobile owl-carousel d-lg-none">
                            <div class="item">
                                <a class="smooth" href="#" title="">Trang chủ</a>
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
                        @foreach ($tech_headers as $tech_header)
                            <div class="item_post">
                                <a class="img hv-scale hv-over cnv-img-16x9" href="{{ route('tech.detail', $tech_header->slug) }}" title="">
                                    <img class="lazy" alt="{{ $tech_header->slug }}" title="{{ $tech_header->slug }}"
                                        src="{{ asset('storage/' . $tech_header->thumbnail) }}"
                                        title="{{ $tech_header->slug }}">
                                </a>

                                <div class="ct">
                                    <h2 class="title"><a class="smooth" href="{{ route('tech.detail', $tech_header->slug) }}"title="{{ $tech_header->slug }}">{{ $tech_header->title }}</a>
                                    </h2>
                                    <p>
                                        <span class="cate_post">{{ $tech_header->category->name }}</span> - <span
                                            class="time_post">{{ $tech_header->created_at->format('d/m/Y') }}</span>
                                    </p>
                                    <div class="des">
                                        {{ $tech_header->description }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @foreach ($tech_bodys as $tech_body)
                        <div class="post2 col-lg-6 col-12 group_post_new">
                            <div class="item_post">
                                <a class="img hv-scale hv-over cnv-img-3x2" href="{{  route('tech.detail',  $tech_body->slug) }}" title="">
                                    <img class="lazy" alt="{{ $tech_body->slug }}" title="{{ $tech_body->slug }}"
                                         data-src="{{ 'storage/' . $tech_body->thumbnail }}" title="{{ $tech_body->slug }}">
                                </a>
                                <div class="ct">
                                    <h2 class="title">
                                        <a class="smooth" href="{{  route('tech.detail',  $tech_body->slug) }}"
                                            title="{{ $tech_body->slug }}">{{ $tech_body->title }}</a>
                                    </h2>
                                    <p>
                                        <span class="cate_post">{{ $tech_body->category->name }}</span> - <span
                                              class="time_post">{{ $tech_body->created_at->format('d/m/Y') }}</span>
                                    </p>
                                    <div class="des">
                                        {{ $tech_body->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="col-md-12 clearfix text-center">
                        {{ $tech_bodys->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bor-box">
                    <p><iframe width="100%" height="500" style="border: none; overflow: hidden;"
                            src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/profile.php?id=100083795057694&tabs=timeline&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                            scrolling="no" frameborder="0" allowfullscreen="allowfullscreen"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                    </p>
                </div>
                <div class="sidebar sidebar_group_post">
                    <div class="feature articles bor-box">
                        <h3 class="header upper">Bài viết nổi bật</h3>
                        @foreach ($post_outstandings as $post_outstanding)
                            <div class="article">
                                <div class="metatype">
                                    <a href="{{  route('tech.detail', $post_outstanding->slug) }}" class="__ap_processed">
                                        {{ $post_outstanding->title }}
                                    </a>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <span class="since">{{ $post_outstanding->created_at->format('d/m/Y') }}</span>
                                </div>
                                <a href="{{  route('tech.detail', $post_outstanding->slug) }}" target=""class="header __ap_processed">
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
