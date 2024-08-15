@extends('layouts.app')
@section('seo')
    @php
        $seo = \App\Models\Meta::all()->keyBy('page');
    @endphp
    @include('partials.seo', [
        'title' => $event->title ?? setting('seo.seo_title'),
        'description' => $event->meta_desc ?? setting('seo.seo_des'),
        'image' => strlen($event->bg_image) > 2 ? Voyager::image($event->bg_image) : Voyager::image(setting('seo.seo_img')),
        'keywords' => $event->meta_key ?? setting('seo.seo_key'),
    ])
@endsection
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center pb-4 gap-3 border-bottom mb-4">
                    <a href="{{route('event')}}" class="text-decoration-none akg-sec">EVENT</a>
                    /
                    <span>{{$event->title}}</span>
                </div>
            </div>
            <div class="col-12">
                <div class="d-inline-block mb-2 p-2 px-3 akg-sec-bg text-white">
                    {{\Carbon\Carbon::parse($event->created_at)->format('d F Y')}}
                </div>
            </div>
            <div class="col-md-8">
                <article>
                    <h1>{{$event->title}}</h1>
                    <img src="{{Voyager::image($event->image)}}" alt="Image {{$event->title}}" class="d-block w-100 my-3" style="aspect-ratio:16/9; object-fit:cover;">
                    <div class="content">
                        {!! $event->content !!}
                    </div>
                </article>
            </div>
            <div class="col-md-4 px-4 mt-4">
                <div class="fw-bold akg-sec mb-5">View More</div>
                @foreach ($event_suggests as $ns)
                <a href="{{route('event.show', $ns->slug)}}" class="d-block text-dark text-decoration-none border-bottom mb-5">
                    <h6 class="mb-4">{{$ns->title}}</h6>
                    <p class="mb-5">{{\Carbon\Carbon::parse($ns->created_at)->format('d F Y')}}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row h-100">
            <div class="col-md-6">
                <img src="{{Voyager::image(setting('cta.cta_image'))}}" alt="Image Section" class="d-block w-100" style="aspect-ratio:16/9; object-fit:cover">
            </div>
            <div class="col-md-6 h-content p-4">
                <div class="d-flex flex-column align-items-start justify-content-between h-100">
                    <div>
                        <h3>{{setting('cta.cta_title')}}</h3>
                        <p>{{setting('cta.cta_desc')}}</p>
                    </div>
                    <a href="{{url(setting('cta.btn_link'))}}" class="btn p-2 px-3 rounded-0 border-0 text-white bg-secondary">{{setting('cta.btn_text')}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection