@extends('layouts.corporate')
@section('seo')
    @php
        $seo = \App\Models\Meta::all()->keyBy('page');
    @endphp
    @include('partials.seo', [
        'title' => $seo->get('contact')->title ?? setting('seo.seo_title'),
        'description' => $seo->get('contact')->description ?? setting('seo.seo_des'),
        'image' => strlen($seo->get('contact')->image) > 2 ? Voyager::image($seo->get('contact')->image) : Voyager::image(setting('seo.seo_img')),
        'keywords' => $seo->get('contact')->keywords ?? setting('seo.seo_key'),
    ])
@endsection
@section('cpt-content')
{{-- <img src="{{Voyager::image(setting('content.sep_img'))}}" alt="Image Separator" class="w-100 d-block"> --}}
<section class="py-5">
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