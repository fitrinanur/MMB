@extends('layouts.app')

@section('content')
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
    <div class="container">
        <div class="card" style="margin-top: 30px;">
            <div class="card-body">
                <table class="table table-md block" style="width:100%">
                    <thead>
                        <h3>SETTING</h3>
                        <a href="{{ route('setting.edit', $setting->id) }}" class="btn btn-sm btn-danger"
                        style="float:right;margin-bottom:10px;"><i class="fa fa-pencil"
                        aria-hidden="true"></i> Edit Setting</a>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>{{ $setting->name }}</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>{{ $setting->nim }}</td>
                        </tr>
                        <tr>
                            <td>PRODI</td>
                            <td>{{ $setting->prodi }}</td>
                        </tr>
                        <tr>
                            <td>JUDUL</td>
                            <td>{{ $setting->title }}</td>
                        </tr>
                        <tr>
                            <td>LOGO</td>
                            <td class="d-block">
                                @if($setting->picture)
                                @foreach($setting->pictures->take(1) as $picture )
                                    <img class="d-block img-fluid img-thumbnail rounded" src="{{ $picture->path() }}" /><br>
                                @endforeach
                                @else
                                    <img class="d-block img-fluid img-thumbnail rounded" src="{{ asset('default.png') }}"/><br>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
@endsection