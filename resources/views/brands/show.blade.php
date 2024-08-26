@extends('layouts.app')
@section('seo')
    @php
        $seo = \App\Models\Meta::all()->keyBy('page');
    @endphp
    @include('partials.seo', [
        'title' => $brand->title ?? setting('seo.seo_title'),
        'description' => $brand->meta_desc ?? setting('seo.seo_des'),
        'image' => strlen($brand->bg_image) > 2 ? Voyager::image($brand->bg_image) : Voyager::image(setting('seo.seo_img')),
        'keywords' => $brand->meta_key ?? setting('seo.seo_key'),
    ])
@endsection
@php
    $brand_color = $brand->brand_color;
@endphp
@section('content')
<section>
    <div class="container-fluid p-0 position-relative overflow-auto">
        <div class="brand-hero-carousel owl-carousel owl-theme">
            @php
                $brand_sliders = $brand->images != null ? json_decode($brand->images) : [];
            @endphp
            @foreach ($brand_sliders as $slide)
            <div class="position-relative">
                <img src="{{Voyager::image($slide)}}" alt="Image Brand Title {{$loop->index}}" class="d-block w-100" style="aspect-ratio:16/6.5; object-fit:cover;">
                <div class="position-absolute top-0 end-0 start-0 bottom-0" style="background: linear-gradient(180deg, #21212186 40.79%, rgba(255, 255, 255, 0) 100%);"></div>
            </div>
            @endforeach
        </div>
        <div class="position-absolute top-0 start-0 end-0 bottom-0 d-flex align-items-center justify-content-between px-2" style="z-index: 10">
            <div class="prev-brand-hero d-flex align-items-center justify-content-center p-2 bg-secondary text-white rounded-circle" style="cursor: pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M31 36L19 24l12-12" />
                </svg>
            </div>
            <div class="next-brand-hero d-flex align-items-center justify-content-center p-2 bg-secondary text-white rounded-circle" style="cursor: pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="m19 12l12 12l-12 12" />
                </svg>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container py-5">
        <div class="row py-3">
            <div class="col-md-3 mb-4">
                <img src="{{Voyager::image($brand->logo)}}" alt="Logo {{$brand->title}}" class="d-block w-100 p-3 mx-auto" style="max-width: 13em;">
            </div>
            <div class="col-md-6 pe-md-5 mb-5">
                <h3 class="mb-4">{{$brand->title}}</h3>
                <p class="mb-5 text-secondary" style="text-align: justify !important">{{$brand->meta_desc ?? 'Artisan Kuliner Group Special Brand'}}</p>
                {{-- <div class="d-flex align-items-center gap-4">
                    <a href="tel:{{$brand->contact_telp}}" class="p-2 px-3 text-decoration-none" style="background-color: {{ $brand->brand_color ?? '#212121'}}; color:#fff">Book Now</a>
                    <a href="tel:{{$brand->contact_telp}}" class="p-2 px-3 text-decoration-none bg-light text-secondary" style="color: {{$brand->brand_color}} !important">Order Delivery</a>
                </div> --}}
            </div>
            <div class="col-md-3">
                <div class="row">
                    {{-- <div class="col-6 pb-5">
                        <h6>Opening Hours</h6>
                        <div class="text-secondary">
                            {{$brand->opening_time}}
                        </div>
                    </div> --}}
                    <div class="col-12 pb-5">
                        <h6>Social Media</h6>
                        <div class="d-flex align-items-center gap-2">
                            @if ($brand->socmed_link_fb)
                            <a href="{{url($brand->socmed_link_fb)}}" target="_blank" class="d-flex rounded-3 align-items-center akg-sec-bg text-white p-2" style="background: {{Route::is('brand.show') ? $brand_color : ''}} !important">
                                <span class="iconify" data-icon="bi:facebook" data-inline="false"></span>
                            </a>
                            @endif
                            @if ($brand->socmed_link_x)
                            <a href="{{url($brand->socmed_link_x)}}" target="_blank" class="d-flex rounded-3 align-items-center akg-sec-bg text-white p-2" style="background: {{Route::is('brand.show') ? $brand_color : ''}} !important">
                                <span class="iconify" data-icon="bi:twitter" data-inline="false"></span>
                            </a>
                            @endif
                            @if ($brand->socmed_link_ig)
                            <a href="{{url($brand->socmed_link_ig)}}" target="_blank" class="d-flex rounded-3 align-items-center akg-sec-bg text-white p-2" style="background: {{Route::is('brand.show') ? $brand_color : ''}} !important">
                                <span class="iconify" data-icon="bi:instagram" data-inline="false"></span>
                            </a>
                            @endif
                            @if ($brand->socmed_link_yt)
                            <a href="{{url($brand->socmed_link_yt)}}" target="_blank" class="d-flex rounded-3 align-items-center akg-sec-bg text-white p-2" style="background: {{Route::is('brand.show') ? $brand_color : ''}} !important">
                                <span class="iconify" data-icon="bi:youtube" data-inline="false"></span>
                            </a>
                            @endif
                            @if ($brand->socmed_link_tt)
                            <a href="{{url($brand->socmed_link_tt)}}" target="_blank" class="d-flex rounded-3 align-items-center akg-sec-bg text-white p-2" style="background: {{Route::is('brand.show') ? $brand_color : ''}} !important">
                                <span class="iconify" data-icon="bi:tiktok" data-inline="false"></span>
                            </a>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="col-6 pb-5">
                        <h6>Contact</h6>
                        <div class="text-secondary">
                            <span style="white-space: nowrap">T: {{$brand->contact_telp}}</span><br />
                            <span style="white-space: nowrap">E: {{$brand->contact_mail}}</span><br />
                            {{$brand->contact_site}}
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</section>

<section class="py-5">
    <div class="container-fluid">
        @if (count($brand->locations) > 0)
        <div class="row">
            <div class="col-1">
                @if (count($brand->locations) <= 3)
                <div class="d-flex d-md-none align-items-center justify-content-center h-100">
                    <div class="prev-brand-map d-flex align-items-center justify-content-center p-2 rounded-circle border" style="cursor: pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M31 36L19 24l12-12" />
                        </svg>
                    </div>
                </div>
                @else
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="prev-brand-map d-flex align-items-center justify-content-center p-2 rounded-circle border" style="cursor: pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M31 36L19 24l12-12" />
                        </svg>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-10">
                {{-- Ketika Lokasi Lebih dari 3 maka carousel --}}
                @if (count($brand->locations) > 1 && count($brand->locations) <= 3)
                {{-- Kurang Dari Laptop --}}
                <div class="d-md-none brand-map-carousel owl-carousel owl-theme">
                    @foreach ($brand->locations as $loc)
                    <div class="border d-flex flex-column text-center justify-content-center gap-4 p-5">
                        <div>
                            <img src="{{Voyager::image($loc->store_image)}}" alt="Image of {{$brand->title}} in {{$loc->title}}" class="d-block w-100 rounded-3" style="aspect-ratio:16/9;object-fit:cover;max-width:20em;">
                        </div>
                        <div>
                            <h6>{{$loc->title}}</h6>
                            <p style="max-width:20em;" class="text-center">{{$loc->address}}</p>
                            <a href="{{url($loc->link_gmap)}}" class="d-inline-flex align-items-center gap-2 fw-bold text-decoration-none text-dark border-bottom border-dark" style="color: {{$brand->brand_color}} !important">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203.21l-4.243 4.242a3 3 0 0 1-4.097.135l-.144-.135l-4.244-4.243A9 9 0 0 1 18.364 4.636M12 8a3 3 0 1 0 0 6a3 3 0 0 0 0-6" />
                                </svg>
                                Location
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M192 136v72a16 16 0 0 1-16 16H48a16 16 0 0 1-16-16V80a16 16 0 0 1 16-16h72a8 8 0 0 1 0 16H48v128h128v-72a8 8 0 0 1 16 0m32-96a8 8 0 0 0-8-8h-64a8 8 0 0 0-5.66 13.66L172.69 72l-42.35 42.34a8 8 0 0 0 11.32 11.32L184 83.31l26.34 26.35A8 8 0 0 0 224 104Z" />
                                </svg>
                            </a>
                        </div>
                        <div>
                            <h6>Opening Hour</h6>
                            @php
                                $time = $loc->opening_time;

                                // Memisahkan data berdasarkan koma menjadi array
                                $timeSlots = explode(',', $time);

                                // Array untuk menyimpan hasil pemisahan hari dan waktu
                                $parsedTimeSlots = [];

                                foreach ($timeSlots as $slot) {
                                    // Memisahkan berdasarkan tanda kurung
                                    $parts = explode('(', trim($slot));

                                    // Bagian hari, pastikan tidak ada spasi berlebih
                                    $days = trim($parts[0]);

                                    // Bagian waktu, hapus tanda kurung tutup dan spasi berlebih
                                    $time = isset($parts[1]) ? trim(rtrim($parts[1], ')')) : '';

                                    // Menyimpan hari dan waktu dalam array asosiatif
                                    $parsedTimeSlots[] = [
                                        'days' => $days,
                                        'time' => $time
                                    ];
                                }
                            @endphp
                            @foreach ($parsedTimeSlots as $date)
                            <p class="mb-0">{{$date['days']}}<br />({{$date['time']}})</p>
                            @endforeach
                        </div>
                        <div>
                            <h6>Contact Us</h6>
                            <div class="d-flex align-items-center gap-2 justify-content-center">
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="tel:{{$loc->contact_telp}}" class="text-secondary {{ $loc->contact_telp ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-2 rounded-2 border-1 bg-light">
                                    <i class="iconify" data-icon="ph:phone-fill"></i>
                                </a>
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="https://wa.me/{{formatPhoneNumber($loc->contact_whatsapp)}}?text=Hallo, Artisan Kuliner Group saya ingin bertanya lebih lanjut untuk {{$brand->title}} di lokasi {{$loc->title}}" class="text-secondary {{$loc->contact_whatsapp ? 'd-flex': 'd-none'}} align-items-center justify-content-center p-2 rounded-2 bg-light border-1">
                                    <i class="iconify" data-icon="bi:whatsapp"></i>
                                </a>
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="mailto:{{$loc->contact_email}}" class="text-secondary {{ $loc->contact_email ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-2 rounded-2 border-1 bg-light">
                                    <i class="iconify" data-icon="eva:email-outline"></i>
                                </a>
                            </div>
                        </div>
                        <div>
                            <h6>Online Order</h6>
                            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-center">
                                <a href="{{$loc->ofd_grabfood}}" class="brand-order-online text-decoration-none {{$loc->ofd_grabfood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/grabfood.png" alt="Logo Grabfood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_gofood}}" class="brand-order-online text-decoration-none {{$loc->ofd_gofood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/gofood.png" alt="Logo gofood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_shopeefood}}" class="brand-order-online text-decoration-none {{$loc->ofd_shopeefood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/shopeefood.png" alt="Logo shopeefood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_airasiafood}}" class="brand-order-online text-decoration-none {{$loc->ofd_airasiafood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/airasia-food.png" alt="Logo shopeefood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                            </div>
                        </div>
                        @if ($loc->book_now)
                        <div>
                            <a href="{{$loc->book_now}}" class="p-2 px-3 text-decoration-none" style="background-color: {{ $brand->brand_color ?? '#212121'}}; color:#fff">Book Now</a>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>

                {{-- Laptop --}}
                <div class="d-none d-md-grid brand-map-box">
                    @foreach ($brand->locations as $loc)
                    <div class="border d-flex flex-column text-center justify-content-center gap-4 p-5">
                        <div>
                            <img src="{{Voyager::image($loc->store_image)}}" alt="Image of {{$brand->title}} in {{$loc->title}}" class="d-block w-100 rounded-3" style="aspect-ratio:16/9;object-fit:cover;max-width:20em">
                        </div>
                        <div>
                            <h6>{{$loc->title}}</h6>
                            <p>{{$loc->address}}</p>
                            <a href="{{url($loc->link_gmap)}}" class="d-inline-flex align-items-center gap-2 fw-bold text-decoration-none text-dark border-bottom border-dark" style="color: {{$brand->brand_color}} !important">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203.21l-4.243 4.242a3 3 0 0 1-4.097.135l-.144-.135l-4.244-4.243A9 9 0 0 1 18.364 4.636M12 8a3 3 0 1 0 0 6a3 3 0 0 0 0-6" />
                                </svg>
                                Location
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M192 136v72a16 16 0 0 1-16 16H48a16 16 0 0 1-16-16V80a16 16 0 0 1 16-16h72a8 8 0 0 1 0 16H48v128h128v-72a8 8 0 0 1 16 0m32-96a8 8 0 0 0-8-8h-64a8 8 0 0 0-5.66 13.66L172.69 72l-42.35 42.34a8 8 0 0 0 11.32 11.32L184 83.31l26.34 26.35A8 8 0 0 0 224 104Z" />
                                </svg>
                            </a>
                        </div>
                        <div>
                            <h6>Opening Hour</h6>
                            @php
                                $time = $loc->opening_time;

                                // Memisahkan data berdasarkan koma menjadi array
                                $timeSlots = explode(',', $time);

                                // Array untuk menyimpan hasil pemisahan hari dan waktu
                                $parsedTimeSlots = [];

                                foreach ($timeSlots as $slot) {
                                    // Memisahkan berdasarkan tanda kurung
                                    $parts = explode('(', trim($slot));

                                    // Bagian hari, pastikan tidak ada spasi berlebih
                                    $days = trim($parts[0]);

                                    // Bagian waktu, hapus tanda kurung tutup dan spasi berlebih
                                    $time = isset($parts[1]) ? trim(rtrim($parts[1], ')')) : '';

                                    // Menyimpan hari dan waktu dalam array asosiatif
                                    $parsedTimeSlots[] = [
                                        'days' => $days,
                                        'time' => $time
                                    ];
                                }
                            @endphp
                            @foreach ($parsedTimeSlots as $date)
                            <p class="mb-0">{{$date['days']}}<br />({{$date['time']}})</p>
                            @endforeach
                        </div>
                        <div>
                            <h6>Contact Us</h6>
                            <div class="d-flex align-items-center gap-2 justify-content-center">
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="tel:{{formatPhoneNumber($loc->contact_telp)}}" class="text-secondary {{ $loc->contact_telp ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-2 rounded-2 border-1 bg-light">
                                    <i class="iconify" data-icon="ph:phone-fill"></i>
                                </a>
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="https://wa.me/{{formatPhoneNumber($loc->contact_whatsapp)}}?text=Hallo, Artisan Kuliner Group saya ingin bertanya lebih lanjut untuk {{$brand->title}} di lokasi {{$loc->title}}" class="text-secondary {{$loc->contact_whatsapp ? 'd-flex': 'd-none'}} align-items-center justify-content-center p-2 rounded-2 bg-light border-1">
                                    <i class="iconify" data-icon="bi:whatsapp"></i>
                                </a>
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="mailto:{{$loc->contact_email}}" class="text-secondary {{ $loc->contact_email ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-2 rounded-2 border-1 bg-light">
                                    <i class="iconify" data-icon="eva:email-outline"></i>
                                </a>
                            </div>
                        </div>
                        <div>
                            <h6>Online Order</h6>
                            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-center">
                                <a href="{{$loc->ofd_grabfood}}" class="brand-order-online text-decoration-none {{$loc->ofd_grabfood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/grabfood.png" alt="Logo Grabfood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_gofood}}" class="brand-order-online text-decoration-none {{$loc->ofd_gofood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/gofood.png" alt="Logo gofood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_shopeefood}}" class="brand-order-online text-decoration-none {{$loc->ofd_shopeefood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/shopeefood.png" alt="Logo shopeefood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_airasiafood}}" class="brand-order-online text-decoration-none {{$loc->ofd_airasiafood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/airasia-food.png" alt="Logo shopeefood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                            </div>
                        </div>
                        @if ($loc->book_now)
                        <div>
                            <a href="{{$loc->book_now}}" class="p-2 px-3 text-decoration-none" style="background-color: {{ $brand->brand_color ?? '#212121'}}; color:#fff">Book Now</a>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @elseif(count($brand->locations) == 1)
                <div class="brand-map-box">
                    @foreach ($brand->locations as $loc)
                    <div class="border d-flex flex-column text-center justify-content-center gap-4 p-5">
                        <div>
                            <img src="{{Voyager::image($loc->store_image)}}" alt="Image of {{$brand->title}} in {{$loc->title}}" class="d-block w-100 rounded-3" style="aspect-ratio:16/9;object-fit:cover;max-width:20em;">
                        </div>
                        <div>
                            <h6>{{$loc->title}}</h6>
                            <p>{{$loc->address}}</p>
                            <a href="{{url($loc->link_gmap)}}" class="d-inline-flex align-items-center gap-2 fw-bold text-decoration-none text-dark border-bottom border-dark" style="color: {{$brand->brand_color}} !important">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203.21l-4.243 4.242a3 3 0 0 1-4.097.135l-.144-.135l-4.244-4.243A9 9 0 0 1 18.364 4.636M12 8a3 3 0 1 0 0 6a3 3 0 0 0 0-6" />
                                </svg>
                                Location
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M192 136v72a16 16 0 0 1-16 16H48a16 16 0 0 1-16-16V80a16 16 0 0 1 16-16h72a8 8 0 0 1 0 16H48v128h128v-72a8 8 0 0 1 16 0m32-96a8 8 0 0 0-8-8h-64a8 8 0 0 0-5.66 13.66L172.69 72l-42.35 42.34a8 8 0 0 0 11.32 11.32L184 83.31l26.34 26.35A8 8 0 0 0 224 104Z" />
                                </svg>
                            </a>
                        </div>
                        <div>
                            <h6>Opening Hour</h6>
                            @php
                                $time = $loc->opening_time;

                                // Memisahkan data berdasarkan koma menjadi array
                                $timeSlots = explode(',', $time);

                                // Array untuk menyimpan hasil pemisahan hari dan waktu
                                $parsedTimeSlots = [];

                                foreach ($timeSlots as $slot) {
                                    // Memisahkan berdasarkan tanda kurung
                                    $parts = explode('(', trim($slot));

                                    // Bagian hari, pastikan tidak ada spasi berlebih
                                    $days = trim($parts[0]);

                                    // Bagian waktu, hapus tanda kurung tutup dan spasi berlebih
                                    $time = isset($parts[1]) ? trim(rtrim($parts[1], ')')) : '';

                                    // Menyimpan hari dan waktu dalam array asosiatif
                                    $parsedTimeSlots[] = [
                                        'days' => $days,
                                        'time' => $time
                                    ];
                                }
                            @endphp
                            @foreach ($parsedTimeSlots as $date)
                            <p class="mb-0">{{$date['days']}}<br />({{$date['time']}})</p>
                            @endforeach
                        </div>
                        <div>
                            <h6>Contact Us</h6>
                            <div class="d-flex align-items-center gap-2 justify-content-center">
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="tel:{{$loc->contact_telp}}" class="text-secondary {{ $loc->contact_telp ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-2 rounded-2 border-1 bg-light">
                                    <i class="iconify" data-icon="ph:phone-fill"></i>
                                </a>
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="https://wa.me/{{formatPhoneNumber($loc->contact_whatsapp)}}?text=Hallo, Artisan Kuliner Group saya ingin bertanya lebih lanjut untuk {{$brand->title}} di lokasi {{$loc->title}}" class="text-secondary {{$loc->contact_whatsapp ? 'd-flex': 'd-none'}} align-items-center justify-content-center p-2 rounded-2 bg-light border-1">
                                    <i class="iconify" data-icon="bi:whatsapp"></i>
                                </a>
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="mailto:{{$loc->contact_email}}" class="text-secondary {{ $loc->contact_email ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-2 rounded-2 border-1 bg-light">
                                    <i class="iconify" data-icon="eva:email-outline"></i>
                                </a>
                            </div>
                        </div>
                        <div>
                            <h6>Online Order</h6>
                            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-center">
                                <a href="{{$loc->ofd_grabfood}}" class="brand-order-online text-decoration-none {{$loc->ofd_grabfood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/grabfood.png" alt="Logo Grabfood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_gofood}}" class="brand-order-online text-decoration-none {{$loc->ofd_gofood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/gofood.png" alt="Logo gofood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_shopeefood}}" class="brand-order-online text-decoration-none {{$loc->ofd_shopeefood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/shopeefood.png" alt="Logo shopeefood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_airasiafood}}" class="brand-order-online text-decoration-none {{$loc->ofd_airasiafood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/airasia-food.png" alt="Logo shopeefood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                            </div>
                        </div>
                        @if ($loc->book_now)
                        <div>
                            <a href="{{$loc->book_now}}" class="p-2 px-3 text-decoration-none" style="background-color: {{ $brand->brand_color ?? '#212121'}}; color:#fff">Book Now</a>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @elseif(count($brand->locations) > 3) 
                <div class="brand-map-carousel owl-carousel owl-theme">
                    @foreach ($brand->locations as $loc)
                    <div class="border d-flex flex-column text-center justify-content-center gap-4 p-5">
                        <div>
                            <img src="{{Voyager::image($loc->store_image)}}" alt="Image of {{$brand->title}} in {{$loc->title}}" class="d-block w-100 rounded-3" style="aspect-ratio:16/9;object-fit:cover;">
                        </div>
                        <div>
                            <h6>{{$loc->title}}</h6>
                            <p>{{$loc->address}}</p>
                            <a href="{{url($loc->link_gmap)}}" class="d-inline-flex align-items-center gap-2 fw-bold text-decoration-none text-dark border-bottom border-dark" style="color: {{$brand->brand_color}} !important">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M18.364 4.636a9 9 0 0 1 .203 12.519l-.203.21l-4.243 4.242a3 3 0 0 1-4.097.135l-.144-.135l-4.244-4.243A9 9 0 0 1 18.364 4.636M12 8a3 3 0 1 0 0 6a3 3 0 0 0 0-6" />
                                </svg>
                                Location
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor" d="M192 136v72a16 16 0 0 1-16 16H48a16 16 0 0 1-16-16V80a16 16 0 0 1 16-16h72a8 8 0 0 1 0 16H48v128h128v-72a8 8 0 0 1 16 0m32-96a8 8 0 0 0-8-8h-64a8 8 0 0 0-5.66 13.66L172.69 72l-42.35 42.34a8 8 0 0 0 11.32 11.32L184 83.31l26.34 26.35A8 8 0 0 0 224 104Z" />
                                </svg>
                            </a>
                        </div>
                        <div>
                            <h6>Opening Hour</h6>
                            @php
                                $time = $loc->opening_time;

                                // Memisahkan data berdasarkan koma menjadi array
                                $timeSlots = explode(',', $time);

                                // Array untuk menyimpan hasil pemisahan hari dan waktu
                                $parsedTimeSlots = [];

                                foreach ($timeSlots as $slot) {
                                    // Memisahkan berdasarkan tanda kurung
                                    $parts = explode('(', trim($slot));

                                    // Bagian hari, pastikan tidak ada spasi berlebih
                                    $days = trim($parts[0]);

                                    // Bagian waktu, hapus tanda kurung tutup dan spasi berlebih
                                    $time = isset($parts[1]) ? trim(rtrim($parts[1], ')')) : '';

                                    // Menyimpan hari dan waktu dalam array asosiatif
                                    $parsedTimeSlots[] = [
                                        'days' => $days,
                                        'time' => $time
                                    ];
                                }
                            @endphp
                            @foreach ($parsedTimeSlots as $date)
                            <p class="mb-0">{{$date['days']}}<br />({{$date['time']}})</p>
                            @endforeach
                        </div>
                        <div>
                            <h6>Contact Us</h6>
                            <div class="d-flex align-items-center gap-2 justify-content-center">
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="tel:{{$loc->contact_telp}}" class="text-secondary {{ $loc->contact_telp ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-2 rounded-2 border-1 bg-light">
                                    <i class="iconify" data-icon="ph:phone-fill"></i>
                                </a>
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="https://wa.me/{{formatPhoneNumber($loc->contact_whatsapp)}}?text=Hallo, Artisan Kuliner Group saya ingin bertanya lebih lanjut untuk {{$brand->title}} di lokasi {{$loc->title}}" class="text-secondary {{$loc->contact_whatsapp ? 'd-flex': 'd-none'}} align-items-center justify-content-center p-2 rounded-2 bg-light border-1">
                                    <i class="iconify" data-icon="bi:whatsapp"></i>
                                </a>
                                <a style="background: {{$brand->brand_color}} !important; color:#fff !important;" href="mailto:{{$loc->contact_email}}" class="text-secondary {{ $loc->contact_email ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-2 rounded-2 border-1 bg-light">
                                    <i class="iconify" data-icon="eva:email-outline"></i>
                                </a>
                            </div>
                        </div>
                        <div>
                            <h6>Online Order</h6>
                            <div class="d-flex align-items-center flex-wrap gap-2 justify-content-center">
                                <a href="{{$loc->ofd_grabfood}}" class="brand-order-online text-decoration-none {{$loc->ofd_grabfood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/grabfood.png" alt="Logo Grabfood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_gofood}}" class="brand-order-online text-decoration-none {{$loc->ofd_gofood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/gofood.png" alt="Logo gofood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_shopeefood}}" class="brand-order-online text-decoration-none {{$loc->ofd_shopeefood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/shopeefood.png" alt="Logo shopeefood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                                <a href="{{$loc->ofd_airasiafood}}" class="brand-order-online text-decoration-none {{$loc->ofd_airasiafood ? 'd-flex' : 'd-none'}} align-items-center justify-content-center p-1 px-2 btn btn-outline-light rounded">
                                    <img src="{{env('APP_URL')}}/src/images/logo/airasia-food.png" alt="Logo shopeefood" class="d-block" style="height:1.5em; object-fit:contain; width:5em">
                                </a>
                            </div>
                        </div>
                        @if ($loc->book_now)
                        <div>
                            <a href="{{$loc->book_now}}" class="p-2 px-3 text-decoration-none" style="background-color: {{ $brand->brand_color ?? '#212121'}}; color:#fff">Book Now</a>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div> 
                @endif
                
            </div>
            <div class="col-1">
                @if (count($brand->locations) <= 3)
                <div class="d-flex d-md-none align-items-center justify-content-center h-100">
                    <div class="next-brand-map d-flex align-items-center justify-content-center p-2 rounded-circle border" style="cursor: pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="m19 12l12 12l-12 12" />
                        </svg>
                    </div>
                </div>
                @else
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="next-brand-map d-flex align-items-center justify-content-center p-2 rounded-circle border" style="cursor: pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="m19 12l12 12l-12 12" />
                        </svg>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center mt-4">
                    <button class="view-menu text-decoration-none border-0 p-2 px-3" style="color: #fff; background-color:{{$brand->brand_color ?? '#212121'}};">View Menu</button>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- Modal --}}
<div class="modal-menu position-fixed h-screen w-screen d-none align-items-start justify-content-center p-5 overflow-hidden top-0 start-0 end-0 bottom-0" style="background-color: #21212136; z-index:9999;">
    <div class="bg-white overflow-auto w-100" style="max-width: 30em;height:100%; max-height:85vh;">
        <div class="position-relative">
            <img src="{{Voyager::image($brand->bg_image)}}" alt="Menu {{$brand->title}} Image" class="d-block w-100" style="aspect-ratio:16/7; object-fit:cover;">
            <div class="close-menu position-absolute top-0 end-0 m-3 d-flex align-items-center justify-content-center" style="z-index: 10; cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48" class="text-white">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="m8 8l32 32M8 40L40 8" />
                </svg>
            </div>
            <div class="position-absolute top-0 start-0 end-0 bottom-0 d-flex align-items-center justify-content-center" style="background: linear-gradient(180deg, rgba(20, 38, 44, 0.50) 60.79%, rgba(213, 161, 41, 0.10) 100%);">
                <h3 class="text-white">Our Menu</h3>
            </div>
        </div>
        <div class="" style="max-height: 52vh">
            @if (count($menus) > 0)
            <div class="p-3 px-4 d-flex align-items-center flex-wrap gap-2">
                @foreach ($menus as $gmenu)
                    @php
                    $gfilePath = json_decode($gmenu->file);
                    @endphp
                    <a href="{{ count($gfilePath) > 0 ? Voyager::image($gfilePath[0]->download_link) : $gmenu->link_file }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-0">{{$gmenu->name}}</a>
                @endforeach
            </div>
            @else
            <div class="text-center p-2">No Menu Available</div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.querySelector('.modal-menu');
        var viewMenu = document.querySelector('.view-menu');
        var closeMenu = document.querySelector('.close-menu');
        
        viewMenu.addEventListener('click', function() {
            modal.style.setProperty('display', 'flex', 'important');
        });
        
        closeMenu.addEventListener('click', function() {
            modal.style.setProperty('display', 'none', 'important');
        });
    });

</script>
@endsection