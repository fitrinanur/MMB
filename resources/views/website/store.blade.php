@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-3" style="margin-top: 30px;">
        @foreach ($stores as $store)
        <div class="col mb-4">
            <div class="card">
                <div class="image" style="border-radius: 20px;padding:5px;">
                @foreach($store->pictures->take(1) as $picture )
                    <img src="{{ $picture->path() }}" class="card-img-top" alt="...">
                @endforeach
                </div>
                <div class="card-body">
                    <h5 class="card-title"> {{$store->name}} </h5>
                    <p class="card-text">
                        <div class="about-store">
                            <div class="detail-store" style="font-family: 'Roboto', sans-serif;color:grey;">
                                <p > {{ $store->address}}<br/>
                                    {{$store->phone_number}}</p>
                            </div>
                            <p style="text-align: justify">{{$store->desc}}</p>
                        </div>
                    <a type="button" class="btn btn-primary btn-md btn-block" href="https://www.google.com/maps/dir/Current+Location/{{ $store->latitude }},{{$store->longitude}}"> <i class="fa fa-map-marker"></i> Arahkan Saya</a>

                    </p>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    @endsection
