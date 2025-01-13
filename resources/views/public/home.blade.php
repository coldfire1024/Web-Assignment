<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MAGA · Home</title>
    <link rel="stylesheet" href="{{ asset('css\public\home.css') }}">
    <link rel="icon" href="{{ asset('images\icon.png') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body class="body-class">
    @if ($errors->first())
        <div class="edit-profile-page-error-alerts">
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="alert-message">{{ $error }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        </div>
    @elseif (session('success'))
        <div class="edit-profile-page-success-alerts">
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-message">{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <x-Navbar/>
    <div id="advertiseCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators/Dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#advertiseCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#advertiseCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#advertiseCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <!-- Slides -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/advertise1.jpg') }}" class="d-block w-100" alt="Ad 1">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/advertise2.png') }}" class="d-block w-100" alt="Ad 2">
            <div class="carousel-caption d-none d-md-block">   
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/advertise3.jpg') }}" class="d-block w-100" alt="Ad 3">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
    </div>

    <!-- Controls/Navigation -->
    <button class="carousel-control-prev" type="button" data-bs-target="#advertiseCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#advertiseCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
    <div class="home-body">
        <div class="main">
            <div class="main-title1">
                <h1>Menu</h1>
            </div>
            <div class="main-buttons">
                <button class="button">
                    <a href="{{route('mainCourse')}}">Main Course</a>
                </button>
                <button class="button">
                    <a href="{{route('beverages')}}">Beverages</a>
                </button>
                <button class="button">
                    <a href="{{route('desserts')}}">Desserts</a>
                </button>
            </div>
            <div class="main-title2">
                <h3>Food & Beverages</h3>
            </div>
            @if(count($menu)!=0)
                <div class="main-desc">
                    @foreach($menu as $m)
                        <div class="card-back">
                            <a class="card-info" href="{{'menu/'.$m->food_id}}">
                                <img src="{{asset('storage/images/'.$m->food_img)}}" alt="Food">
                                <p>{{$m->food_name}}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div>
                    {{ $menu->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="search-not-found">
                    <p>Food is not available</p>
                </div>
            @endif
        </div>
    </div>
    <x-Footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>
