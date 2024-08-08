@extends('layouts.app')
@section('content')
<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Search</h1>
                <p>Menampilkan hasil untuk pencarian : <span class="fw-bold akg-sec">{{$q}}</span></p>
            </div>
        </div>
    </div>
</section>
<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h2>News</h2>
            </div>
            @forelse ($news as $new)
            <div class="col-12 col-md-4 col-lg-3">
                <a href="{{route('news.show', $new->slug)}}" class="text-decoration-none d-block text-dark text-dark p-4 border border-dark mb-3 item-search">
                    <h6>{{$new->title}}</h6>
                    <p class="text-secondary" style="font-size: 13px">{{ \Carbon\Carbon::parse($new->created_at)->format('d F Y')}}</p>
                </a>
            </div>
            @empty
            <div class="col-12 d-flex align-items-center justify-content-center p-4 text-secondary">
                Tidak Ada Data
            </div>
            @endforelse
        </div>
    </div>
</section>
<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h2>Articles</h2>
            </div>
            @forelse ($articles as $art)
            <div class="col-12 col-md-4 col-lg-3">
                <a href="{{route('news.show', $art->slug)}}" class="text-decoration-none d-block text-dark p-4 border border-dark mb-3 item-search">
                    <h6>{{$art->title}}</h6>
                    <p class="text-secondary mb-0" style="font-size: 13px">{{ \Carbon\Carbon::parse($art->created_at)->format('d F Y')}}</p>
                </a>
            </div>
            @empty
            <div class="col-12 d-flex align-items-center justify-content-center p-4 text-secondary">
                Tidak Ada Data
            </div>
            @endforelse
        </div>
    </div>
</section>
<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h2>Events</h2>
            </div>
            @forelse ($events as $ev)
            <div class="col-12 col-md-4 col-lg-3">
                <a href="{{route('events.show', $ev->slug)}}" class="text-decoration-none d-block text-dark text-dark p-4 border border-dark mb-3 item-search">
                    <h6>{{$ev->title}}</h6>
                    <p class="text-secondary" style="font-size: 13px">{{ \Carbon\Carbon::parse($ev->created_at)->format('d F Y')}}</p>
                </a>
            </div>
            @empty
            <div class="col-12 d-flex align-items-center justify-content-center p-4 text-secondary">
                Tidak Ada Data
            </div>
            @endforelse
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h2>Careers</h2>
            </div>
            @forelse ($careers as $cr)
            <div class="col-12 col-md-4 col-lg-3">
                <a href="{{route('career.show', $cr->slug)}}" class="text-decoration-none d-block text-dark text-dark p-4 border border-dark mb-3 item-search">
                    <h6>{{$cr->title}}</h6>
                    <p class="text-secondary" style="font-size: 13px">{{ \Carbon\Carbon::parse($cr->created_at)->format('d F Y')}}</p>
                </a>
            </div>
            @empty
            <div class="col-12 d-flex align-items-center justify-content-center p-4 text-secondary">
                Tidak Ada Data
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
