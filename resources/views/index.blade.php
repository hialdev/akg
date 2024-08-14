@extends('layouts.app')
@section('seo')
    @php
        $seo = \App\Models\Meta::all()->keyBy('page');
    @endphp
    @include('partials.seo', [
        'title' => $seo->get('home')->title ?? setting('seo.seo_title'),
        'description' => $seo->get('home')->description ?? setting('seo.seo_des'),
        'image' => strlen($seo->get('home')->image) > 2 ? Voyager::image($seo->get('home')->image) : Voyager::image(setting('seo.seo_img')),
        'keywords' => $seo->get('home')->keywords ?? setting('seo.seo_key'),
    ])
@endsection
@section('content')
<section>
    @php
        $video = setting('content.video');
        $video = json_decode($video);
    @endphp
    @if (count($video) > 0)
    <div class="position-relative video-jumbotron">
        <div class="position-absolute top-0 end-0 start-0 bottom-0">
            <video autoplay muted loop>
                <source src="{{Voyager::image($video[0]->download_link)}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="d-flex align-items-center position-relative justify-content-center text-white" style="z-index: 10">
            <h1 style="max-width: 15em !important">{{setting('content.home_hero_title')}}</h1>
        </div>
    </div>
    @else
    <div class="hero-carousel owl-carousel owl-theme">
        @foreach ($heros as $hero)
        <div class="position-relative">
            <div class="position-absolute top-0 start-0 end-0 bottom-0" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.58) 48.01%, rgba(210, 210, 210, 0.00) 100%);">
                <div class="container-fluid h-100">
                    <div class="row h-100 align-items-end">
                        <div class="col-lg-4 p-5">
                            <h1 class="text-white">{{$hero->title}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{Voyager::image($hero->image)}}" alt="Image Hero Jumbotron {{$hero->title}} AKG" class="d-block w-100 image-hero">
        </div>
        @endforeach
    </div>
    @endif
</section>
<section class="py-5" id="explore">
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="akg-sec fs-3 mx-auto" style="max-width: 25em">{{setting('content.home_intro_title')}}</h2>
                <p class="mx-auto text-secondary" style="max-width: 50em">{{setting('content.home_desc')}}</p>
                <hr class="divider d-block text-center mx-auto" />
            </div>
        </div>
    </div>
</section>
<section class="bg-light h-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2 p-5 text-center text-md-start">
                <h3 class="akg-prm">{{setting('content.home_brand_title')}}</h3>
                <hr class="divider mx-auto ms-md-0" style="max-width: 3em">
                {{-- <p class="text-secondary">{{setting('content.home_hero_desc')}}</p> --}}
            </div>
            <div class="col-lg-10">
                <div class="brand-box">
                    @foreach ($brands as $brand)
                    <a href="{{route('brand.show', $brand->slug)}}" class="text-decoration-none text-dark d-b;pck">
                        <div class="brand-item position-relative">
                            <div class="content">
                                <div class="hovering position-absolute top-0 bottom-0 start-0 end-0 bg-white akg-sec d-flex align-items-center justify-content-center">
                                    <div>
                                        <img src="{{Voyager::image($brand->logo)}}" alt="Artisan" class="d-block">
                                        <!-- <div class="font-bold akg-prm text-center">{{$brand->title}}</div> -->
                                    </div>
                                </div>
                                <div class="font-bold text-white fs-5">{{$brand->title}}</div>
                            </div>
                            <img src="{{Voyager::image($brand->bg_image)}}" alt="Alt">
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>            
</section>
<section class="py-5">
    <div class="container-fluid py-5">
        <div class="row align-items-center">
            <div class="col-lg-4 p-5">
                <h2>{{setting('content.home_news_title')}}</h2>
                <hr class="divider">
                <p class="text-secondary">{{setting('content.home_news_desc')}}</p>
                <a href="{{route('about')}}" class="btn d-flex align-items-center gap-3 p-0 akg-sec">
                    Read More
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                        <path fill="currentColor" fill-rule="evenodd" d="M10.159 10.72a.75.75 0 1 0 1.06 1.06l3.25-3.25L15 8l-.53-.53l-3.25-3.25a.75.75 0 0 0-1.061 1.06l1.97 1.97H1.75a.75.75 0 1 0 0 1.5h10.379z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            <div class="col-lg-8">
                <div>
                    <div class="news-carousel owl-carousel owl-theme">
                        @foreach ($news as $new)
                            <a class="d-block news-carousel-item" href="">
                                <img src="{{Voyager::image($new->image)}}" alt="" class="d-block mb-2" style="aspect-ratio:3/2; object-fit:cover">
                                <div class="text-secondary mb-2">{{ \Carbon\Carbon::parse($new->created_at)->format('d F Y');}}</div>
                                <h5>{{$new->title}}</h5>
                            </a>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="border-top py-5">
    <div class="container py-5">
        <div class="text-center">
            <h2 class="akg-sec">About Us</h2>
            <p class="text-secondary">{{setting('content.home_about')}}, <a href="" class="akg-sec btn p-0">Read More...</a></p>
        </div>
    </div>
    <img src="{{Voyager::image(setting('content.sep_img'))}}" alt="Image Seperator" class="d-block w-100">
</section>
@endsection
    

    