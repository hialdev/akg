<div class="menu-dropdown">
    <a href="#" class="text-white text-uppercase item-menu">Brand</a>
    <div class="mega-menu">
        <!-- Isi mega menu untuk Brand -->
        <div class="mega-menu-box">
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
    <a href="#" class="text-white text-uppercase item-menu">Coorporate</a>
    <div class="mega-menu">
        <div class="mega-menu-box">
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