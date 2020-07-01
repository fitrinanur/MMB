
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
        body {
            /* background-image: url("https://previews.123rf.com/images/olgastocker/olgastocker1710/olgastocker171000232/88854284-vector-minimalist-background-simple-modern-geometric-seamless-pattern-with-small-thin-lines-squares-.jpg") ; */
            /* opacity: 100px !important; */
            background-color:gainsboro;
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
            background-color: white;
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

        .about {
            border: grey solid 1px;
            padding: 20px;
            margin: 0px 10px 10px 0px ;
            text-align: center;
            background-color: white
        }

    </style>
    </head>
    <body>
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
        @include('navbar')
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="img-logo">
                    <img src="https://1.bp.blogspot.com/-ZT52Eel0ea8/XTsPWjVjkaI/AAAAAAAAAHo/-eqTSwanuUUMNssOPEBiGt0EH_ov6mJfACLcBGAs/s1600/5.STMIK.png" width="200px" height="200" alt="" style="margin: 30px 0px 30px 350px">
                    <img src="https://ecs7-p.tokopedia.net/img/cache/215-square/shops-1/2018/10/13/3009150/3009150_dc0191e3-27ef-45e9-bc7e-35da89f881fe.png" width="200px" height="200" alt="" style="margin: 30px 0px 30px 10px">
                </div>
                <div class="about">
                    @foreach($settings as $setting)
                    <h4>{{$setting->title}}</h4>
                    <p>
                    {{ ucwords($setting->name)}}<br>
                    {{ $setting->nim }}<br/>
                    {{ ucwords($setting->prodi) }}</p>

                    <p>STMIK SINAR NUSANTARA</p>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="vision">
                            <div class="card">
                                <div class="card-body">
                                    <div class="title">
                                        <h5>VISI</h5>
                                    </div>
                                    <hr>
                                    <ul>
                                    @foreach($vission as $visi)
                                        <li>{{$visi->desc}}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mision">
                            <div class="card">
                                <div class="card-body">
                                    <div class="title">
                                        <h5>MISI</h5>
                                    </div>
                                    <hr>
                                    <ul>
                                    @foreach($mission as $misi)
                                    <li>{{$misi->desc}}</li>
                                    @endforeach  
                                    </ul>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- <div class="col-md-4">
                <div class="slider" style="padding-top: 30px;">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ public_path('storage/images/stores/5ef5922e43f3d.jpeg')}}" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://placehold.co/600x400" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://placehold.co/600x400" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
                
            </div> --}}
            
        </div>
        </div>


    </body>
</html>

