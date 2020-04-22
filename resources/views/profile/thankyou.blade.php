@extends('front.master')
@section('title', 'Thanks')

@section('content')

    <div class="jumbotron text-center" style=" margin-bottom: 0px;">

        <h1 class="display-3">Thank You!</h1>
        <br><br>
        <div class="alert alert-success" role="alert">
            <strong>
            Your purchase order have been created successfully
            </strong>
        </div>

        <br>
        <h5>
            we are glad to have you as our customer
        </h5>
        <br><br><br><br>
        <a  href="{{  url('/shop') }}" style="text-decoration: none;">
            <button type="button" class="btn btn-lg btn-block btn-outline-primary"
            >Back to shop</button>
        </a>
    </div>

    @endsection
