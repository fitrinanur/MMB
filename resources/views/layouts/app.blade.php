<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('flash::message')
    @stack('styles')
    <style>
        body {
            /* background-image: url("{{ asset('simple-pattern.jpeg') }}") ; */
            background-repeat: repeat-x repeat-y;
        }

        .top-header {
            background-color: #D0303F;
            font-family: 'Source Sans Pro', sans-serif;
        }

        .top-right {
            float: right;
        }

        .top-nav {
            float: left;
            margin-top: 15px;
        }

        .top-title-nav>a {
            font-family: 'Source Sans Pro', sans-serif;
            color: white;
            font-weight: 700;
            font-size: 20px;
        }

        .header-info>ul {
        list-style-type: none;
        display: inline-flex;
        padding: 3px;
        }

        .header-info>ul>li {
            padding: 2px 10px;
            margin-left: 10px;
            border-radius: 5px;
        }

        .header-info>ul>li>a {
            color: white;
            font-size: 25px;
        }
        .navbar {
            padding: 7px 0px 13px 13px !important;
        }

        .navbar-collapse {
            padding: 8px !important;
        }

        .navbar-collapse>ul>li>a {
            font-family: 'Source Sans Pro', sans-serif;
            color: #888888;
            font-weight: 600;
            font-size: 18px !important;
            line-height: 23px !important;
            text-transform: capitalize !important;
            padding: 7px !important;
            margin: 7px !important;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #3F1871;
            color: white;
            text-align: center;
            font-size: 14px;
            padding: 10px;
        }

    

        footer > .phone_number {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 14px;
        }

        .copyright > p {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 16px;
        }
        footer > .phone_number > p, a {
            color: white;
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 16px;
        }

        footer .number_pengaduan {
            color: white;
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 16px;
        }

    </style>

</head>

<body>
    <div id="app">
        {{-- header --}}
        <header id="header" class="site-header">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <nav class="top-nav">
                                <div class="top-title-nav">
                                    <a href="{{ route('home') }}" target="_blank">Margo Murah Baru</a>
                                </div>
                            </nav>
                        </div>

                        <div class="col-md-6">
                            <div class="top-right">
                                <div class="header-info">
                                    <ul class="header-social">
                                        <li><a href="#"
                                                title="facebook" target="_blank"><i class="fa fa-facebook"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="#" title="Twitter"
                                                target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="https://www.instagram.com/margomurahbaru/?hl=id"
                                                title="Instagram" target="_blank"><i class="fa fa-instagram"
                                                    aria-hidden="true"></i></a>
                                        </li>
                                        <li><a href="https://www.youtube.com/channel/UCdOLcunh60626r-Q86qNo_g" title="Youtube"
                                                target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div><!-- .header-info -->
                            </div><!-- .top-right -->
                        </div>
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .top-header -->
        </header>
        {{-- end header --}}

        @include('flash::message')
    <main>
        @include('navbar')
        @yield('content')
    </main>

        {{-- <footer id="footer" class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright">
                            <p>Surakarta</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="pull-right number_pengaduan">
                           
                        </span>
                    </div>
                </div>
            </div>
        </footer> --}}
    </div>
    @stack('javascript')
</body>

</html>
