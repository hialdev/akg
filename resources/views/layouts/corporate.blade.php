@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="position-sticky top-0 py-5">
                    <div class="p-3 border border-2 border-dark d-flex flex-column gap-3">
                        <h5 class="m-0">Corporate Menu</h5>
                        <a href="{{route('about')}}" class="d-block fw-semibold border border-2 border-dark bg-white p-3 px-4 text-decoration-none text-dark text-capitalize {{Route::is('about') ? 'akg-sec-bg text-dark' : ''}}">About</a>
                        <a href="{{route('contact')}}" class="d-block fw-semibold border border-2 border-dark bg-white p-3 px-4 text-decoration-none text-dark text-capitalize {{Route::is('contact') ? 'akg-sec-bg text-dark' : ''}}">contact</a>
                        <a href="{{route('career')}}" class="d-block fw-semibold border border-2 border-dark bg-white p-3 px-4 text-decoration-none text-dark text-capitalize {{Route::is('career') ? 'akg-sec-bg text-dark' : ''}}">career</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @yield('cpt-content')
            </div>
        </div>
    </div>
</section>
@endsection