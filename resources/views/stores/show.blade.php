@extends('layouts.app')

@section('content')
{{-- breadcrumb --}}
<div class="row" style="margin:10px 60px 0px 60px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ("home") }}" style="color:cornflowerblue">Home</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item"><a href="{{ route ("store.index") }}" style="color:cornflowerblue">Data
                        Toko</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$store->name}}</li>
            </ol>
        </nav>
    </div>
</div>
{{-- end breadcrumb --}}
<div class="container">
    <div class="card" style="margin-top:0px;">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    @if($store->picture)
                        @foreach($store->pictures->take(2) as $picture )
                        <img class="d-block img-fluid img-thumbnail rounded" src="{{ $picture->path() }}" /><br>
                        @endforeach
                    @else
                        <img class="d-block img-fluid img-thumbnail rounded" src="{{ asset('default.png') }}"/><br>
                    @endif
                </div>
                <div class="col-lg-8">
                    <h3 class="card-title">{{ $store->name }}</h3>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $store->name }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $store->address }}</td>
                            </tr>
                            <tr>
                                <td>Karisidenan</td>
                                <td>{{ $store->city->name }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>{{ $store->phone_number }}</td>
                            </tr>
                            <tr>
                                <td>Latitude</td>
                                <td>{{ $store->lat }}</td>
                            </tr>
                            <tr>
                                <td>Longitude</td>
                                <td>{{ $store->long }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>{{ $store->desc }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <iframe width="100%" height="300" marginwidth="0"
                        src="https://maps.google.com/maps?q={{ $store->lat }},{{ $store->long }}&hl=es;z=16&amp;output=embed">
                    </iframe>
                </div>
            </div>
            <a href="{{ route('store.index') }}" class="btn btn-secondary btn-inverse" style="float:right"> <span
                    uk-icon="icon: arrow-left"></span> Back</a> </button>
        </div>
    </div>

    @stop
