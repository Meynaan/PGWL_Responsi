<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- leaflet css --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Courier+Prime&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Mystery+Quest&display=swap"
        rel="stylesheet">



    <style>
        .body {
            /* height: 100%;
        width: 100%; */
            color: peachpuff;
        }

        body {
            font-family: 'Merriweather', serif;
            color: #ffb3ac;
        }

        .h2 {
            font-family: 'Press Start 2P', fantasy;
        }
    </style>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="1x1" href="{{ asset('images/2.png') }}">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles')

    <!-- Favicons -->
    <link href="public/images/3.png" rel="icon">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-fixed" style="background-color: #fc896d;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="display: flex; align-items: center;">
                <img src="{{ asset('images/3.png') }}" alt="Example Image" width="50" height="50"
                    style="margin-right: 10px;">
                <h2 style="margin-top: 0;" id="h2"> SIWARANG</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}"> <i
                                class="fa-solid fa-igloo"></i> Home</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('table-point') }}"><i class="fa-solid fa-table"></i> Tabel Point</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#infoModal"> <i
                                class="fa-solid fa-circle-info"></i> Info</a>
                    </li>



                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}"> <i class="fa-solid fa-gauge"></i></i>
                                Dashboard</a>
                        </li>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li class="nav-item">
                                <button class="nav-link text-danger" type="submit"> <i
                                        class="fa-solid fa-right-from-bracket"></i></i>
                                    Logout</a>
                            </li>
                        </form>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="{{ route('login') }}"> <i
                                    class="fa-solid fa-right-to-bracket"></i>
                                Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Info Apa Tuch?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Meyna Anjar Nilawati <br>
                    22/494861/SV/20925
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    @yield('content')

    {{-- leaflet js --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @include('components.toast')

    @yield('script')
</body>

</html>
