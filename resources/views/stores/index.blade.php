@extends('layouts.app')

@section('content')
{{-- @include('navbar') --}}
{{-- breadcrumb --}}
<div class="row" style="margin:10px 95px 0px 95px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ("home") }}" style="color:cornflowerblue">Home</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active" aria-current="page">Data Toko</li>
            </ol>
        </nav>
    </div>
</div>
{{-- end breadcrumb --}}
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card" style="margin-top:0px;">
            <div class="card-body">
                <h3 class="card-title">Data Toko</h3>
                <a href="{{ route('store.create') }}" class="btn btn-sm btn-info"
                    style="float:right;margin-bottom:10px;"><i class="fa fa-plus"
                    aria-hidden="true"></i> Tambah
                    Toko</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Karisidenan</th>
                            <th colspan="3" style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stores as $key => $store)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->address }}</td>
                            <td>{{ $store->city->name }}</td>
                            <td>
                                <a href="{{ route('store.show', $store->id)}}" class="btn btn-sm btn-success"><i class="fa fa-list"
                                    aria-hidden="true"></i></a><br>
                                <a href="{{ route('store.edit', $store->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></a>
                                <form action="{{ route('store.destroy', $store->id)}}" method="post">
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
