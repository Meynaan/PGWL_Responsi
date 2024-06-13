@extends('layouts.template')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }


        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0;
        }
    </style>
@endsection


@section('content')
    <div id="map"></div>

    <!-- Modal Creat Point -->
    <div class="modal fade" id="PointModal" tabindex="-1" aria-labelledby="PointModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Creat Point</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-point') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill Point Name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Desctription</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom" class="form-label">Geomerty</label>
                            <textarea class="form-control" id="geom_point" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_point" name="image"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="" id="preview-image-point" class="img-thumbnail"
                                width="400">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Creat Polyline -->
    <div class="modal fade" id="PolylineModal" tabindex="-1" aria-labelledby="PolylineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Creat Polyline</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-polyline') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill Polyline Name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Desctription</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom" class="form-label">Geomerty</label>
                            <textarea class="form-control" id="geom_polyline" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_polyline" name="image"
                                onchange="document.getElementById('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="" id="preview-image-polyline" class="img-thumbnail"
                                width="400">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Creat Polygon -->
    <div class="modal fade" id="PolygonModal" tabindex="-1" aria-labelledby="PolygonModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Creat Polygon</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('store-polygon') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill Polygons Name">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Desctription</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="geom" class="form-label">Geomerty</label>
                            <textarea class="form-control" id="geom_polygon" name="geom" rows="3" readonly></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_polygon" name="image"
                                onchange="document.getElementById('preview-image-polygon').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="mb-3">
                            <img src="" alt="" id="preview-image-polygon" class="img-thumbnail"
                                width="400">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
    <script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
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
        //var marker = L.marker([-7.597861, 110.423395]).addTo(map);

        //popup
        // marker.bindPopup("<b>Museum</b><br>Ulen Sentalu").openPopup();

        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: true,
                polygon: true,
                rectangle: true,
                circle: false,
                marker: true,
                circlemarker: false
            },
            edit: false
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            console.log(type);

            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.WKT.convert(drawnJSONObject.geometry);

            console.log(drawnJSONObject);
            console.log(objectGeometry);

            if (type === 'polyline') {
                // set value geometry to input geom
                $("#geom_polyline").val(objectGeometry);

                // show modal
                $("#PolylineModal").modal('show');

            } else if (type === 'polygon' || type === 'rectangle') {
                // set value geometry to input geom
                $("#geom_polygon").val(objectGeometry);

                // show modal
                $("#PolygonModal").modal('show');

                // console.log("Create " + type);
            } else if (type === 'marker') {
                // set value geometry to input geom
                $("#geom_point").val(objectGeometry);
                // show modal
                $("#PointModal").modal('show');
                // console.log("Create " + type);
            } else {
                console.log('__undefined__');
            }

            drawnItems.addLayer(layer);
        });

        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Name: " + feature.properties.name + "<br>" +
                    "Description : " + feature.properties.description + "<br>" +
                    "Photo: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='img-thumbnail' alt='...'>" + "<br>" +

                    "<div class='d-flex flex-row mt-3'>" +

                    "<a href='{{ url('edit-point') }}/" + feature.properties.id +
                    "' class='btn btn-warning me-2'><i class='fa-solid fa-edit'></i></a>" +

                    "<form action='{{ url('delete-point') }}/" + feature.properties.id + "' method='POST'>" +
                    '{{ csrf_field() }}' +
                    '{{ method_field('DELETE') }}' +
                    "<button type='submit' class='btn btn-danger' onclick='return confirm(\"Yakin nih mau di hapus?\")'><i class='fa-solid fa-trash-can'></i></button>" +
                    "</form>" +

                    "</div>";
                //     "<form action='{{ url('delete-point') }}' method='POST'>" +
                //             "{{ csrf_field() }}" +
                //             "{{ method_field('DELETE') }}" +
                //             "<button type='submit' class='btn btn-danger' onclick='return confirm(\"Yakin Anda akan menghapus data ini?\")'><i class='fa-solid fa-trash-can'></i></button>" +

                //     "<div class='d-flex flex-row mt-3'>" +

                //         "<a href='{{ url('edit-point') }}/" + feature.properties.id +
                //             "' class='btn btn-warning me-2'><i class='fa-solid fa-edit'></i></a>" +


                //             "</div>" +
                //             "</form>" +
                //     "</div>"
                //    ;
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
                    "'class='img-thumbnail' alt='...'>" + "<br>" +

                    "<div class='d-flex flex-row mt-3'>" +

                    "<a href='{{ url('edit-polyline') }}/" + feature.properties.id +
                    "' class='btn btn-warning me-2'><i class='fa-solid fa-edit'></i></a>" +

                    "<form action='{{ url('delete-polyline') }}/" + feature.properties.id +
                    "' method='POST'>" +
                    '{{ csrf_field() }}' +
                    '{{ method_field('DELETE') }}' +
                    "<button type='submit' class='btn btn-sm btn-danger' onClick='return confirm(\"Yakin nih mau di hapus?\")'><i class='fa-solid fa-trash-can'></i></button>" +
                    "</form>" +

                    "</div>";
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
                    "'class='img-thumbnail' alt='...'>" + "<br>" +

                    "<div class='d-flex flex-row mt-3'>" +

                    "<a href='{{ url('edit-polygon') }}/" + feature.properties.id +
                    "' class='btn btn-warning me-2'><i class='fa-solid fa-edit'></i></a>" +

                    "<form action='{{ url('delete-polygon') }}/" + feature.properties.id +
                    "' method='POST'>" +
                    '{{ csrf_field() }}' +
                    '{{ method_field('DELETE') }}' +
                    "<button type='submit' class='btn btn-sm btn-danger' onClick='return confirm(\"Yakin nih mau di hapus?\")'><i class='fa-solid fa-trash-can'></i></button>" +
                    "</form>" +

                    "</div>";

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
