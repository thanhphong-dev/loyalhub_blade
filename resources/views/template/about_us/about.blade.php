@extends('template.about_us.home')

@section('child-content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single">
                    <h1 class="s-title">ĐỘI NGỦ UY TÍN HÀNG ĐẦU TẠI VIỆT NAM</h1>
                    <time><i class="fa fa-calendar"></i>Thành lập: 05/07/2022</time>
                    @foreach ($about_uses as $about_us)
                        <div class="fv-content">
                            <div class="kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q">
                                <div dir="auto"><span><a
                                            class="oajrlxb2 g5ia77u1 qu0x051f esr5mh6w e9989ue4 r7d6kgcz rq0escxv nhd2j8a9 nc684nl6 p7hjln8o kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x jb3vyjys rz4wbd8a qt6c0cv9 a8nywdso i1ao9s8h esuyzwwr f1sip0of lzcic4wl q66pz984 gpro0wi8 b1v8xokw"
                                            href="" role="link" tabindex="0">{{ $about_us->title }}</a></span>
                                </div>
                                <div dir="auto"><span></span></div>
                            </div>
                            <div class="o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q">
                                <div dir="auto">️<span
                                        class="pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu"><img
                                            alt="{{ $about_us->slug }}" referrerpolicy="origin-when-cross-origin"
                                            src={{ asset('storage/' . $about_us->thumbnail) }}></span>{{ $about_us->description }}
                                </div>
                                <div dir="auto"></div>
                            </div>
                            <div class="o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q">
                                <div dir="auto"><em>{!! $about_us->content !!}</em></div>
                                <div dir="auto"></div>
                            </div>
                        </div>
                    @endforeach

                    <div class="s-social mb-2">
                        <span class="text">Chia sẻ:</span>
                        {{-- <div class="ctrl">
                            <ul class="cnv-social-icons list-inline">
                                <li class="list-inline-item"><a
                                        href="https://www.facebook.com/p/Wind-L%E1%BA%ADp-Tr%C3%ACnh-100083795057694/"
                                        onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;"
                                        class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                        </div> --}}
                    </div>

                    <div class="bor-box-related lpost-box">
                        @foreach ($getAllProjects as $getAllProject)
                            <div class="sb-post clearfix sb-post-related pt-3">
                                <a class="img hv-scale" href="{{ route('client_work.detail', $getAllProject->slug) }}"
                                    title="">
                                    <img class="lazy" data-src="{{ asset('storage/' . $getAllProject->thumbnail) }}"
                                        alt="{{ $getAllProject->slug }}">
                                </a>
                                <div class="ct">
                                    <p class="cate_related_post">{{ $getAllProject->title }}</p>
                                    <p>{{ $getAllProject->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar sidebar_group_post">
                    <div class="bor-box">
                        <a href=""><img class="lazy"
                                data-src=""></a>
                    </div>
                    <div class="bor-box">
                        <a href=""><img class="lazy"
                                data-src=""></a>
                    </div>

                    <div id="fb-customer-chat" class="bor-box">
                        <p><iframe width="100%" height="500" style="border: none; overflow: hidden;"
                                src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/profile.php?id=100083795057694&tabs=timeline&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                                scrolling="no" frameborder="0" allowfullscreen="allowfullscreen"
                                allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </p>

                    </div>
                    <div class="feature articles bor-box">
                        <h3 class="header upper">Bài viết nổi bật</h3>
                        @foreach ($customersOutStandings as $customersOutStanding)
                            <div class="article">
                                <div class="metatype">
                                    <a href="{{ route('client_work.detail', $customersOutStanding->slug) }}" class="__ap_processed">
                                        {{ $customersOutStanding->title }}
                                    </a>
                                    <i class="fa fa-circle" aria-hidden="true"></i>
                                    <span class="since">{{ $customersOutStanding->created_at->format('d/M/Y') }}</span>
                                </div>
                                <a href="{{ route('client_work.detail', $customersOutStanding->slug) }}" target="" class="header __ap_processed">
                                  {{ $customersOutStanding->description }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
