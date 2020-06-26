@extends('layouts.app')

@section('content')
{{-- breadcrumb --}}
<div class="row" style="margin:10px 60px 0px 60px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ("home") }}" style="color:cornflowerblue">Home</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item"><a href="{{ route ("product.index") }}" style="color:cornflowerblue">Data
                        Toko</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
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
                    @if($product->picture)
                        @foreach($product->pictures->take(2) as $picture )
                        <img class="d-block img-fluid img-thumbnail rounded" src="{{ $picture->path() }}" /><br>
                        @endforeach
                    @else
                        <img class="d-block img-fluid img-thumbnail rounded" src="{{ asset('default.png') }}"/><br>
                    @endif
                </div>
                <div class="col-lg-8">
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>{{ $product->productType->name }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>{{ $product->desc }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('product.index') }}" class="btn btn-secondary btn-inverse" style="float:right"> <span
                    uk-icon="icon: arrow-left"></span> Back</a> </button>
        </div>
    </div>

    @stop
