@extends('layouts.app')
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
@endsection