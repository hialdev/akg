@extends('layouts.app')
@section('seo')
    @php
        $seo = \App\Models\Meta::all()->keyBy('page');
    @endphp
    @include('partials.seo', [
        'title' => $seo->get('about')->title ?? setting('seo.seo_title'),
        'description' => $seo->get('about')->description ?? setting('seo.seo_des'),
        'image' => strlen($seo->get('about')->image) > 2 ? Voyager::image($seo->get('about')->image) : Voyager::image(setting('seo.seo_img')),
        'keywords' => $seo->get('about')->keywords ?? setting('seo.seo_key'),
    ])
@endsection
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <img src="{{Voyager::image(setting('content.about_image'))}}" alt="Image About" class="d-block w-100" style="aspect-ratio:16/9; object-fit:cover;">
            </div>
            <div class="col-12 text-center mb-5">
                <h1 class="mb-4 fs-2">{{setting('content.about_title')}}</h1>
                <div class="content">
                    {!! setting('content.about_content') !!}
                </div>
            </div>
            <div class="col-12">
                <h2 class="text-center mb-4">{{setting('content.team_title')}}</h2>
                <div class="d-flex align-items-center justify-content-center gap-4 flex-wrap">
                    @foreach ($teams as $team)
                    <div class="text-center d-flex flex-column justify-content-center align-items-center" style="max-width: 15em">
                        <img src="{{Voyager::image($team->image)}}" alt="Image {{$team->name}}" class="bg-light d-block rounded-circle mb-3" style="max-width: 10em">
                        <h6 class="fs-5">{{$team->name}}</h6>
                        <p>{{$team->role}}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection