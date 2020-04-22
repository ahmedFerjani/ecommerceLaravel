<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" >

</head>
<body>

<script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}" ></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}" ></script>
<script src="{{asset('js/dashboard.js')}}"></script>
<script src="{{asset('js/feather.min.js')}}"></script>
<script src="{{asset('js/Chart.min.js')}}"></script>




<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Admin Dashboard</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Sign out</a>
        </li>
    </ul>
</nav>
<br>
<br>
<br>
<br>

@yield('content')

</body>
</html>
