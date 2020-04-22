@extends('front.master')
@section('title', 'Shop')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/album.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    <section class="jumbotron text-center">
        <div class="container">
            <h1>Our shop</h1>
            <p class="lead text-muted">Here you can find all sort of products, fell free to navigate , you'll find what
                you want </p>
            <p class="lead text-muted">
                we are sure that you'll be happy @ the end of every purchase
            </p>

            <div>
                <a href="#" class="btn btn-primary my-2">add new product</a>
            </div>
        </div>
    </section>

    @if(session('status')=='1')
        <div class="alert alert-success text-center" role="alert">
            <h5 class="alert-heading">
                Product successfully added to your shopping cart
            </h5>
        </div>
        @endif

    @if(session('status')=='0')
        <div class="alert alert-danger text-center" role="alert">
            <h5 class="alert-heading">
                The product is not available for purchase
            </h5>
        </div>
    @endif


    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm text-center">
                            <img src="{{url('images',$product->product_image)}}" class="card-img-top" alt="..." style="width: 200px; margin: auto">
                            <h5 class="card-header">{{$product->product_name}}</h5>
                            <!--
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Cras justo odio</li>
                                <li class="list-group-item">Dapibus ac facilisis in</li>
                                <li class="list-group-item">Vestibulum at eros</li>
                            </ul>
                            -->
                            <div class="card-body text-center">
                                <p class="card-text ">Price : {{$product->product_price}}</p>

                                <span>
                                    Availability :
                                @if((int)$product->stock>0)
                                    <div class="spinner-grow text-success" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                @else
                                    <div class="spinner-grow text-danger" role="status">
                                        <span class="sr-only">Loading...</span>
                                   </div>
                                @endif
                                </span>
                                <br>
                                <br>
                                    <div class="btn-group">
                                        <a href="{{ url('/product_details')}}<?php echo '/' . $product->id;?>">
                                            <button type="button" class="btn btn-sm btn-primary"><span
                                                    class="fa fa-eye">&nbsp;</span>View details
                                            </button>
                                        </a>
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <a href="{{ url('/cart/additem')}}<?php echo '/' . $product->id;?>">
                                            <button type="button" class="btn btn-sm btn-success"><span
                                                    class="fa fa-shopping-cart">&nbsp;</span>Add to card
                                            </button>
                                        </a>
                                    </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="alert alert-danger text-center" role="alert" style="width: 100%">
                        There are no products to show!
                    </div>
                @endforelse

            </div>
        </div>
    </div>




@endsection
