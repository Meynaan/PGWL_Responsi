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

        .border {
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
@endsection


@section('content')
    <div class="container-fluid mt-3">
        <div class="card shadow" style="width: 100%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('images/CARD.png') }}" class="img-fluid rounded-start" alt="...">
                </div>

                <div class="col-md-8">
                    <div class="card text-bg-dark">
                        <img src="{{ asset('images/6.png') }}" class="card-img" alt="...">
                        <!-- Sesuaikan path gambar -->
                        <div class="card-img-overlay">
                            <figure class="text-end">
                                <blockquote class="blockquote">
                                    <p style="color: #ffffff">Destinasi Wisata Kota Semarang.</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    Myn
                                </figcaption>
                            </figure>
                            <br>
                            <br>
                            <br>

                            <figure class="text-center mt-7">
                                <blockquote class="blockquote">
                                    <p style="color: #ffffff">Mau Kemana Kamu <br> Hari ini?</p>
                                    <div class="d-inline-block">
                                        <a href="https://github.com/Meynaan" class="btn btn-custom mx-2">GitHub</a>
                                        <a href="{{ route('register') }}" class="btn btn-custom mx-2">Register</a>
                                    </div>
                                </blockquote>
                            </figure>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <img src="{{ asset('images/line.png') }}" class="img-fluid rounded-start" alt="...">
    </div>

    {{-- <hr class="border border-danger border-2 opacity-50"> --}}

    <div class="container-fluid mt-3 shadow">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card shadow">
                    <img src="{{ asset('images/KL.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Kota Lama Semarang</h4>
                        <p class="card-text">Kota Lama Semarang merupakan sebuah area di Kota Semarang yang terkenal dengan
                            bangunan-bangunan bersejarahnya. Merupakan pusat perdagangan di kota Semarang pada Abad 19-20.
                        </p>
                        <a href="https://maps.app.goo.gl/Gh9vPwKGFSLDPDXk6" class="btn btn-custom">Go To The Road Guide</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <img src="{{ asset('images/LS.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Lawang Sewu</h4>
                        <p class="card-text"> Lawang Sewu Merupakan bekas kantor pusat Perusahaan Kereta Hindia Belanda,
                            gedung ini juga sempat dijadikan kantor Djawatan Kereta Api Repoeblik Indonesia dan Kantor Badan
                            Prasarana Komando Daerah Militer. </p>
                        <a href="https://maps.app.goo.gl/LdQHNmhy1ARv5U3x7" class="btn btn-custom">Go To The Road Guide</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <img src="{{ asset('images/SP.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Klenteng Sam Poo Kong</h4>
                        <p class="card-text">Klenteng Sam Poo Kong dikenal sebagai bekas tempat persinggahan
                            pertama Laksamana Cheng Ho asal Tiongkok yang beragama islam. Klenteng ini dibangun untuk
                            mengenang kedatangan Cheng Ho.</p>
                        <a href="https://maps.app.goo.gl/CoRsMqnNwvHP6xRz7" class="btn btn-custom">Go To The Road Guide</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow">
                    <img src="{{ asset('images/pm.jpeg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Pantai Marina</h4>
                        <p class="card-text">Pantai Marina terletak di dekat Bandara Ahmad Yani, pantai ini adalah tempat
                            yang pas untuk menikmati sunset bersama pasangan. Selain itu, kamu juga bisa menyewa kapal untuk
                            menikmati wisata air. </p>
                        <a href="https://maps.app.goo.gl/Vqx5JhbxyyEgqQyq9" class="btn btn-custom">Go To The Road Guide</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center p-3 mt-5">
        <div class="container">
            <p style="font-family: 'Merriweather', serif;">&copy; 2024 Hak Cipta: <a href="https://github.com/Meynaan" class="text-white">Myn</a></p>
            <p style="font-family: 'Merriweather', serif;">
                <i class="fa fa-home mr-2"></i> Jl. C Simanjutak No .76A, Sleman, Yogyakarta.<br>
                <i class="fa fa-envelope mr-2"></i> meynaanjar@gmail.com <br>
                <i class="fa fa-phone mr-2"></i> +62 812-2657-6820
            </p>
        </div>
    </footer>
@endsection

@section('script')
@endsection


</body>

</html>
