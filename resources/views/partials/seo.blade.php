{{-- Default SEO Meta Tags --}}
<title>{{ $title ?? config('app.name') }}</title>
<meta name="description" content="{{ $description ?? 'Artisan Kuliner Group - Make Taste Your Life with Our Culinary' }}">
<meta name="keywords" content="{{ $keywords ?? 'Artisan Kuliner Group, brand kuliner Indonesia, kuliner autentik, pengalaman kuliner, inovasi makanan' }}">
<meta name="author" content="{{ 'Artisan Kuliner Group' }}">
<meta name="robots" content="index">
<meta name="image" content="{{ $image ?? env('APP_URL').'/src/images/logo/logo-akg-gold.png' }}">

{{-- Open Graph Meta Tags --}}
<meta property="og:title" content="{{ $title ?? config('app.name') }}">
<meta property="og:description" content="{{ $description ?? 'Artisan Kuliner Group - Make Taste Your Life with Our Culinary' }}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ $image ?? env('APP_URL').'/src/images/logo/logo-akg-gold.png' }}">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:locale" content="{{ app()->getLocale() }}">

{{-- Twitter Card Meta Tags --}}
<meta name="twitter:card" content="{{ 'summary_large_image' }}">
<meta name="twitter:title" content="{{ $title ?? config('app.name') }}">
<meta name="twitter:description" content="{{ $description ?? 'Artisan Kuliner Group - Make Taste Your Life with Our Culinary' }}">
<meta name="twitter:image" content="{{ $image ?? env('APP_URL').'/src/images/logo/logo-akg-gold.png' }}">

{{-- Additional Meta Tags --}}
<link rel="canonical" href="{{ url()->current() }}">
