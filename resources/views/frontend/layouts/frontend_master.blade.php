<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('frontend/css/bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    
</head>
<body>
    
    @include('frontend.layouts.navbar')
    @yield('content')
    @include('frontend.layouts.footer')

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap5.bundle.min.js') }}" defer></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    
    @yield('scripts')
</body>
</html>
