@extends('layouts.app')
@section('content')

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center pb-4 gap-3 border-bottom mb-4">
                    <a href="{{route('career')}}" class="text-decoration-none akg-sec">CAREER</a>
                    /
                    <span>{{$career->title}}</span>
                </div>
            </div>
            <div class="col-12">
                <article>
                    <div class="row mb-4">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <img src="{{Voyager::image($career->image)}}" alt="Image {{$career->title}}" class="d-block w-100" style="aspect-ratio:1/1; object-fit:cover;">
                        </div>
                        <div class="col-md-8 text-start">
                            <div class="d-flex flex-column align-items-start justify-content-between h-100">
                                <div>
                                    <div class="d-inline-block mb-2 p-2 px-3 bg-light text-secondary">
                                        {{\Carbon\Carbon::parse($career->created_at)->format('d F Y')}}
                                    </div>
                                    <h1>{{$career->title}}</h1>
                                </div>
                                <div>
                                    <a href="" class="btn p-2 px-3 akg-sec-bg text-white rounded-0">Kirim Lamaran</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-md-8">
                <article>
                    <div class="content">
                        {!! $career->content !!}
                    </div>
                </article>
            </div>
            <div class="col-md-4 px-4 mt-5 mt-md-0">
                <div class="fw-bold akg-sec mb-5">View More Careers</div>
                @foreach ($career_suggests as $cs)
                <a href="{{route('career.show', $cs->slug)}}" class="d-block text-dark text-decoration-none border-bottom mb-5">
                    <h6 class="mb-4">{{$cs->title}}</h6>
                    <p class="mb-5">{{\Carbon\Carbon::parse($cs->created_at)->format('d F Y')}}</p>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection