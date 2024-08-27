@extends('layouts.app')
@section('seo')
    @php
        $seo = \App\Models\Meta::all()->keyBy('page');
    @endphp
    @include('partials.seo', [
        'title' => $seo->get('corporate')->title ?? setting('seo.seo_title'),
        'description' => $seo->get('corporate')->description ?? setting('seo.seo_des'),
        'image' => strlen($seo->get('corporate')->image) > 2 ? Voyager::image($seo->get('corporate')->image) : Voyager::image(setting('seo.seo_img')),
        'keywords' => $seo->get('corporate')->keywords ?? setting('seo.seo_key'),
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

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">{{setting('content.career_title')}}</h1>
                <div class="row">
                    @foreach ($careers as $career)
                    <div class="col-md-4 mb-4">
                        <a href="{{route('career.show', $career->slug)}}" class="career-item d-block text-decoration-none text-dark">
                            <div class="position-relative overflow-hidden">
                                <img src="{{Voyager::image($career->image)}}" alt="Image {{$career->title}} Career" class="d-block w-100" style="aspect-ratio:1/1; object-fit:cover;">
                                <div class="position-absolute career-content end-0 start-0 bottom-0 p-3 akg-sec-bg">
                                    <div class="d-flex justify-content-between h-100">
                                        <div>
                                            <h2 class="fs-6 fw-semibold mb-0">{{$career->title}}</h2>
                                            <p class="text-dark m-0" style="font-size: 12px">{{\Carbon\Carbon::parse($career->created_at)->format('d F Y')}}</p>
                                        </div>
                                        {{-- <div class="d-flex align-items-center gap-3 justify-content-center fw-semibold">
                                            See Detail
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                                <path fill="currentColor" fill-rule="evenodd" d="M10.159 10.72a.75.75 0 1 0 1.06 1.06l3.25-3.25L15 8l-.53-.53l-3.25-3.25a.75.75 0 0 0-1.061 1.06l1.97 1.97H1.75a.75.75 0 1 0 0 1.5h10.379z" clip-rule="evenodd" />
                                            </svg>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pe-md-5">
                <h1 class="mb-3">{{setting('content.contact_title')}}</h1>
                <p>{{setting('content.contact_desc')}}</p>
            </div>
            <div class="col-md-6">
                <div class="p-5 bg-light">
                    <form id="contactForm">
                        <input name="name" type="text" class="form-control rounded-0 border-0 mb-3 p-2 px-3" placeholder="Name*" required>
                        <input name="email" type="email" class="form-control rounded-0 border-0 mb-3 p-2 px-3" placeholder="Email*" required>
                        <input name="phone" type="number" class="form-control rounded-0 border-0 mb-3 p-2 px-3" placeholder="Phone*" required>
                        <textarea name="message" placeholder="Message*" required cols="30" rows="10" class="form-control mb-3 rounded-0 border-0 p-2 px-3"></textarea>
                        <div class="d-flex align-items-center justify-content-end">
                            <button class="btn btn-warning rounded-0 p-2 px-3 akg-sec-bg border-0" type="submit">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection