@extends('layouts.app')

@section('content')
{{-- @include('navbar') --}}
<div class="row" style="margin:10px 95px 0px 95px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ("home") }}" style="color:cornflowerblue">Home</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active" aria-current="page">Data Product</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card" style="margin-top:0px;">
            <div class="card-body">
                <h3 class="card-title">Data Product</h3>
                <a href="{{ route('product.create') }}" class="btn btn-sm btn-info"
                    style="float:right;margin-bottom:10px;"><i class="fa fa-plus" aria-hidden="true"></i> Tambah
                    Toko</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th colspan="3" style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->ProductType->name }}</td>
                            <td>{{ $product->desc }}</td>
                            <td>
                                <a href="{{ route('product.show', $product->id)}}" class="btn btn-sm btn-success"><i
                                        class="fa fa-list" aria-hidden="true"></i></a><br>
                                <a href="{{ route('product.edit', $product->id)}}" class="btn btn-sm btn-primary"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                <form action="{{ route('product.destroy', $product->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"
                                            aria-hidden="true"></i></button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
