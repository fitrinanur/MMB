
@include('navbar')
<div class="container row-fluid">
    <div class="card" style="margin-top:10px;">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    

                    <div class="row">
                        <div class="col-md-8">
                            <p style="color:dodgerblue">Lokasi anda saat ini :</p>
                            <p> <strong>Latitude : </strong> {{$latitude}}<br />
                                <strong>Longitude :</strong> {{$longitude}}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <iframe width="100%" height="300" marginwidth="0"
                                src="https://maps.google.com/maps?q={{ $latitude }},{{ $longitude }}&hl=es;z=16&amp;output=embed">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
    </div>
    <div class="card" style="margin-top:10px;">
        <div class="card-body">
            <h3 class="card-title">Rekomendasi Wisata Disekitar Anda</h3>
            @foreach ($stores as $store)
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="card-title">{{ $store->name }}</h3>
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>{{ $store->name }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>{{ $store->address }} - {{ $store->city->name}}</td>
                                </tr>
                                <tr>
                                    <td>Latitude</td>
                                    <td>{{ $store->latitude }}</td>
                                </tr>
                                <tr>
                                    <td>Longitude</td>
                                    <td>{{ $store->longitude }}</td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td>{{ $store->desc }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr/>
                        @foreach($store->pictures->take(2) as $picture )
                        <img class="d-block img-fluid img-thumbnail rounded" src="{{ $picture->path() }}"/><br>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <iframe width="100%" height="300" marginwidth="0"
                            src="https://maps.google.com/maps?q={{ $store->latitude }},{{ $store->longitude }}&hl=es;z=16&amp;output=embed">
                        </iframe><br>
                        <div class="header-info">
                            <ul class="header-social">
                                <li style="background-color:tomato"><a href="#"
                                        title="Instagram" target="_blank" ><i class="fa fa-instagram"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li style="background-color:firebrick"><a href="#" title="Youtube"
                                        target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div><!-- .header-info -->
                    </div>
                </div>

            </div>
                <p class="card-text">
                    {{-- <small class="text-muted">{{ $store->created_at->diffForHumans()}}</small> --}}
                </p>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
