@extends('layouts.app')
@section('seo')
    @php
        $seo = \App\Models\Meta::all()->keyBy('page');
    @endphp
    @include('partials.seo', [
        'title' => $seo->get('news')->title ?? setting('seo.seo_title'),
        'description' => $seo->get('news')->description ?? setting('seo.seo_des'),
        'image' => strlen($seo->get('news')->image) > 2 ? Voyager::image($seo->get('news')->image) : Voyager::image(setting('seo.seo_img')),
        'keywords' => $seo->get('news')->keywords ?? setting('seo.seo_key'),
    ])
@endsection
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 my-5 pb-3">
                <h1>{{setting('content.news_title')}}</h1>
                <p>{{setting('content.news_desc')}}</p>
            </div>
            <div class="col-12">
                <div class="mb-4">
                    <div class="news-page-carousel owl-carousel owl-theme">
                        @foreach ($news as $new)
                            <a class="d-block news-carousel-item" href="{{route('news.show', $new->slug)}}" style="max-width: 20em">
                                <img src="{{Voyager::image($new->image)}}" alt="" class="d-block mb-2" style="aspect-ratio:3/2; object-fit:cover;">
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
                <a href="{{route('news.show', $new->slug)}}" class="d-flex align-items-center text-decoration-none text-dark">
                    <div>
                        <img src="{{Voyager::image($new->image)}}" alt="Image {{$new->title}}" class="d-block" style="aspect-ratio:16/9; max-width:15em; object-fit:cover;">
                    </div>
                    <div class="p-4">
                        <h6>{{$new->title}}</h6>
                        <p class="mt-auto text-secondary" style="font-size: 11px">{{ \Carbon\Carbon::parse($new->created_at)->format('d F Y')}}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 my-5">
                <h1>{{setting('content.news_article_title')}}</h1>
                <p>{{setting('content.news_article_desc')}}</p>
            </div>
            <div class="col-12 mb-5">
                <div class="d-flex gap-5 flex-column flex-md-row align-items-center">
                    <a href="{{route('news.show',$article_featured->slug)}}" class="text-dark d-block text-decoration-none w-100" style="max-width: 28em">
                        <img src="{{Voyager::image($article_featured->image)}}" alt="Image Featured Article" class="d-block mb-3 w-100" style="aspect-ratio:16/9;object-fit:cover">
                        <p class="text-secondary" style="font-size: 13px">{{ \Carbon\Carbon::parse($article_featured->created_at)->format('d F Y')}}</p>
                        <h6>{{$article_featured->title}}</h6>
                    </a>
                    <div class="row">
                        @foreach ($articles as $article)
                        <div class="col-6 p-4">
                            <a href="{{route('news.show',$article->slug)}}" class="d-block text-decoration-none text-dark" style="max-width: 25em">
                                <h6>{{$article->title}}</h6>
                                <p class="text-secondary mt-2" style="font-size: 13px">{{\Carbon\Carbon::parse($article->created_at)->format('d F Y')}}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection