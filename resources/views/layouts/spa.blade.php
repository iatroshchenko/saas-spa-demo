<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

@stack('plugin-styles')

<!-- common css -->
    <link id="mainStyle" href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <!-- end common css -->

    @stack('style')
</head>
<body data-base-url="{{url('/')}}">

@if(session('email') === 'verified')
    <div id="email-verified" style="display: none;"></div>
@endif

@if(session('new-email') === 'verified')
    <div id="new-email-verified" style="display: none;"></div>
@endif

@if(session('quote') === 'converted-to-order')
    <div id="quote-converted-to-order" style="display: none;"></div>
@endif

@yield('content')

<!-- base js -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- end base js -->

<!-- plugin js -->
@stack('plugin-scripts')
<!-- end plugin js -->

@stack('custom-scripts')
</body>
</html>
