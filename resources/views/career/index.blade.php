@extends('layouts.app')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4">{{setting('content.career_title')}}</h1>
                <div class="row">
                    @foreach ($careers as $career)
                    <div class="col-md-6 mb-4">
                        <a href="{{route('career.show', $career->slug)}}" class="career-item d-block text-decoration-none text-dark">
                            <div class="position-relative overflow-hidden">
                                <img src="{{Voyager::image($career->image)}}" alt="Image {{$career->title}} Career" class="d-block w-100" style="aspect-ratio:1/1; object-fit:cover;">
                                <div class="position-absolute career-content end-0 start-0 bottom-0 p-4 akg-sec-bg">
                                    <div class="d-flex justify-content-between h-100">
                                        <div>
                                            <h2 class="fs-5 fw-semibold">{{$career->title}}</h2>
                                            <p class="text-dark m-0">{{\Carbon\Carbon::parse($career->created_at)->format('d F Y')}}</p>
                                        </div>
                                        <div class="d-flex align-items-center gap-3 justify-content-center fw-semibold">
                                            See Detail
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                                <path fill="currentColor" fill-rule="evenodd" d="M10.159 10.72a.75.75 0 1 0 1.06 1.06l3.25-3.25L15 8l-.53-.53l-3.25-3.25a.75.75 0 0 0-1.061 1.06l1.97 1.97H1.75a.75.75 0 1 0 0 1.5h10.379z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
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
@endsection