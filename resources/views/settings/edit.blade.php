@extends('layouts.app')

@section('content')
{{-- breadcrumb --}}
<div class="row" style="margin:10px 95px 0px 95px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ("home") }}" style="color:cornflowerblue">Home</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item active" aria-current="page">Setting Halaman</li>
            </ol>
        </nav>
    </div>
</div>
{{-- end breadcrumb --}}

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card" style="margin-top:0px;">
            <div class="card-body">
                <h4 class="card-title">Edit Data Toko</h4>
                <form action="{{ route('setting.update', $setting->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Mahasiswa</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $setting->name }}" required>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">NIM</label>
                        <input type="text" name="nim" class="form-control" id="exampleFormControlInput1" value="{{ $setting->nim }}" required>

                        @if ($errors->has('nim'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nim') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Prodi</label>
                        <input type="text" name="prodi" class="form-control" id="exampleFormControlInput1" value="{{ $setting->prodi }}" required>

                        @if ($errors->has('prodi'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('prodi') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $setting->title }}" required>

                        @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleFormControlInput1">Gambar</label>
                        <input type="file" name="picture[]" class="form-control-file" id="image" multiple>
                        <div id="image_preview"></div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary mb-2">Update Toko</button>
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
