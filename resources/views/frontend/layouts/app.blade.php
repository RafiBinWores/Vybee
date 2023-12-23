<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui" />
    <link rel="shortcut icon" href="{{ asset('front-assets/img/favicon.ico') }}" />

    <title>@yield('page-title')</title>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Questrial|Raleway:700,900" rel="stylesheet">

    <link href="{{ asset('front-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front-assets/css/bootstrap.extension.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front-assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front-assets/css/swiper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front-assets/css/sumoselect.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        #loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        /* HTML: <div class="loader"></div> */
        .loader {
            width: 50px;
            aspect-ratio: 1;
            display: grid;
        }

        .loader::before,
        .loader::after {
            content: "";
            grid-area: 1/1;
            --c: no-repeat radial-gradient(farthest-side, #06d87a 92%, #0000);
            background:
                var(--c) 50% 0,
                var(--c) 50% 100%,
                var(--c) 100% 50%,
                var(--c) 0 50%;
            background-size: 12px 12px;
            animation: l12 1s infinite;
        }

        .loader::before {
            margin: 4px;
            filter: hue-rotate(45deg);
            background-size: 8px 8px;
            animation-timing-function: linear
        }

        @keyframes l12 {
            100% {
                transform: rotate(.5turn)
            }
        }
    </style>
</head>

<body>

    {{-- Loader --}}
    <div id="loader-wrapper">
        <div class="loader"></div>
    </div>

    <div id="content-block">
        <!-- HEADER -->
        @include('frontend.layouts.header')

        {{-- Page content --}}
        @yield('content')

        <!-- FOOTER -->
        @include('frontend.layouts.footer')
    </div>

    {{-- Login regiristartion popup --}}
    @include('frontend.layouts.loginRegistrationPopup')



    <script src="{{ asset('front-assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/swiper.jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/global.js') }}"></script>

    <!-- styled select -->
    <script src="{{ asset('front-assets/js/jquery.sumoselect.min.js') }}"></script>

    <!-- counter -->
    <script src="{{ asset('front-assets/js/jquery.classycountdown.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery.knob.js') }}"></script>
    <script src="{{ asset('front-assets/js/jquery.throttle.js') }}"></script>

    {{-- custom js --}}
    @yield('customJs')

</body>

</html>
