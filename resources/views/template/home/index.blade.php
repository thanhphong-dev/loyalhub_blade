@extends('layouts.main')

@section('content')
    <section class="event_banner_area">
        <div class="parallax-effect"></div>
        <div class="container">
            <div class="row banner_main">
                <div class="container">
                    <div class="slider_header">
                        @foreach ($home_banners as $home_banner)
                            <div class="items">
                                <div class="row">
                                    <div class="col-lg-6 col-12 event_banner_content">
                                        <h6 class="">{{ $home_banner->title }}</h6>
                                        <h2 class="">{{ $home_banner->description }}</h2>
                                        <a class="event_btn btn_hover" data-toggle="modal" data-target="#informationForm"
                                            href="#information-form"><img src="{{ asset('images/icon/icon-phone.png') }}"
                                                alt="Đăng ký tư vấn">Đăng ký tư vấn
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <img class="img_bg_banner" src="{{ asset('storage/' . $home_banner->thumbnail) }}"
                                            alt="{{ $home_banner->slug }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="four_post_bottom_banner">
        <div class="container">
            <div class="row">
                @foreach ($home_services as $home_service)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6 item_post_featured_banner four_post_bottom_banner_desktop">
                        <div class="item">
                            <div class="img">
                                <img src="{{ asset('storage/' . $home_service->thumbnail) }}"
                                    alt="{{ $home_service->slug }}" title="{{ $home_service->slug }}">
                            </div>
                            <div class="ct">
                                <h3 class="title"><a class="smooth" href="#"
                                        title="{{ $home_service->slug }}">{{ $home_service->title }}</a></h3>
                                <p>{{ $home_service->description }}</p>
                                <a target="_self" class="smooth more" href="#nganh-hang"
                                    title="{{ $home_service->slug }}">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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
                @foreach ($customers as $customer)
                    <div class="item">
                        <a href="#"><img class="lazy" data-src={{ asset('storage/' . $customer->logo) }}></a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="you_choose_cnv">
        <div class="container">
            <div class="headbox">
                <h2 class="title">Lý do bạn nên chọn Wind Lập Trình</h2>
            </div>
            <div class="row">
                <div class="portfolio_choose_cnv">
                    <div class="img">
                        <a data-toggle="modal" data-target="#informationForm" href="#information-form"><img
                                src={{ asset('images/storyset/task.png') }} class="lazy" alt="" width="676"
                                height="598"></a>
                    </div>
                    <div class="items">
                        @foreach ($home_why_choose_uses as $home_why_choose_us)
                            <div class="item">
                                <h2>{{ $home_why_choose_us->title }}</h2>
                                <span>{{ $home_why_choose_us->description }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </section>

    <section class="app_nen_tang" id="app-nen-tang">
        <div class="container">
            <div class="headbox">
                <h2 class="title">E-commerce Solutions</h2>
                <p>Giải pháp toàn diện giúp doanh nghiệp phát triển ứng dụng web, Mini App và phần mềm quản lý khách hàng
                    hiệu quả.</p>
            </div>
            <div class="row">
                <div class="col-lg-9 offset-lg-3 group_tab_app_nen_tang">
                    <ul class="nav_app nav">
                        <li>
                            <a data-toggle="tab" class="smooth active" href="#tab1" title="">Website, Mini
                                App</a>
                        </li>

                        <li>
                            <a data-toggle="tab" class="smooth " href="#tab2" title="">Brand Tech</a>
                        </li>

                        <li>
                            <a data-toggle="tab" class="smooth " href="#tab3" title="">Sofware Manager</a>
                        </li>
                    </ul>
                </div>

                <div class="row group_content_he_sinh_thai">


                    <div class="col-lg-3 thumbnail_app">
                        <img src={{ asset('images/storyset/data.png') }} alt="">
                        <p class="title-solution-ecommerce">Giải pháp về thương mại điện tử</p>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content">
                            <div class="item_tab tab-pane fade active show" id="tab1">
                                <div class="row">
                                    <div class="col-lg-5 thumbnail_app_img">
                                        <img class="lazy" data-src={{ asset('images/solution/desgin-website.png') }}
                                            alt="">
                                    </div>
                                    <div class="col-lg-7 group_content_app">
                                        <div class="content">
                                            @foreach ($home_solution_ecommerce_web_apps as $home_solution_ecommerce_web_app)
                                                <p><img class="lazy"
                                                        data-src="{{ asset('images/icon/check.png') }}"alt="">
                                                    {{ $home_solution_ecommerce_web_app->title }}
                                                </p>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item_tab tab-pane fade" id="tab2">
                                <div class="row">
                                    <div class="col-lg-5 thumbnail_app_img">
                                        <img class="image-desgin-item" src={{ asset('images/solution/brand-tech.png') }}
                                            alt="">
                                    </div>
                                    <div class="col-lg-7 group_content_app">
                                        <div class="content">
                                            @foreach ($home_solution_ecommerce_brand_techs as $home_solution_ecommerce_brand_tech)
                                                <p><img class="lazy" data-src="{{ asset('images/icon/check.png') }}"
                                                        alt="">
                                                    {{ $home_solution_ecommerce_brand_tech->title }}
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item_tab tab-pane fade" id="tab3">
                                <div class="row">
                                    <div class="col-lg-5 thumbnail_app_img">
                                        <img src={{ asset('images/storyset/manager-sofware.png') }} alt="">
                                    </div>
                                    <div class="col-lg-7 group_content_app">
                                        <div class="content">
                                            @foreach ($home_solution_ecommerce_brand_sofwares as $home_solution_ecommerce_brand_sofware)
                                                <p><img class="lazy" data-src={{ asset('images/icon/check.png') }}
                                                        alt="">
                                                    {{ $home_solution_ecommerce_brand_sofware->title }}
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="service-wind" id="nganh-hang">
        <div class="container">
            <div class="headbox">
                <h2 class="title">Các Solution Service của Wind Lập Trình</h2>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav_app nav">
                        <li>
                            <a data-toggle="tab" class="smooth active" href="#app-nganh-retail" title="">
                                BranTech
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" class="smooth " href="#app-nganh-f-b" title="">
                                Website
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" class="smooth " href="#app-nganh-fitness" title="">
                                Sofware
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" class="smooth " href="#app-nganh-spa" title="">
                                Content Manager
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" class="smooth " href="#app-nganh-auto" title="">
                                SEO Google
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="tab-content">
                        <div class="item_tab tab-pane fade active show" id="app-nganh-retail">
                            <div class="row">
                                <div class="col-lg-5 thumbnail_app">
                                    <img class="lazy" data-src={{ asset('images/service/bran-tech.png') }}
                                        alt="">
                                </div>
                                <div class="col-lg-7 group_content_app">

                                    <h2 class="title_app">Giải pháp BrandTech áp dụng cho thương hiệu của bạn</h2>
                                    <div class="content">
                                        @foreach ($home_solution_service_brand_techs as $home_solution_service_brand_tech)
                                            <p><img src={{ asset('images/icon/check.png') }} alt="">
                                                <span>
                                                    {{ $home_solution_service_brand_tech->title }}
                                                </span>
                                            </p>
                                        @endforeach
                                    </div>
                                    <div class="view_app_details">
                                        <a href="job_apps/app-nganh-retail.html">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item_tab tab-pane fade " id="app-nganh-f-b">
                            <div class="row">
                                <div class="col-lg-5 thumbnail_app">
                                    <img class="lazy" data-src={{ asset('images/service/desgin-website.png') }}
                                        alt="">
                                </div>
                                <div class="col-lg-7 group_content_app">

                                    <h2 class="title_app">Thiết kế Website theo yêu cầu của Khách hàng</h2>
                                    <div class="content">
                                        @foreach ($home_solution_service_websites as $home_solution_service_website)
                                            <p><img src={{ asset('images/icon/check.png') }} alt="">
                                                <span>
                                                    {{ $home_solution_service_website->title }}
                                                </span>
                                            </p>
                                        @endforeach
                                    </div>
                                    <div class="view_app_details">
                                        <a href="#">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item_tab tab-pane fade " id="app-nganh-fitness">
                            <div class="row">
                                <div class="col-lg-5 thumbnail_app">
                                    <img class="lazy" data-src={{ asset('images/service/desgin-sofware.png') }}
                                        alt="">
                                </div>
                                <div class="col-lg-7 group_content_app">

                                    <h2 class="title_app">Thiết kế Sofware theo yêu cầu của Khách hàng</h2>
                                    <div class="content">
                                        @foreach ($home_solution_service_softwares as $home_solution_service_software)
                                            <p>
                                                <img src={{ asset('images/icon/check.png') }} alt="">
                                                <span>
                                                    {{ $home_solution_service_software->title }}
                                                </span>
                                            </p>
                                        @endforeach
                                    </div>
                                    <div class="view_app_details">
                                        <a href="#">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item_tab tab-pane fade " id="app-nganh-spa">
                            <div class="row">
                                <div class="col-lg-5 thumbnail_app">
                                    <img class="lazy" data-src={{ asset('images/service/content-manager.png') }}
                                        alt="">
                                </div>
                                <div class="col-lg-7 group_content_app">

                                    <h2 class="title_app">Sáng tạo nội dung chuẩn Marketing, SEO cho thương hiệu của bạn
                                    </h2>
                                    <div class="content">
                                        @foreach ($home_solution_service_seos as $home_solution_service_seo)
                                            <p><img src={{ asset('images/icon/check.png') }} alt="">
                                                <span>
                                                    {{ $home_solution_service_seo->title }}
                                                </span>
                                            </p>
                                        @endforeach

                                    </div>
                                    <div class="view_app_details">
                                        <a href="#">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item_tab tab-pane fade " id="app-nganh-auto">
                            <div class="row">
                                <div class="col-lg-5 thumbnail_app">
                                    <img class="lazy" data-src={{ asset('images/service/seo-key.png') }}
                                        alt="">
                                </div>
                                <div class="col-lg-7 group_content_app">

                                    <h2 class="title_app">Sáng tạo nội dung chiến lược – Giải pháp tối ưu tại Wind Lập
                                        Trình</h2>
                                    <div class="content">
                                        @foreach ($home_solution_service_contents as $home_solution_service_content)
                                            <p><img src={{ asset('images/icon/check.png') }} alt="">
                                                <span>
                                                    {{ $home_solution_service_content->title }}
                                                </span>
                                            </p>
                                        @endforeach
                                    </div>
                                    <div class="view_app_details">
                                        <a href="#">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12 group_link_dang_ky">
                    <a class="event_btn btn_hover" data-toggle="modal" data-target="#informationForm"
                        href="#information-form"><img class="lazy" data-src={{ asset('images/icon/icon-phone.png') }}
                            alt="">Đăng ký tư vấn</a>
                </div>
            </div>
        </div>
    </section>

    <section class="talk_cnv">
        <div class="container">
            <div class="headbox">
                <h2 class="title">Doanh nghiệp nói về Wind Lập Trình</h2>
            </div>
            <div class="talk-cnv-cas">
                @foreach ($customers as $customer)
                    <div class="items">
                        <a href="">
                            <img class="lazy" data-src={{ asset('storage/' . $customer->logo) }}
                                alt="{{ $customer->slug }}">
                        </a>
                    </div>
                @endforeach
            </div>


        </div>

        <div class="container_group_post_talk_cnv">
            <div class="container container_post_talk_cnv">
                <div class="row">
                    <div class="cnv-md-post col-lg-6">
                        <div class="ct">
                            <h3 class="title_news"></h3>
                            <h3 class="title"><a class="smooth" href="{{ route('client_work.index') }}" title="">Công Ty Phát Triển Công
                                    Nghiệp TOMO Việt Nam</a></h3>
                            <div class="description">Wind Lập Trình là đội ngủ sáng tạo sản phẩm công nghệ còn khá mới,
                                nhưng và họ thấy sự khác biệt của thế hệ GenZ trong sự sáng tạo đi đầu về công nghệ rất
                                vui được hợp tác với các bạn.
                            </div>
                        </div>
                        <a class="img" href="{{ route('client_work.index') }}" title="">
                            <img class="lazy" data-src={{ asset('images/customer/tomoorder.png') }} alt=""
                                title="">
                        </a>
                    </div>
                    <div class="cnv-md-post col-lg-6">

                        <div class="ct">
                            <h3 class="title_news"></h3>
                            <h3 class="title"><a class="smooth" href="{{ route('client_work.index') }}" title="">Nhà hàng Casa Viet Tây Ba
                                    Nha</a></h3>
                            <div class="description">Giải pháp Marketing về website bên Wind rất hiệu quả trong việc sáng
                                tạo nội dung,
                                hỗ trợ brand đưa ra các giải pháp phù hợp, sáng tạo keyword chuẩn SEO cho website hiệu quả
                                rõ rệt, cảm ơn các bạn đã hỗ trợ brantech.</div>
                        </div>
                        <a class="img" href="{{ route('client_work.index') }}" title="">
                            <img class="lazy" data-src={{ asset('images/customer/casaviet.jpg') }} alt=""
                                title="">
                        </a>
                    </div>
                    <div class="cnv-md-post col-lg-6">

                        <div class="ct">
                            <h3 class="title_news"></h3>
                            <h3 class="title"><a class="smooth" href="{{ route('client_work.index') }}" title="">Phụ Tùng Oto Đoàn
                                    Long</a></h3>
                            <div class="description">Thương hiệu của tôi đã có trên thị trường Việt Nam rất lâu nhưng mà
                                chưa có website,
                                khi biết tới Wind Lập Trình được các bạn trẻ sáng tạo brand cho tôi bên cạnh đó còn tích hợp
                                sáng tạo keyword chuẩn SEO,
                                tích hợp trên các công cụ tiềm kiếm như google...
                            </div>
                        </div>
                        <a class="img" href="{{ route('client_work.index') }}" title="">
                            <img class="lazy" data-src={{ asset('images/customer/phutungdoanlong.jpg') }}
                                alt="" title="">
                        </a>
                    </div>
                    <div class="cnv-md-post col-lg-6">

                        <div class="ct">
                            <h3 class="title_news"></h3>
                            <h3 class="title"><a class="smooth" href="{{ route('client_work.index') }}" title="">Comany Sun Marketing</a>
                            </h3>
                            <div class="description">Là đội ngủ đáng tin cậy tại Việt Nam về Solutions Marketing, SEO về
                                Nail Salon tại USA. Với tin
                                thần GenZ các bạn làm việc hết mình hỗ trợ 24/24. Cảm ơn các bạn.
                            </div>
                        </div>
                        <a class="img" href="{{ route('client_work.index') }}" title="">
                            <img class="lazy" data-src={{ asset('images/customer/sunmarketing.jpg') }} alt=""
                                title="">
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="container load_more_post_talk_cnv">
            <div class="row">
                <div class="col-lg-12 col-12 text-center">
                    <a href="{{ route('client_work.index') }}"> → Xem thêm các bài viết tương tự </a>
                </div>
            </div>
        </div>

    </section>
    <section class="technology_solutions">
        <div class="container">
            <div class="headbox">
                <h2 class="title">Giải pháp công nghệ toàn diện</h2>
            </div>
            <div class="row row_group">
                <div class="case_study col-lg-12">
                    @foreach ($home_solution_techs as $home_solution_tech)
                        <div class="items row">
                            <div class="col-md-5">
                                <div class="t-icon">
                                    <img class="lazy"
                                        data-src="{{ asset('storage/'. $home_solution_tech->thumbnail) }}"
                                        alt="{{ $home_solution_tech->slug }}"
                                        title="{{ $home_solution_tech->slug }}">
                                </div>
                            </div>
                            <div class="col-md-7 group_content_case_study">
                                <div class="headbox headbox_case">
                                    <h2 class="title">{{ $home_solution_tech->title }}</h2>
                                </div>
                                <div class="group_post_case text-center">
                                    <h2 class="title">
                                        <a href="#">
                                           {{ $home_solution_tech->description }}
                                        </a>
                                    </h2>
                                    <p class="description_case">
                                       {!! $home_solution_tech->content !!}
                                    </p>
                                    <a href="#" class="load_more">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="group_news h-posts">
        <div class="container">
            <div class="headbox">
                <h2 class="title">Khám Phá Tin Tức & Tài Nguyên Công Nghệ Từ Wind Lập Trình</h2>
            </div>
            <ul class="nav">
                <li><a class="smooth active show" data-toggle="tab" href="#articles" title="">Tin Tức</a></li>
                <li><a class="smooth" data-toggle="tab" href="#resources" title="">Tài Nguyên</a></li>
            </ul>
            <div class="tab-content tab-content-news">
                <!-- Tab: Articles -->
                <div id="articles" class="tab-pane fade in active show">
                    <div class="row row-ibl">
                        @foreach ($new_bodys as $new_body)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12 item">
                                <div class="news-item">
                                    <a class="cnv-img-4x3" href="{{ route('news.detail', $new_body->slug) }}" target="_blank">
                                        <img class="news-blog fade show lazy" data-src="{{ asset('storage/'. $new_body->thumbnail) }}"
                                            alt="{{ $new_body->title }}">
                                    </a>
                                    <div class="title">
                                        <a href="{{ route('news.detail', $new_body->slug) }}" class="article-title">
                                            {{ $new_body->title }}
                                        </a>
                                    </div>
                                    <div class="description">
                                       {{ $new_body->description }}
                                    </div>
                                    <div class="continue">
                                        <a href="{{ route('news.detail', $new_body->slug) }}" class="article-title"
                                            target="_blank">Đọc tiếp →</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-12 col-12 text-center load_more_new">
                        <a href="{{ route('news.index') }}">→ Xem tất cả bài viết</a>
                    </div>
                </div>
                <!-- Tab: Resources -->
                <div id="resources" class="tab-pane fade">
                    <div class="row row-ibl">
                        @foreach ($tech_bodys as $tech_body)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-12 item">
                                <div class="news-item">
                                    <a class="cnv-img-4x3" href="{{ route('tech.detail', $tech_body->slug) }}" target="_blank">
                                        <img class="news-blog fade show lazy" data-src="{{ asset('storage/' . $tech_body->thumbnail) }}" alt="{{ $tech_body->slug }}">
                                    </a>
                                    <div class="title">
                                        <a href="{{ route('tech.detail', $tech_body->slug) }}" class="article-title">
                                            {{ $tech_body->title }}
                                        </a>
                                    </div>
                                    <div class="description">
                                         {{ $tech_body->description }}
                                    </div>
                                    <div class="continue">
                                        <a href="{{ route('tech.detail', $tech_body->slug) }}" class="article-title"
                                            target="_blank">Đọc tiếp →</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-12 col-12 text-center load_more_new">
                        <a href="{{ route('tech.index') }}">→ Xem tất cả tài nguyên</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
