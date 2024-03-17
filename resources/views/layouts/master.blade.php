<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--Styles css common--}}
    <!--== Favicon ==-->
    <link
      rel="shortcut icon"
      href="{{asset('favicon.ico')}}"
      type="image/x-icon"
    />

    <!--== Google Fonts ==-->
    <link
      href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700%7CPoppins:400,400i,500,600&display=swap"
      rel="stylesheet"
    />

    <!-- build:css -->
    <!--== Leaflet Min CSS ==-->
    <link href="{{asset('css/leaflet.min.css')}}" rel="stylesheet" />
    <!--== Nice Select Min CSS ==-->
    <link href="{{asset('css/nice-select.min.css')}}" rel="stylesheet" />
    <!--== Slick Slider Min CSS ==-->
    <link href="{{asset('css/slick.min.css')}}" rel="stylesheet" />
    <!--== Magnific Popup Min CSS ==-->
    <link href="{{asset('css/magnific-popup.min.css')}}" rel="stylesheet" />
    <!--== Slicknav Min CSS ==-->
    <link href="{{asset('css/slicknav.min.css')}}" rel="stylesheet" />
    <!--== Animate Min CSS ==-->
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <!--== Ionicons Min CSS ==-->
    <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet" />
    <!--== Font-Awesome Min CSS ==-->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
    <!--== Bootstrap Min CSS ==-->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <!--== Helper Min CSS ==-->
    <link href="{{asset('css/helper.min.css')}}" rel="stylesheet" />
    <!-- endbuild -->
    @yield('style-libraries')
    {{--Styles custom--}}
    @yield('styles')
</head>
<body>
    @include('partial.header')

    @yield('content')

    @include('partial.footer')

    {{--Scripts js common--}}
    <!-- build:js -->
    <!--=== Modernizr Min Js ===-->
    <script src="{{asset('js/modernizr-3.6.0.min.js')}}"></script>
    <!--=== jQuery Min Js ===-->
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="{{asset('js/jquery-migrate-1.2.1.min.js')}}"></script>
    <!--=== Popper Min Js ===-->
    <script src="{{asset('js/popper.min.js')}}"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <!--=== Slick Slider Min Js ===-->
    <script src="{{asset('js/slick.min.js')}}"></script>
    <!--=== Nice Select Min Js ===-->
    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <!--=== Leaflet Min Js ===-->
    <script src="{{asset('js/leaflet.min.js')}}"></script>
    <!--=== Countdown Js ===-->
    <script src="{{asset('js/countdown.js')}}"></script>

    <!--=== Active Js ===-->
    <script src="{{asset('js/active.js')}}"></script>
    <!-- endbuild -->
    {{--Scripts link to file or js custom--}}
    @yield('scripts')
</body>
</html>
