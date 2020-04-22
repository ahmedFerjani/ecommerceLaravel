@extends('front.master')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home.scss') }}" >
    <script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    <div class="op">

        <p><span class="line1">Welcome to our ecommerce shop</span> <span class="line2" data-splitting>Affariyet.com</span></p>

    </div>

    <script src="{{asset('js/home.js')}}" ></script>
        @endsection


