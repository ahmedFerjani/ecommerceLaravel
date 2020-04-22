@extends('front.master')
@section('title', 'Product Details')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class="container">
        <br>
        <br>

        <div class="card text-center">
            <div class="card-header">
                <h2>
                    <?php echo $product->product_name ?>
                </h2>
            </div>
            <div class="text-center">
                <img src="{{url('images',$product->product_image)}}" class="text-center rounded" alt="product image"
                     width="250px">

            </div>
            <div class="card-body">
                <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapseExample"
                        aria-expanded="false" aria-controls="collapseExample">
                    More information
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <?php echo $product->product_info ?>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p>Product Code : <?php echo $product->product_code?> </p></li>
                    <li class="list-group-item">Product Price : <?php echo $product->product_price?> </li>
                    <li class="list-group-item">Added at : <?php echo $product->created_at?> </li>
                    <li class="list-group-item">Product Sale Price : <?php echo $product->product_splprice?> </li>
                    <li class="list-group-item">Number of available items : <?php echo $product->stock?> </li>
                </ul>
                <div>
                    @if($count=="0")
                        <form method="POST" action="{{url('addtowhishlist')}}">
                            @csrf
                            <input type="hidden" value="{{$product->id}}" name="product_id"/>
                            <button type="submit" value="Add to Whishlist" class="btn btn-outline-info"><span class="fa fa-heart">&nbsp;</span>Add to Wishlist</button>
                        </form>
                        @else
                        <div class="alert alert-info" role="alert">
                            Poduct already in wishlist, <a href="{{ url('/WishList') }}" class="alert-link">see Wishlist</a>
                        </div>
                        @endif
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="btn-group">
                    <a href="{{ url('/products')}}">
                        <button type="button" class="btn btn-lg btn-outline-primary"><span
                                class="fa fa-eye">&nbsp;</span>All Products
                        </button>
                    </a>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <a href="{{ url('/cart/additem')}}<?php echo '/' . $product->id;?>">
                        <button type="button" class="btn btn-lg btn-outline-success "><span class="fa fa-shopping-cart">&nbsp;</span>Add
                            to card
                        </button>
                    </a>
                </div>
            </div>
        </div>


    </div>
@endsection
