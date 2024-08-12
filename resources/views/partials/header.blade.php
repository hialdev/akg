<header>
    <div class="d-none d-md-block">
        @if (Route::currentRouteName() == 'home')
        <nav class="menu-box position-absolute d-flex align-items-center justify-content-between m-1 p-2 px-4" style="z-index: 999">
            <a href="{{route('home')}}" class="text-decoration-none d-flex align-items-center justify-center">
                @if (strlen(setting('site.logo')) > 2)
                    <img src="{{Voyager::image(setting('site.logo'))}}" alt="Logo AKG Gold" class="d-block" style="{{Route::is('brand.show') ? 'filter:brightness(1000%)' : ''}};max-height:4em;">
                @else
                    <img src="{{env('APP_URL')}}/src/images/logo/logo-akg-gold.png" alt="Logo AKG Gold" class="d-block" style="{{Route::is('brand.show') ? 'filter:brightness(1000%)' : ''}};max-height:4em;">
                @endif  
            </a>
            <div class="d-flex align-items-center gap-5">
                @include('partials.menu', ['brand_color' => $brand_color])
                <button class="search-button btn text-warning p-0 m-0 d-flex align-items-center justify-content-center" style="color: {{Route::is('brand.show') ? '#fff': ''}} !important">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
                    </svg>
                </button>
            </div>
        </nav>
        @else
        <nav class="d-flex align-items-center justify-content-between p-1 px-3 akg-prm-bg" style="z-index: 999; background: {{$brand_color}} !important">
            <a href="{{route('home')}}" class="text-decoration-none d-flex align-items-center justify-center">
            @if (strlen(setting('site.logo')) > 2)
                <img src="{{Voyager::image(setting('site.logo'))}}" alt="Logo AKG Gold" class="d-block" style="{{Route::is('brand.show') ? 'filter:brightness(1000%)' : ''}};max-height:4em;">
            @else
                <img src="{{env('APP_URL')}}/src/images/logo/logo-akg-gold.png" alt="Logo AKG Gold" class="d-block" style="{{Route::is('brand.show') ? 'filter:brightness(1000%)' : ''}};max-height:4em;">
            @endif
            </a>
            <div class="menu-box d-flex">
                @include('partials.menu', ['brand_color' => $brand_color])
                <button class="search-button btn text-warning p-0 m-0 d-flex align-items-center justify-content-center" style="color: {{Route::is('brand.show') ? '#fff': ''}} !important">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
                    </svg>
                </button>
            </div>
        </nav>
        @endif
    </div>
    <div class="d-md-none">
        <nav class="p-3 akg-prm-bg d-flex align-items-center justify-content-between" style="background: {{Route::is('brand.show') ? $brand_color : ''}} !important">
            <div class="">
                <a href="{{route('home')}}" class="text-decoration-none d-flex align-items-center justify-center">
                    <img src="{{env('APP_URL')}}/src/images/logo/logo-akg-gold.png" alt="Logo AKG Gold" class="d-block" style="{{Route::is('brand.show') ? 'filter:brightness(1000%)' : ''}};max-height:4em;">
                </a>
            </div>
            {{-- <div class="col-4">
                <div class="btn-menu-mobile d-flex align-items-center justify-content-center akg-sec">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20">
                        <path fill="currentColor" d="M4 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 4.25m-2 5a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 9.25m4.75 4.25a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5z" />
                    </svg>
                </div>
            </div> --}}
            <div class="">
                <button class="ms-auto search-button btn akg-sec p-0 m-0 d-flex align-items-center justify-content-center" style="color: {{Route::is('brand.show') ? '#fff': ''}} !important">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m21 21l-4.343-4.343m0 0A8 8 0 1 0 5.343 5.343a8 8 0 0 0 11.314 11.314" />
                    </svg>
                </button>
            </div>
            
        </nav>
        <div class="col-12 p-0">
            <div class="menu-box-mobile d-flex justify-content-start gap-5 p-2 px-4 akg-sec-bg" style="{{Route::is('brand.show') ? 'background:#14262C !important' : ''}};overflow:auto">
                @include('partials.menu', ['brand_color' => $brand_color])
            </div>
        </div>
    </div>
</header>

{{-- Modal Search --}}
<div class="modal-search p-3 position-fixed top-0 end-0 start-0 bottom-0 d-none align-items-center justify-content-center" style="background-color:#2121216b;z-index: 99999">
    <div class="position-relative p-4 bg-white" style="max-width: 30em">
        <div class="fs-5 fw-semibold">Search</div>
        <p>Cari artikel, news, brand, event, atau career pada Artisan Kuliner Group</p>
        <form action="{{route('search')}}" method="GET">
            <div class="d-flex align-items-center gap-3">
                <input type="text" name="q" minlength="4" class="form-control border-2 outline-dark rounded-0 p-2 px-3 border-dark" placeholder="Cari dengan minimal 4 huruf">
                <button type="submit" class="btn btn-dark rounded-0 p-2 px-3">Cari</button>
            </div>
        </form>
        <div class="close-search position-absolute top-0 end-0 p-2 bg-light text-secondary" style="cursor: pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                <path fill="currentColor" fill-rule="evenodd" d="M4.28 3.22a.75.75 0 0 0-1.06 1.06L6.94 8l-3.72 3.72a.75.75 0 1 0 1.06 1.06L8 9.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L9.06 8l3.72-3.72a.75.75 0 0 0-1.06-1.06L8 6.94z" clip-rule="evenodd" />
            </svg>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var modalSearch = document.querySelector('.modal-search');
    var btnSearch = document.querySelector('.search-button');
    var closeSearch = document.querySelector('.close-search');
            
    btnSearch.addEventListener('click', function() {
        modalSearch.classList.remove('d-none');
        modalSearch.classList.add('d-flex');
    });
    
    closeSearch.addEventListener('click', function() {
        modalSearch.classList.remove('d-flex');
        modalSearch.classList.add('d-none');
    });
});
</script>