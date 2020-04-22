@extends('front.master')

@section('title', 'WishList')


@section('content')

    <section class="jumbotron text-center" style="background: linear-gradient(to right, #0062E6, #33AEFF);">
        <div class="container" >
            <h1 class="jumbotron-heading" style="color: white">My WishList</h1>
        </div>
    </section>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm text-center">
                            <img src="{{url('images',$product->product_image)}}" class="card-img-top" alt="..." style="width: 200px; margin: auto">
                            <h5 class="card-header">{{$product->product_name}}</h5>

                            <div class="card-body text-center">

                                <div class="btn-group">

                                    <a href="{{ url('/product_details')}}<?php echo '/' . $product->id;?>">
                                        <button type="button" class="btn btn-primary"
                                                data-toggle="tooltip" data-placement="bottom" title="view product details">&nbsp;<span
                                                class="fa fa-eye">&nbsp;</span>
                                        </button>
                                    </a>
                                    <span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                    <a href="{{ url('/cart/additem')}}<?php echo '/' . $product->id;?>">
                                        <button type="button" class="btn btn-success"
                                                data-toggle="tooltip" data-placement="bottom" title="add to shopping cart">&nbsp;<span
                                                class="fa fa-shopping-cart">&nbsp;</span>
                                        </button>
                                    </a>
                                    <span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                    <a href="{{ url('/removewishlist')}}<?php echo '/' . $product->id;?>">
                                        <button type="button" class="btn btn-danger"
                                                data-toggle="tooltip" data-placement="bottom" title="remove from wishlist">&nbsp;<span
                                                class="fa fa-remove">&nbsp;</span>
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

                    @if(session('msg'))
                        <div class="alert alert-primary ext-center" role="alert" style="width: 100%">
                            {{session('msg')}}
                        </div>
                    @endif


            </div>
        </div>
    </div>
    <script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}" ></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}" ></script>
@endsection
