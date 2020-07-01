@extends('layouts.app')

@section('content')
{{-- @include('navbar') --}}
<div class="row" style="margin:10px 95px 0px 95px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ("home") }}" style="color:cornflowerblue">Home</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active" aria-current="page">Data Visi dan Misi</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card" style="margin-top:0px;">
            <div class="card-body">
                <h3 class="card-title">Data Visi dan Misi</h3>
                <a href="{{ route('motto.create') }}" class="btn btn-sm btn-info"
                    style="float:right;margin-bottom:10px;"><i class="fa fa-plus" aria-hidden="true"></i> Tambah
                    Visi dan Misi</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th colspan="3" style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mottos as $key => $motto)
                        <tr>
                            <td>{{ $motto+1 }}</td>
                            <td>{{ $motto->category }}</td>
                            <td>{{ $motto->desc }}</td>
                            <td>
                                <a href="{{ route('motto.edit', $motto->id)}}" class="btn btn-sm btn-primary"><i
                                        class="fa fa-pencil" aria-hidden="true"></i></a>
                                <form action="{{ route('motto.destroy', $motto->id)}}" method="post">
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
