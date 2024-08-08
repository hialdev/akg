@extends('layouts.app')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h1>{{setting('content.event_title')}}</h1>
                <p>{{setting('content.event_desc')}}</p>
            </div>
            @foreach ($events as $event)
            <div class="col-12 border mb-4 p-0">
                <div class="d-flex flex-column flex-md-row align-items-center h-100">
                    <img src="{{Voyager::image($event->image)}}" alt="Image Evenet" class="d-block" style="aspect-ratio:16/9; max-width:25em; object-fit:cover;">
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
@endsection