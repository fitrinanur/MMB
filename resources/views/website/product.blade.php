@extends('layouts.app')


@section('content')
@push('styles')
<style>
    .show{
        display:flexbox;
    }
    .about-store{
        margin-top: 0px !important;
    }
    .column:hover {
        background-color: #D0303F;
        opacity: 1;
        transition: 0.7s;
        color: white;
    }
    .card-title>a:hover{
        color: white;
    }
</style>
@endpush

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card"  style="margin-top: 30px;">
                <ul class="list-group" id="myBtnContainer">
                    <li class="list-group-item filter btn active" data-rel="all">Show All</li>
                    @foreach($product_types as $product_type)
                    <li class="list-group-item filter btn" data-rel="{{ $product_type->name}}">{{$product_type->name}}</li>
                    {{-- <li class="list-group-item filter btn" onclick="filterSelection('{{ $product_type->name}}')">{{$product_type->name}}</li> --}}
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-3 gallery"  style="margin-top: 30px;" id="gallery">

              
                @foreach ($products as $product)
                <div class="col mb-4 gallery show" id="gallery" >
                    <div class="card column all {{$product->productType->name}}" >
                        <div class="image" style="border-radius: 20px;padding:5px;">
                            @foreach($product->pictures->take(1) as $picture )
                            <img src="{{ $picture->path() }}" class="card-img-top" alt="...">
                            @endforeach
                        </div>
                        <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('website.product.show', $product->id )}}" class="btn-link">{{ucwords($product->name)}}</a></h5> 
                            <p class="card-text">
                                <div class="about-store">
                                    <div class="detail-store" style="font-family: 'Roboto', sans-serif;">
                                        <p style="font-size: 10px; "> {{ $product->productType->name}}</p>
                                    </div>
                                    <p style="text-align: justify">{{$product->desc}}</p>
                                    <h5>Rp. {{ number_format($product->price) }}</h5>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            

            </div>
        </div>
    </div>
    @endsection
    @push('javascript')
        
    <script type="application/javascript">
        $(document).ready(function ($) {
            $(function ($) {
                var selectedClass = "";
                $(".filter").click(function () {

                    selectedClass = $(this).attr("data-rel");
                    x = selectedClass.split(" ");
                    if(x == "all"){
                        jQuery(".column" + x).fadeIn(100, 0.1).addClass('show');
                    }
                    jQuery("#gallery").fadeTo(100, 0.1);
                    jQuery("#gallery .card").not("." + x).fadeOut().removeClass(
                        'show');
                    setTimeout(function () {
                        jQuery("." + x).fadeIn().addClass('show');
                        jQuery("#gallery").fadeTo(300, 1);
                    }, 300);
                });
            });
        });
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
          });
        }
    
    </script>
    @endpush