@extends('layouts.app')

@section('content')
{{-- breadcrumb --}}
<div class="row" style="margin:10px 95px 0px 95px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ("home") }}" style="color:cornflowerblue">Home</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item"><a href="{{ route ("store.index") }}" style="color:cornflowerblue">Data
                        Toko</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Toko</li>
            </ol>
        </nav>
    </div>
</div>
{{-- end breadcrumb --}}

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card" style="margin-top:0px;">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Toko</h4>
                <form action="{{ route('store.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Toko</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="exampleFormControlInput1">Karisidenan</label>
                            <select class="form-control select2-single {{ $errors->has('city') ? ' is-invalid' : '' }}"
                                name="city" id="city" required>
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{$city->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col">
                            <div class="form-group">
                                    <label for="exampleFormControlInput1">Telepon</label>
                                    <input type="text" name="phone_number" class="form-control" id="exampleFormControlInput1">
                                </div>
                            @if ($errors->has('phone_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="exampleFormControlInput1">Latitude</label>
                            <input type="text" name="latitude" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="col">
                            <label for="exampleFormControlInput1">Longitude</label>
                            <input type="text" name="longitude" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gambar</label>
                        <input type="file" name="picture[]" class="form-control-file" id="image" multiple>
                        <div id="image_preview"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Tambahkan Toko</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@push('javascript')
<script type="application/javascript">
    $(document).ready(function ($) {
        $("#image").change(function () {
            $('#image_preview').html("");
            var total_file = document.getElementById("image").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#image_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) +
                    "' class='img_preview img-thumbnail' style='min-height:150px;max-width:200px;'>"
                );
                $(".remove").click(function () {
                    $(this).parent(".pip").remove();
                });

            }

        });
    });

</script>
    
@endpush
