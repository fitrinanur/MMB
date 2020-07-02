@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb" style="margin-top:30px; ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route ("home") }}" style="color:cornflowerblue">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route ("website.product") }}" style="color:cornflowerblue">Halaman Furniture</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail {{ $products->name}}</li>
        </ol>
    </nav>
    <div class="row">
        {{-- <div class="col-lg-12"> --}}
            <div class="col-md-8">
                <div class="card" style="margin-top: 5px;">
                    @foreach($products->pictures->take(1) as $picture )
                    <img src="{{ $picture->path() }}" class="card-img-top" alt=".." style="width:600px;height:400px; padding:5px; margin:10px 0px 10px 60px">
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="margin-top: 5px;">
                    <div class="card-header" style="background-color: #D0303F">
                        <h5 style="font-family: 'Roboto';color:white">Informasi Product</h5>
                    </div>
                    <div class="card-body">
                        <h3>{{ $products->name}}</h3>
                        <p style="font-family: 'Roboto'; color:white;background-color:#37D297; margin: 0px 220px 10px 0px;padding:5px; font-size:11px;">{{ $products->productType->name }}</p>
                        <br/>
                        <p>{{ $products->desc}}</p>
                        <h3>Rp. {{ number_format($products->price) }}</h3>
                    </div>
                   
                </div>
                <a type="button" class="btn btn-dark" href="{{ route('website.product')}}" style="float: right;margin-top:10px"> Kembali</a>
            </div>
        {{-- </div> --}}
    </div>
</div>
@endsection
