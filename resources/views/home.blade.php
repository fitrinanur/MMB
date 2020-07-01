@extends('layouts.app')

@section('content')
{{-- @include('navbar') --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-top: 50px">
                <div class="card-header">
                <h5>Hi, {{ auth()->user()->name }} !</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if(Auth()->user()->name === "admin")
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p style="text-align:center;color:gray;font-size:12px;">Data Toko</p>
                                    <h3 style="text-align:center"><a href="{{ route('store.index') }}"><i
                                                class="fa fa-2x fa-home"></i></a>{{ $stores->count() }}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p style="text-align:center;color:gray;font-size:12px;">Data Furniture</p>
                                    <h3 style="text-align:center"><a href="{{ route('store.index') }}"><i
                                                class="fa fa-2x fa-home"></i></a>{{ $products->count() }}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p style="text-align:center;color:gray;font-size:12px;">Data Kategori Furniture</p>
                                    <h3 style="text-align:center"><a href="{{ route('store.index') }}"><i
                                                class="fa fa-2x fa-home"></i></a>{{ $product_types->count() }}</h3>

                                </div>
                            </div>
                        </div>
                        @else
                        <p>Kamu bukan admin!</p>
                        @endif
                    </div>
                </div>
            </div>
            <br/>
        </div>
    </div>
</div>
@endsection
