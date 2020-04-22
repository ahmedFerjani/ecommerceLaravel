<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}" >
    <link rel="icon" href="{{asset('img/shopping.png')}}">
    <title>Affariyet @yield('title')</title></head>
<body>


@include('front.navbar')


@yield('content')

@include('front.footer')
<script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}" ></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}" ></script>
</body>
</html>
