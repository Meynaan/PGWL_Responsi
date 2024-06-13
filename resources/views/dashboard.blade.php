<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <head>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <style>
            #map {
                height: calc(100vh - 56px);
                width: 100%;
                margin: 0;
            }

            .border {
                margin-left: 20px;
                margin-right: 20px;
            }

            .card {
                margin-left: 20px;
                margin-right: 20px;
            }

            .body {
                background-color: #fc896d;
                /* background-color: #f83200; */
            }
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>


    <div class="container py-12">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="card-title">Data Wisata</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="alert alert-primary" role="alert">
                            <h4><i class="fa-solid fa-location-dot"></i> Titik Wisata</h4>
                            <p style="font-size: 20pt">{{ $total_points }}</p>
                        </div>
                    </div>
                    {{-- <div class="col">
                        <div class="alert alert-danger  " role="alert">
                            <h4><i class="fa-solid fa-draw-polygon"></i> Kecamatan</h4>
                            <p style="font-size: 20pt">{{ $total_polygons }}</p>
                        </div>
                    </div> --}}
                </div>
                <hr>
                <p>Anda login sebagai <b>{{ Auth::user()->name }}</b> dengan email <i>{{ Auth::user()->email }}</i></p>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-0">
        <img src="{{ asset('images/line.png') }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="card mb-3 mt-3">

        <div class="card-body">
            <div id="map"></div>
        </div>
    </div>
    </div>



    <script>
        //Map
        var map = L.map('map').setView([-6.972984344293968, 110.40999504554573], 11);

        // Basemap
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);


        // Function to generate a color based on a specific property (e.g., kecamatan name or id)
        function getColor(kecamatan) {
            var colors = {
                'Semarang Timur': '#FF0000', // Red
                'Gunung Pati': '#00FF00', // Green
                'Ngaliyan': '#0000FF', // Blue
                'Tembalang': '#FFFF00', // Yellow
                'Genuk': '#FF00FF', // Magenta
                'Pedurungan': '#FFE4B5', //
                'Semarang Barat': '	#DA70D6', //
                'Gayamsari': '#98FB98', //
                'Semarang Tengah': '#AFEEEE', //
                'Semarang Selatan': '#FFC0CB', //
                'Semarang Utara': '#C0C0C0', //
                'Tugu': '#FA8072', //
                'Candisari': '#EE82EE', //
                'Banyumanik': '#A0522D', //
                'Mijen': '#BC8F8F', //
                'Gajah Mungkur': '#DB7093', // Magenta
                // Tambahkan lebih banyak kecamatan dan warna sesuai kebutuhan
            };

            return colors[kecamatan] || '#FFFFFF'; // Default color if kecamatan not found
        }

        // Create a GeoJSON layer for polygon data
        var Semarang = L.geoJson(null, {
            style: function(feature) {
                var kecamatan = feature.properties.WADMKC; // Change this to your actual property name
                return {
                    fillColor: getColor(kecamatan),
                    weight: 2,
                    opacity: 1,
                    color: getColor(kecamatan), // Same color for outline
                    dashArray: "3",
                    fillOpacity: 0.5,
                };
            },
            onEachFeature: function(feature, layer) {
                var content = "KECAMATAN: " + feature.properties.WADMKC + "<br>";
                layer.bindPopup(content);
            },
        });

        // Load GeoJSON
        fetch('storage/geojson/Administrasi.geojson')
            .then(response => response.json())
            .then(data => {
                L.geoJSON(data, {
                    style: function(feature) {
                        var kecamatan = feature.properties.WADMKC;
                        return {
                            opacity: 1,
                            color: getColor(kecamatan),
                            weight: 2, // Adjust the weight as needed
                            fillOpacity: 0.5, // With fill color
                            fillColor: getColor(kecamatan), // Fill color based on kecamatan
                        };
                    },
                    onEachFeature: function(feature, layer) {
                        var content = "Kecamatan : " + feature.properties.WADMKC;
                        layer.on({
                            click: function(e) {
                                layer.bindPopup(content).openPopup();
                            },
                            mouseover: function(e) {
                                layer.bindPopup("Kecamatan : " + feature.properties.WADMKC, {
                                    sticky: false
                                }).openPopup();
                            },
                            mouseout: function(e) {
                                layer.resetStyle(e.target);
                                map.closePopup();
                            },
                        });
                    }
                }).addTo(map);
            })
            .catch(error => {
                console.error('Error loading the GeoJSON file:', error);
            });




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


</x-app-layout>
