@extends('layouts.app')


@section('content')
@push('styles')
<style>
    .header-info>ul {
        list-style-type: none;
        display: inline-flex;
        padding: 3px;
    }

    .header-info>ul>li {
        padding: 2px 10px;
        margin-left: 10px;
        border-radius: 5px;
    }

    .header-info>ul>li>a {
        color: white;
        font-size: 25px;
    }
</style>
@endpush
    <div id=recommendation>
    </div>
@stop
    @push('javascript')
    <script type="application/javascript">
        jQuery(document).ready(function () {
            getLocation();
        });

    </script>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(getRecommendation, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function getRecommendation(position) {
            if (position === undefined) {
                alert('Your Position Undefined')
            } else {
                // let lat = position.coords.latitude;
                // let lon = position.coords.longitude;
                let lat = -7.746858;
                let lon = 110.390166;
                console.log(lat);
                console.log(lon);

                $.ajax({
                    url: '/recommendation',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'lat': lat,
                        'lon': lon,
                    },
                    success: function (response) {
                        $('#recommendation').html(response)
                    }
                })
            }

        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Untuk rekomendasi wisata terbaik, izinkan aplikasi untuk mengakses lokasi anda");
                    getRecommendation();
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Informasi lokasi tidak tersedia.");
                    getRecommendation();
                    break;
                case error.TIMEOUT:
                    alert("Permintaan akses lokasi user habis");
                    getRecommendation();
                    break;
                case error.UNKNOWN_ERROR:
                    alert("Error tidak diketahui");
                    break;
            }
        }

    </script>
    @endpush
