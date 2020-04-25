<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- icon -->
    <link rel="icon" href="{{asset('assets/img/Fevicon.png')}}" type="image/png">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('admin/main.css')}}" rel="stylesheet"></head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="main-wrapper">
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            @include('admin.shared.header')

            <!-- @ include('admin.shared.settings') -->

            <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
                    @include('admin.shared.sidebar')
                </div>
                <div class="app-main__outer">
                    <div class="app-main__inner">

                        @yield('breadcrumb')

                        @yield('content')

                    </div>
                    @include('admin.shared.footer')
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{{asset('admin/assets/scripts/main.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
