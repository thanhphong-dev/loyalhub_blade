@extends('template.client_work.index')

@section('all_projects')
    <div class="row">
                @foreach ($getAlls as $item)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-12 item">
                        <div class="apps-item">
                            <a class="cnv-img-4x3" aria-label="text" href="{{ route('client_work.detail', $item->slug) }}">
                                <img class="apps-img fade show" src="{{ asset('storage/'. $item->thumbnail) }}" alt=""
                                    title="{{ $item->slug }}">
                            </a>
                            <div class="title">
                                <a href="{{ route('client_work.detail', $item->slug) }}" class="article-title">{{ $item->title }}</a>
                            </div>
                            <div class="description">
                                {{ $item->description }}
                            </div>
                            <div class="continue">
                                <a href="{{ route('client_work.detail', $item->slug) }}" class="article-title" title="{{ $item->slug }}">
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="text-center pagination col-lg-12 col-12">
                      {{ $getAlls->links('pagination::bootstrap-4') }}
                </div>
            </div>
@endsection
