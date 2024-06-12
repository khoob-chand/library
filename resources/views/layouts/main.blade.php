
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link href="{{ asset('css/hover.css') }}" rel="stylesheet">

    @stack('title')
    @vite(['resources/css/app.css'])
</head>
<body>

    @include('layouts.header')
    <div id="app">
        @yield('main-section')
        @if (Auth::check() && session('msg') !="")
        <div class="alert alert-success d-flex align-items-center container mt-2" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
        {{session('msg')}}
        </div>
        </div>
        @endif
        @if (request()->is('/'))
        @include('carousel')
        @include('library_thoughts')
        @endif
        @include('layouts.footer')


    </div>
    @vite(['resources/js/app.js'])
</body>

</html>

