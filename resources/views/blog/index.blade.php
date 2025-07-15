@extends('layouts.app')
@section('seo')
    @php
        $seo = \App\Models\Meta::all()->keyBy('page');
    @endphp
    @include('partials.seo', [
        'title' => $seo->get('blog')->title ?? setting('seo.seo_title'),
        'description' => $seo->get('blog')->description ?? setting('seo.seo_des'),
        'image' => strlen($seo->get('blog')->image) > 2 ? Voyager::image($seo->get('blog')->image) : Voyager::image(setting('seo.seo_img')),
        'keywords' => $seo->get('blog')->keywords ?? setting('seo.seo_key'),
    ])
@endsection
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 my-5 pb-3">
                <h1>{{setting('content.news_article_title')}}</h1>
                <p>{{setting('content.news_article_desc')}}</p>
            </div>
            <div class="col-12">
                <div class="mb-4">
                    <div class="news-page-carousel owl-carousel owl-theme">
                        @foreach ($news as $new)
                            <a data-aos="fade-up" class="d-block news-carousel-item" href="{{route('blog.show', $new->slug)}}" style="max-width: 20em">
                                <img src="{{Voyager::image($new->image)}}" alt="" class="d-block mb-2" style="aspect-ratio:2/2.5; object-fit:cover;">
                                <div class="text-secondary mb-2">{{ \Carbon\Carbon::parse($new->created_at)->format('d F Y')}}</div>
                                <h6>{{$new->title}}</h6>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="news-page-dots"></div>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($news_cards as $new)
            <div class="col-md-6 mb-3">
                <a data-aos="fade-up" href="{{route('blog.show', $new->slug)}}" class="news-item d-flex align-items-center text-decoration-none text-dark">
                    <div style="height: fit-content">
                        <img src="{{Voyager::image($new->image)}}" alt="Image {{$new->title}}" class="d-block" style="aspect-ratio:2/2.5; object-fit:cover;">
                    </div>
                    <div class="p-2 ps-4">
                        <h6>{{$new->title}}</h6>
                        <p class="mt-auto text-secondary" style="font-size: 11px">{{ \Carbon\Carbon::parse($new->created_at)->format('d F Y')}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        @php
            $newOffset = $offset + $limit;
        @endphp

        <div class="text-center">
            @if($newOffset < $totalNews)
                <a href="{{ route('blog', ['offset' => $newOffset]) }}" class="btn btn-outline-secondary my-4 rounded-0">Load More</a>
            @endif
        </div>
    </div>
</section>
@endsection
