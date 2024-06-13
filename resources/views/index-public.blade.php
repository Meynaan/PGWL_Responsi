@extends('layouts.template')

@section('styles')
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            color: peachpuff;
        }


        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0;
        }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
@endsection


@section('content')
    <div class="container-fluid mt-3">
        <div class="card" style="width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('images/CARD.png') }}" class="img-fluid rounded-start" alt="...">
                </div>

                <div class="col-md-8">
                    <div class="card text-bg-dark">
                        <img src="{{ asset('images/5.png') }}" class="card-img" alt="...">
                        <!-- Sesuaikan path gambar -->
                        <div class="card-img-overlay">
                            <figure class="text-end">
                                <blockquote class="blockquote">
                                    <br>
                                    <br>
                                    <p style="color: #000000" >Destinasi Wisata Kota Semarang.</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    Myn
                                </figcaption>
                            </figure>
                            <br>

                            <figure class="text-center mt-7 ">
                                <blockquote class="blockquote">
                                    <p style="color: #000000">Mau Kemana Kamu <br> Hari ini?</p>
                                    <a href="https://github.com/Meynaan" class="btn btn-custom">GitHub</a>
                                </blockquote>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container-fluid mt-3 ">
        <div class="card " style="width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('images/CARD.png') }}" class="img-fluid rounded-start" alt="...">
                </div>

                <div class="card text-bg-dark">
                    <img src="..." class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small>Last updated 3 mins ago</small></p>
                    </div>
                </div> --}}

    {{-- <div class="col-md-8" style="background-color: #ffd3bf;">
                    <div class="card-body">
                        <figure class="text-end">
                            <blockquote class="blockquote">
                                <p>Destinasi Wisata Kota Semarang.</p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                Myn
                            </figcaption>
                        </figure>
                        <br>
                        <br>
                        <br>
                        <figure class="text-center mt-7 " >
                            <blockquote class="blockquote">
                                <p>Mau Kemana Kamu <br> Hari ini?</p>
                                <a href="https://github.com/Meynaan" class="btn btn-primary">GitHub</a>
                            </blockquote>
                        </figure>
                    </div>
                </div> --}}

    {{-- </div>
    </div> --}}


    <hr class="border border-danger border-2 opacity-50">
    <div class="card mb-3 mt-3">

        <div class="card-body">
            <div id="map"></div>
        </div>
    </div>
    </div>


    {{-- <div id="map"></div> --}}
@endsection

@section('script')
    <script>
        //Map
        var map = L.map('map').setView([-7.793113992317631, 110.3657791662438], 15);

        // Basemap
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Name: " + feature.properties.name + "<br>" +
                    "Description : " + feature.properties.description + "<br>" +
                    "Photo: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='...'>";

                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        point.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });

        /* GeoJSON Line */
        var polyline = L.geoJson(null, {
            /* Style polyline */
            style: function(feature) {
                return {
                    color: "#ff85d5",
                    weight: 3,
                    opacity: 1,
                };
            },
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +

                    "Photo: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='...'>";
                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.name, {
                            sticky: true,
                        });
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });

        /* GeoJSON Polygon */
        var polygon = L.geoJson(null, {
            /* Style polygon */
            style: function(feature) {
                return {
                    color: "#ff8484",
                    fillColor: "#ffcecd",
                    weight: 2,
                    opacity: 1,
                    fillOpacity: 0.2,
                };
            },
            onEachFeature: function(feature, layer) {
                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Photo: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='...'>";

                layer.on({
                    click: function(e) {
                        polygon.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygon.bindTooltip(feature.properties.name, {
                            sticky: true,
                        });
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });

        // Layer control
        var overlayMaps = {
            "Point": point,
            "Polyline": polyline,
            "Polygon": polygon

        };

        var layerControl = L.control.layers(null, overlayMaps).addTo(map);
    </script>
@endsection


</body>

</html>
