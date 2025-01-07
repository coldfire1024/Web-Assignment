<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XiAO DiNG DoNG · Search</title>
    <link rel="stylesheet" href="{{ asset('css/auth/search.css') }}">
    <link rel="icon" href="{{ asset('images\icon.png') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="body-class">
    <x-Navbar/>
    <div class="search-body">
        <div class="search-main">
            <div class="search-title">
                <h2>搜索食物 | Search Foods</h2>
            </div>
            <div class="search-form">
                <form action="{{route('result')}}" method="post">
                    @csrf
                    <div class="search-form1">
                        <div class="search-bar">
                            <input type="text" placeholder="Enter Menu Name..." name="searching" id="searching">
                            <button type="submit">Search</button>
                        </div>
                    </div>
                    <div class="search-form2">
                        <label>Filter By Category</label>
                        <input type="checkbox" id="type_main_course" name="type_main_course" value="Main Course">
                        <label for="type_main_course">Main Course</label>
                        <input type="checkbox" id="type_beverages" name="type_beverages" value="Beverages">
                        <label for="type_beverages">Beverages</label>
                        <input type="checkbox" id="type_desserts" name="type_desserts" value="Desserts">
                        <label for="type_desserts">Desserts</label>
                    </div>
                </form>
            </div>
            @if($result!=null && count($result)!=0)
                <div class="search-result">
                    @foreach($result as $r)
                        <div class="card-back">
                        <a class="card-info" href="{{route('detail', ['food_id' => $r->food_id])}}">
                                <img src="{{asset('storage/images/'.$r->food_img)}}" alt="Food">
                                <div class="info-detail">
                                    <div>
                                        <h3>{{$r->food_name}}</h3>
                                    </div>
                                    <div>
                                        <h5>Category</h5>
                                        <p>{{$r->food_type}}</p>
                                    </div>
                                    <div>
                                        <h5>Description</h5>
                                        <p>{{$r->brief_desc}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div>
                    {{ $result->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="search-not-found">
                    <p>Food is Not Available</p>
                </div>
            @endif
        </div>
    </div>
    <x-Footer/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>