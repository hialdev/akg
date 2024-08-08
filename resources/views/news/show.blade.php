@extends('layouts.app')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center pb-4 gap-3 border-bottom mb-4">
                    <a href="{{route('news')}}" class="text-decoration-none akg-sec">NEWS & ARTICLES</a>
                    /
                    <span>{{$news->title}}</span>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="d-flex align-items-center gap-2 text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                            <path fill="currentColor" d="M16 16a7 7 0 1 0 0-14a7 7 0 0 0 0 14m-8.5 2A3.5 3.5 0 0 0 4 21.5v.5c0 2.393 1.523 4.417 3.685 5.793C9.859 29.177 12.802 30 16 30s6.14-.823 8.315-2.207C26.477 26.417 28 24.393 28 22v-.5a3.5 3.5 0 0 0-3.5-3.5z" />
                        </svg>
                        Artisan Kuliner Group
                    </div>
                    <div class="d-flex align-items-center gap-2 text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 23C5.925 23 1 18.075 1 12S5.925 1 12 1s11 4.925 11 11s-4.925 11-11 11m1-17.5h-2v6.914l4 4L16.414 15L13 11.586z" />
                        </svg>
                        {{\Carbon\Carbon::parse($news->created_at)->format('d F Y')}}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <article>
                    <h1>{{$news->title}}</h1>
                    <img src="{{Voyager::image($news->image)}}" alt="Image {{$news->title}}" class="d-block w-100 my-3" style="aspect-ratio:16/9; object-fit:cover;">
                    <div class="content">
                        {!! $news->content !!}
                    </div>
                </article>
            </div>
            <div class="col-md-4 px-4 mt-4">
                <div class="fw-bold akg-sec mb-5">Read More</div>
                @foreach ($news_suggests as $ns)
                <a href="{{route('news.show', $ns->slug)}}" class="d-block text-dark text-decoration-none border-bottom mb-5">
                    <h6 class="mb-4">{{$ns->title}}</h6>
                    <p class="mb-5">{{\Carbon\Carbon::parse($ns->created_at)->format('d F Y')}}</p>
                </a>
                @endforeach
                @foreach ($article_suggests as $as)
                <a href="{{route('news.show', $as->slug)}}" class="d-block text-dark text-decoration-none border-bottom mb-5">
                    <h6 class="mb-4">{{$as->title}}</h6>
                    <p class="mb-5">{{\Carbon\Carbon::parse($as->created_at)->format('d F Y')}}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection