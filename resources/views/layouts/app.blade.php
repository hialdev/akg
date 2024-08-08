<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artisan Kuliner Group - Official Site</title>
    @if (setting('site.favicon'))
        <link rel="shortcut icon" href="{{Voyager::image(setting('site.favicon'))}}" type="image/x-icon">
    @else
        <link rel="shortcut icon" href="{{env('APP_URL')}}/src/images/logo/logo-akg-gold.png" type="image/x-icon">
    @endif
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!-- Owl Carousel 2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Internal CSS -->
    <link rel="stylesheet" href="{{env('APP_URL')}}/src/css/style.css">
</head>
<body>

    @include('partials.header')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    @yield('script')
    
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Owl Carousel 2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- Iconify -->
    <script src="https://code.iconify.design/3/3.0.0/iconify.min.js"></script>
    <script>
    var modalSearch = document.querySelector('.modal-search');
    var btnSearch = document.querySelector('.search-button');
    var closeSearch = document.querySelector('.close-search');
            
    btnSearch.addEventListener('click', function() {
        modalSearch.classList.remove('d-none');
        modalSearch.classList.add('d-flex');
        console.log("clicked Button Search");
    });
    
    closeSearch.addEventListener('click', function() {
        modalSearch.classList.remove('d-flex');
        modalSearch.classList.add('d-none');
        console.log("clicked Close Search");
    });
    </script>
    <!-- Internal JS -->
    <script src="{{env('APP_URL')}}/src/js/carousel.js"></script>
    <script src="{{env('APP_URL')}}/src/js/script.js"></script>

</body>
</html>
