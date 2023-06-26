<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta http-equiv="Content-Security-Policy"
        content="default-src *; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' 'unsafe-eval' http://yearbookumb.com"> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'YearBook Website - Universitas Mercu Buana') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400;700&family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    @yield('headscript')
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand text-umb-blue" href="{{ url('/') }}">
                    <img class="mb-3" src="{{asset('img/logo.png')}}" alt="logo-image" height="40">
                    <span class="text-umb-blue ml-1" style="font-size: 40px; letter-spacing: 5px;">YEARBOOK</span>
                </a>
                @can('add pdf')
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @endcan
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <img src="{{asset('img/umb.png')}}" alt="logo-image" class="nav-right-logo">
                        @can('add pdf')
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <h6>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </h6>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <h6>
                                        {{ __('Logout') }}
                                    </h6>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                        @endcan
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
        <footer class="main-footer bg-umb-blue pt-5 pb-5">
            <div class="container">
                <div class="footer-content">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center mb-3">
                            <img src="{{asset('img/umb-white.png')}}" alt="logo-image" height="40">
                            <span class="text-white ml-1" style="font-size: 40px; letter-spacing: 5px;">YEARBOOK</span>
                        </div>
                        <div class="col-12">
                            <h4 class="text-white">Universitas Mercu Buana</h4>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-widget">
                            <div class="contact-widget footer-widget">
                                <h6 class="footer-title mb-3 text-white font-bold">Kampus Meruya</h6>
                                <div class="text-white font-light footer-content-text">
                                    <p>Jl. Meruya Selatan No.1, Kembangan - Jakarta Barat</p>
                                    <p>Telepon: 021-5840815, 021-5840816</p>
                                    <p>(ext.2751, ext.2400) Fax: 021-5861780</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-widget">
                            <div class="contact-widget footer-widget">
                                <h6 class="footer-title mb-3 text-white font-bold">Kampus Jatisampurna</h6>
                                <div class="text-white footer-content-text">
                                    <p>Jl. Raya Kranggan No.6 Jatisampurna - Bekasi</p>
                                    <p>Telepon: 021-58449635</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-widget">
                            <div class="contact-widget footer-widget">
                                <h6 class="footer-title mb-3 text-white font-bold">Kampus Menteng</h6>
                                <div class="text-white footer-content-text">
                                    <p>Jl. Menteng Raya No.29 - Jakarta Pusat</p>
                                    <p>Telepon: 021-31935454</p>
                                    <p>Fax: 021-31934474</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-widget">
                            <div class="contact-widget footer-widget">
                                <h6 class="footer-title mb-3 text-white font-bold">Kampus Warung Buncit</h6>
                                <div class="text-white footer-content-text">
                                    <p>Jl. Warung Buncit No.98 - Jakarta Selatan</p>
                                    <p>Telepon: +62 8177 6631 933</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 text-center my-sm-5">
                            <div class="logo-widget footer-widget float-lg-right">
                                <figure class="logo-box"><a href="https://yearbookumb.com">
                                        <img src="{{asset('img/Logo_UMB_Putih_besar.png')}}" alt="" height="150"></a>
                                </figure>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-2 col-md-6 col-sm-12 footer-widget">
                            <div class="contact-widget footer-widget">
                                <h6 class="footer-title mb-3 text-white font-bold">Links</h6>
                                <div class="text-white footer-content-text">
                                    <p><a class="text-white" href="events">Events</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center gap-3">
                            <a href="http://www.facebook.com/univmercubuana" target="_blank"><i class="bi-facebook text-white mr-4" style="font-size: 30px;"></i></a>
                            <a href="http://www.twitter.com/univmercubuana" target="_blank"><i class="bi-twitter text-white mr-4" style="font-size: 30px;"></i></a>
                            <a href="https://www.linkedin.com/school/universitas-mercu-buana/" target="_blank"><i class="bi-linkedin text-white mr-4" style="font-size: 30px;"></i></a>
                            <a href="#"><i class="bi-envelope-fill text-white mr-4" style="font-size: 30px;"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-12 m-auto">
                        <div class="footer-content-text text-black text-center"><a href="https://yearbookumb.com">COPYRIGHT</a> &copy;
                            UNIVERSITAS MERCU BUANA, {{ date('Y') }} All Right Reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>