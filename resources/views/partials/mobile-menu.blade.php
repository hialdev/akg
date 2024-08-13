<div class="btn-close-menu-mobile ms-auto d-inline-flex align-items-center jutsify-content-center akg-sec-bg text-white p-2 rounded-circle" style="width: fit-content; cursor:pointer; {{Route::is('brand.show') ? 'background:'.$brand_color.' !important' : ''}}">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0l-4 4m4-4l-4-4" />
    </svg>
</div>
<div class="menu-dropdown">
    <a href="#" class="btn-menu-dropdown text-white text-uppercase item-menu d-flex align-items-center justify-content-between">Brand
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 10l5 5l5-5" />
            </svg>
        </div>
    </a>
    <div class="mega-menu-mobile">
        <!-- Isi mega menu untuk Brand -->
        <div class="box-menu-dropdown mega-menu-box mt-3">
            <div class="row align-items-center">
                <div class="col-lg-4 p-5 d-none d-md-block">
                    <h3 class="akg-prm">{{setting('content.home_brand_title')}}</h3>
                    <hr class="divider" style="background: {{$brand_color}} !important">
                    <p class="text-secondary">{{setting('content.home_hero_desc')}}</p>
                </div>
                <div class="col-lg-8">
                    <div class="brand-box">
                        @php
                            $brands = \App\Models\Brand::orderBy('urutan', 'asc')->get();
                        @endphp
                        @foreach ($brands as $brand)
                        <a href="{{route('brand.show', $brand->slug)}}" class="d-block">
                            <div class="brand-item position-relative">
                                <div class="content">
                                    <div class="hovering position-absolute top-0 bottom-0 start-0 end-0 bg-white akg-sec d-flex align-items-center justify-content-center">
                                        <div>
                                            <img src="{{Voyager::image($brand->logo)}}" alt="Artisan" class="d-block">
                                            <!-- <div class="font-bold akg-prm text-center">{{$brand->title}}</div> -->
                                        </div>
                                    </div>
                                    <div class="font-bold text-white fs-6">{{$brand->title}}</div>
                                </div>
                                <img src="{{Voyager::image($brand->bg_image)}}" alt="Alt">
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{{route('news')}}" class="text-white text-uppercase item-menu">News</a>
<a href="{{route('event')}}" class="text-white text-uppercase item-menu">Event</a>
<div class="menu-dropdown">
    <a href="#" class="btn-menu-dropdown text-white text-uppercase item-menu d-flex align-items-center justify-content-between">Coorporate
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 10l5 5l5-5" />
            </svg>
        </div>
    </a>
    <div class="mega-menu-mobile">
        <div class="box-menu-dropdown mega-menu-box mt-3 bg-white">
            <div class="row">
                <div class="col-md-6 d-none d-md-block">
                    <img src="{{Voyager::image(setting('content.menu_image'))}}" alt="Image Corporate" class="d-block w-100" style="aspect-ratio:16/9; object-fit:cover;">
                </div>
                <div class="col-md-6">
                    <div class="row align-items-center">
                        <div class="col-md-6 p-5">
                            <a href="{{route('about')}}" class="d-block text-decoration-none text-dark mega-menu-item">
                                <h6>{{setting('content.menu_about_title')}}</h6>
                                <p>{{setting('content.menu_about_desc')}}</p>
                            </a>
                        </div>
                        <div class="col-md-6 p-5">
                            <a href="{{route('career')}}" class="d-block text-decoration-none text-dark mega-menu-item">
                                <h6>{{setting('content.menu_career_title')}}</h6>
                                <p>{{setting('content.menu_career_desc')}}</p>
                            </a>
                        </div>
                        <div class="col-md-6 p-5">
                            <a href="{{route('contact')}}" class="d-block text-decoration-none text-dark mega-menu-item">
                                <h6>{{setting('content.menu_contact_title')}}</h6>
                                <p>{{setting('content.menu_contact_desc')}}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <form action="{{route('search')}}" method="GET">
        <div class="d-flex align-items-center gap-3">
            <input type="text" name="q" minlength="4" class="form-control border-2 outline-dark rounded-pill p-2 px-3 border-dark" placeholder="Find with min. 4 letters" style="font-size: 14px">
            <button type="submit" class="btn btn-dark akg-sec-bg rounded-pill p-2 px-3">Search</button>
        </div>
    </form>
</div>