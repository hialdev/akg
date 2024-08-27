<footer class="position-relative py-5">
    <div class="container">
        <div class="row">
            <div class="col-6 mb-4 col-lg-3">
            @if (strlen(setting('site.logo_footer')) > 2)
                <img src="{{Voyager::image(setting('site.logo_footer'))}}" alt="AKG Footer Logo" class="d-block w-100" style="max-width: 10em">
            @else
                <img src="{{env('APP_URL')}}/src/images/logo/logo-akg.svg" alt="AKG Footer Logo" class="d-block w-100" style="max-width: 10em">
            @endif
            </div>
            <div class="col-6 mb-4 col-lg-3">
                <h5 class="mb-3">Brands</h5>
                <ul class="d-flex flex-column gap-2 list-unstyled">
                    @php
                      $brand_links = \App\Models\Brand::orderBy('urutan', 'asc')->get();
                    @endphp
                    @foreach($brand_links as $brd)
                    <li><a href="{{route('brand.show', $brd->slug)}}" class="footer-link">{{$brd->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6 mb-4 col-lg-3">
                <h5 class="mb-3">Quick Link</h5>
                <ul class="d-flex flex-column gap-2 list-unstyled">
                    <li><a href="{{route('corporate')}}" class="footer-link">About Us</a></li>
                    <li><a href="{{route('corporate')}}" class="footer-link">Careers</a></li>
                    <li><a href="{{route('corporate')}}" class="footer-link">Contact Us</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    @if (setting('social-media.smlink_fb'))
                    <a href="{{url(setting('social-media.smlink_fb'))}}" target="_blank" class="d-flex align-items-center akg-sec-bg text-white p-2" style="background: {{Route::is('brand.show') ? $brand_color : ''}} !important">
                        <span class="iconify" data-icon="bi:facebook" data-inline="false"></span>
                    </a>
                    @endif
                    @if (setting('social-media.smlink_twitter'))
                    <a href="{{url(setting('social-media.smlink_twitter'))}}" target="_blank" class="d-flex align-items-center akg-sec-bg text-white p-2" style="background: {{Route::is('brand.show') ? $brand_color : ''}} !important">
                        <span class="iconify" data-icon="bi:twitter" data-inline="false"></span>
                    </a>
                    @endif
                    @if (setting('social-media.smlink_ig'))
                    <a href="{{url(setting('social-media.smlink_ig'))}}" target="_blank" class="d-flex align-items-center akg-sec-bg text-white p-2" style="background: {{Route::is('brand.show') ? $brand_color : ''}} !important">
                        <span class="iconify" data-icon="bi:instagram" data-inline="false"></span>
                    </a>
                    @endif
                    @if (setting('social-media.smlink_in'))
                    <a href="{{url(setting('social-media.smlink_in'))}}" target="_blank" class="d-flex align-items-center akg-sec-bg text-white p-2" style="background: {{Route::is('brand.show') ? $brand_color : ''}} !important">
                        <span class="iconify" data-icon="bi:linkedin" data-inline="false"></span>
                    </a>
                    @endif
                    @if (setting('social-media.smlink_yt'))
                    <a href="{{url(setting('social-media.smlink_yt'))}}" target="_blank" class="d-flex align-items-center akg-sec-bg text-white p-2" style="background: {{Route::is('brand.show') ? $brand_color : ''}} !important">
                        <span class="iconify" data-icon="bi:youtube" data-inline="false"></span>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col-6 mb-4 col-lg-3">
                <h5 class="mb-3">Updates</h5>
                <ul class="d-flex flex-column gap-2 list-unstyled">
                    <li><a href="{{route('news')}}" class="footer-link">News</a></li>
                    <li><a href="{{route('event')}}" class="footer-link">Event</a></li>
                </ul>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3 pt-5">
            &copy; {{date('Y')}} Artisan Kuliner Group. All rights reserved.
        </div>
    </div>

    <img src="{{env('APP_URL')}}/src/images/decor/decor-footer.svg" alt="Footer" class="d-block" style="filter:{{Route::is('brand.show') ? 'grayscale(100)' : ''}};width:40%; position: absolute; bottom:0; right:0">
</footer>