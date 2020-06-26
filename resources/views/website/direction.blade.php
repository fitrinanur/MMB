@extends('layouts.app')

@section('content')
{{-- @push('styles')
    @mapstyles
@endpush --}}
<nav class="navbar navbar-expand-md shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home')}}">Home</a>
                </li>
                @guest
                @else
                    @if( Auth::user()->name == "admin" )
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Data Master
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('store.index') }}">Data Toko</a>
                            <a class="dropdown-item" href="{{ route('product-type.index') }}">Data Kategori Furniture</a>
                            <a class="dropdown-item" href="{{ route('product.index') }}">Data Furniture</a>  
                        </div>
                    </li>
                    @endif
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.nearly')}}">Toko Terdekat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.direction')}}">Rute Wisata</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                {{-- @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif --}}
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="card" style="margin:10px;">
        <div class="card-body">
            <h3>Rute Wisata</h3>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{route('direction.store')}}" method="POST">
                        @csrf
                        <label for="exampleInputEmail1">Lokasi Awal</label><br>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control start_location" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Lokasi Awal" name="start_location">
                                <div class="form-row">
                                    <div class="col"> 
                                        <input type="text" class="form-control latitude_awal" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Lokasi Awal" name="latitude_awal">
                                    </div>
                                    <div class="col"><input type="text" class="form-control longitude_awal" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Lokasi Awal" name="longitude_awal">
                                    </div>
                                </div>
                                <small id="emailHelp" class="form-text text-muted">Masukan lokasi awal yang anda inginkan</small>
                               
                            </div>
                            <div class="col">
                               <button type="button" class="btn btn-info" id="get-mylocation">Ambil Lokasi Saat Ini</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Input Destinasi</label><br>
                            <select class="custom-select destinationType" name="type">
                                <option selected>Pilih</option>
                                @foreach ($directionTypes as $key => $directionType)
                                    <option value="{{$key}}" name="type">{{$directionType}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group address-box">
                            <label for="exampleInputEmail1">Alamat</label><br>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group coordinat-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Ex : -8.000696">
                                   
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Longitude</label>
                                    <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Ex : 110.3539">
                                </div>
                            </div>
                           
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@push('javascript')
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCBCAjJsVHTyMD9msfS2a8QQUeRGLLimtA&ver=3.exp"></script>
<script>
    var $ = jQuery;
    $(document).ready(function () {
        $('.address-box').hide();
        $('.coordinat-box').hide();
        $(".latitude_awal").hide();
        $(".longitude_awal").hide();


        $('.destinationType').on('change', function() {
            if($('.destinationType').val() == 1){
               $('.address-box').show();
               $('.coordinat-box').hide();
            }else{
                $('.coordinat-box').show();
                $('.address-box').hide();
            }
        });
        $( "#get-mylocation" ).click( function(e) {
            e.preventDefault();
    
            /* Chrome need SSL! */
            var is_chrome = /chrom(e|ium)/.test( navigator.userAgent.toLowerCase() );
            var is_ssl    = 'https:' == document.location.protocol;
            if( is_chrome && ! is_ssl ){return false;}
 
        /* HTML5 Geolocation */
            navigator.geolocation.getCurrentPosition(
                function( position ){ // success cb
    
                    /* Current Coordinate */
                    var lat = position.coords.latitude;
                  
                    var lng = position.coords.longitude;
                    $(".start_location").hide();
                    $(".latitude_awal").show();
                    $(".longitude_awal").show();

                    $(".latitude_awal").val(lat);
                    $(".longitude_awal").val(lng);
                    
                    var google_map_pos = new google.maps.LatLng( lat, lng );
    
                    /* Use Geocoder to get address */
                    var google_maps_geocoder = new google.maps.Geocoder();
                    google_maps_geocoder.geocode(
                        { 'latLng': google_map_pos },
                        function( results, status ) {
                           
                            if ( status == google.maps.GeocoderStatus.OK && results[0] ) {
                                $('.start_location').val(results[0].formatted_address);
                                console.log( results[0].formatted_address );
                            }
                        }
                    );
                },
            );
        });
    });
</script>
@endpush

