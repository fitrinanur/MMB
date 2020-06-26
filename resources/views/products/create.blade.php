@extends('layouts.app')

@section('content')
{{-- breadcrumb --}}
<div class="row" style="margin:10px 95px 0px 95px;">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route ("home") }}" style="color:cornflowerblue">Home</a></li>
                <li class="breadcrumb-item">Data Master</li>
                <li class="breadcrumb-item"><a href="{{ route ("product.index") }}" style="color:cornflowerblue">Data
                        Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah Product</li>
            </ol>
        </nav>
    </div>
</div>
{{-- end breadcrumb --}}

<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card" style="margin-top:0px;">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Product</h4>
                <form action="{{ route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Product</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                            <label for="exampleFormControlInput1">Kategori Product</label>
                            <select class="form-control select2-single {{ $errors->has('product_type') ? ' is-invalid' : '' }}"
                                name="product_type" id="product_type" required>
                                @foreach ($product_types as $product_type)
                                <option value="{{ $product_type->id }}">{{$product_type->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('product_type'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('product_type') }}</strong>
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gambar</label>
                        <input type="file" name="picture[]" class="form-control-file" id="image" multiple>
                        <div id="image_preview"></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Tambahkan Product</button>
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
