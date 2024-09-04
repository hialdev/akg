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
<section class="py-5" id="about">
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
                <div class="d-flex align-items-center justify-content-center">
                    @php
                        $file = setting('site.cp_file');
                        $file = json_decode($file);
                    @endphp
                    <a href="{{$file && count($file) > 0 ? Voyager::image($file[0]->download_link) : setting('site.cp_link')}}" class="btn btn-light rounded-0 d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023c.479 0 .774-.242.774-.651c0-.366-.254-.586-.704-.586m3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018c.817.006 1.349-.444 1.349-1.396c.006-.83-.479-1.268-1.255-1.268" />
                            <path fill="currentColor" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM9.498 16.19c-.309.29-.765.42-1.296.42a2 2 0 0 1-.308-.018v1.426H7v-3.936A7.6 7.6 0 0 1 8.219 14c.557 0 .953.106 1.22.319c.254.202.426.533.426.923c-.001.392-.131.723-.367.948m3.807 1.355c-.42.349-1.059.515-1.84.515c-.468 0-.799-.03-1.024-.06v-3.917A8 8 0 0 1 11.66 14c.757 0 1.249.136 1.633.426c.415.308.675.799.675 1.504c0 .763-.279 1.29-.663 1.615M17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17zM14 9h-1V4l5 5z" />
                        </svg>
                        {{setting('site.cp_text')}}
                    </a>
                </div>
            </div>
            @if (count($teams) > 0)
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
            @endif
        </div>
    </div>
</section>

<section class="py-5" id="career">
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

<section class="py-5" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pe-md-5">
                <h1 class="mb-3">{{setting('content.contact_title')}}</h1>
                <p>{{setting('content.contact_desc')}}</p>
            </div>
            <div class="col-md-6">
                <div class="p-5 bg-light">
                    {{-- Alert Success --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
            
                    {{-- Form --}}
                    <form id="contactForm" method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        @method('POST')
                        {{-- Input Name --}}
                        <input name="name" type="text" class="form-control rounded-0 border-0 mb-3 p-2 px-3 @error('name') is-invalid @enderror" placeholder="Name*" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
            
                        {{-- Input Email --}}
                        <input name="email" type="email" class="form-control rounded-0 border-0 mb-3 p-2 px-3 @error('email') is-invalid @enderror" placeholder="Email*" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
            
                        {{-- Input Phone --}}
                        <input name="no" type="number" class="form-control rounded-0 border-0 mb-3 p-2 px-3 @error('no') is-invalid @enderror" placeholder="Phone*" value="{{ old('no') }}" required>
                        @error('no')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
            
                        {{-- Input Message --}}
                        <textarea name="messages" placeholder="Message*" required cols="30" rows="10" class="form-control mb-3 rounded-0 border-0 p-2 px-3 @error('messages') is-invalid @enderror">{{ old('messages') }}</textarea>
                        @error('messages')
                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                        @enderror
            
                        {{-- Submit Button --}}
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