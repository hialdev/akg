@extends('layouts.app')
@section('seo')
    @php
        $seo = \App\Models\Meta::all()->keyBy('page');
    @endphp
    @include('partials.seo', [
        'title' => $seo->get('event')->title ?? setting('seo.seo_title'),
        'description' => $seo->get('event')->description ?? setting('seo.seo_des'),
        'image' => strlen($seo->get('event')->image) > 2 ? Voyager::image($seo->get('event')->image) : Voyager::image(setting('seo.seo_img')),
        'keywords' => $seo->get('event')->keywords ?? setting('seo.seo_key'),
    ])
@endsection
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <h1>{{setting('content.event_title')}}</h1>
                <p>{{setting('content.event_desc')}}</p>
                <div class="d-flex ">
                    @php
                        $file = setting('site.cpo_file');
                        $file = json_decode($file);
                    @endphp
                    <a href="{{$file && count($file) > 0 ? $file[0]->download_link : setting('site.cpo_link')}}" class="btn btn-light rounded-0 d-flex align-items-start justify-content-center gap-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M8.267 14.68c-.184 0-.308.018-.372.036v1.178c.076.018.171.023.302.023c.479 0 .774-.242.774-.651c0-.366-.254-.586-.704-.586m3.487.012c-.2 0-.33.018-.407.036v2.61c.077.018.201.018.313.018c.817.006 1.349-.444 1.349-1.396c.006-.83-.479-1.268-1.255-1.268" />
                                <path fill="currentColor" d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8zM9.498 16.19c-.309.29-.765.42-1.296.42a2 2 0 0 1-.308-.018v1.426H7v-3.936A7.6 7.6 0 0 1 8.219 14c.557 0 .953.106 1.22.319c.254.202.426.533.426.923c-.001.392-.131.723-.367.948m3.807 1.355c-.42.349-1.059.515-1.84.515c-.468 0-.799-.03-1.024-.06v-3.917A8 8 0 0 1 11.66 14c.757 0 1.249.136 1.633.426c.415.308.675.799.675 1.504c0 .763-.279 1.29-.663 1.615M17 14.77h-1.532v.911H16.9v.734h-1.432v1.604h-.906V14.03H17zM14 9h-1V4l5 5z" />
                            </svg>
                        </div>
                        Clients Portofolio
                    </a>
                </div>
            </div>

            @foreach ($events as $event)
            <div class="col-12 border mb-4 p-0">
                <div class="d-flex flex-column flex-md-row align-items-center h-100">
                    <img src="{{Voyager::image($event->image)}}" alt="Image Evenet" class="d-block w-100" style="aspect-ratio:2/2.5; max-width:25em; object-fit:cover;">
                    <div class="p-5 w-100 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <h2 class="mb-3 fs-5">{{$event->title}}</h2>
                            <p class="akg-sec" style="font-size: 13px">{{\Carbon\Carbon::parse($event->created_at)->format('d F Y')}}</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="{{route('event.show', $event->slug)}}" class="d-inline-flex align-items-center gap-2 text-dark">
                                Read Now
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                    <path fill="currentColor" fill-rule="evenodd" d="M10.159 10.72a.75.75 0 1 0 1.06 1.06l3.25-3.25L15 8l-.53-.53l-3.25-3.25a.75.75 0 0 0-1.061 1.06l1.97 1.97H1.75a.75.75 0 1 0 0 1.5h10.379z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
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