
{{-- <nav class="navbar navbar-expand-md shadow-sm">
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
                    <a class="nav-link" href="{{ route('welcome')}}">Home</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('setting.index')}}">Setting</a>
                    </li>
                    @endif
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.nearly')}}">Toko Terdekat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('website.direction')}}">Rute Toko</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
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
</nav> --}}
<div class="container row-fluid">
    <div class="card" style="margin-top:10px;">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    

                    <div class="row">
                        <div class="col-md-8">
                            <p style="color:dodgerblue">Lokasi anda saat ini :</p>
                            <p> <strong>Latitude : </strong> {{$latitude}}<br />
                                <strong>Longitude :</strong> {{$longitude}}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <iframe width="100%" height="300" marginwidth="0"
                                src="https://maps.google.com/maps?q={{ $latitude }},{{ $longitude }}&hl=es;z=16&amp;output=embed">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
    </div>
    <div class="card" style="margin-top:10px;">
        <div class="card-body">
            <h3 class="card-title">Rekomendasi Toko Disekitar Anda</h3>
            @foreach ($stores as $store)
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title">{{ $store->name }}</h3>
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $store->name }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $store->address }} - {{ $store->city->name}}</td>
                                </tr>
                                <tr>
                                    <td>Latitude</td>
                                    <td>{{ $store->latitude }}</td>
                                </tr>
                                <tr>
                                    <td>Longitude</td>
                                    <td>{{ $store->longitude }}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>{{ $store->desc }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr/>
                        @foreach($store->pictures->take(2) as $picture )
                        <img class="d-block img-fluid img-thumbnail rounded" src="{{ $picture->path() }}"/><br>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <iframe width="100%" height="300" marginwidth="0"
                            src="https://maps.google.com/maps?q={{ $store->latitude }},{{ $store->longitude }}&hl=es;z=16&amp;output=embed">
                        </iframe><br>
                        {{-- <div class="header-info">
                            <ul class="header-social">
                                <li style="background-color:tomato"><a href="#"
                                        title="Instagram" target="_blank" ><i class="fa fa-instagram"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li style="background-color:firebrick"><a href="#" title="Youtube"
                                        target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div><!-- .header-info --> --}}
                    </div>
                </div>

            </div>
                <p class="card-text">
                    {{-- <small class="text-muted">{{ $store->created_at->diffForHumans()}}</small> --}}
                </p>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
