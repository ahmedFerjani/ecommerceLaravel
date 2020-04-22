@extends('front.master')
@section('title', 'Shopping Cart')

@section('content')

   <!-- <?php echo $cart_items ?> -->


    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <section class="jumbotron text-center" style="background: linear-gradient(to right, #0062E6, #33AEFF);">
        <div class="container" >
            <h1 class="jumbotron-heading" style="color: white">E-COMMERCE CART</h1>
        </div>
    </section>
   @if(session('status')=='1')
       <div class="alert alert-success text-center" role="alert">
           Cart updated !
       </div>
       @endif
   @if(session('status')=='0')
       <div class="alert alert-danger text-center" role="alert">
           error: cart not updated !
       </div>
       @endif
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive table-bordered">
                    <table class="table table-striped center">
                        @if(count($cart_items) > 0)
                        <thead class="thead-dark">
                        <tr class="text-center">
                            <th scope="col">Picture</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        @endif

                        <tbody>
                        @forelse($cart_items as $cart_item)

                        <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff"/></td>
                            <td>{{ $cart_item->name }}</td>
                            <td name="qty">{{ $cart_item->quantity }}</td>
                            <td class="text-right">{{ $cart_item->price }}</td>
                            <td class="text-center">
                                    <a href="{{ url('/cart/updateplus')}}<?php echo '/'.$cart_item->id;?>"><button class="btn btn-sm btn-success" type="submit"><i class="fa fa-plus"></i></button></a>
                                <a href="{{ url('/cart/updateminus')}}<?php echo '/'.$cart_item->id;?>"><button class="btn btn-sm btn-warning"><i class="fa fa-minus"></i></button></a>
                                <a href="{{ url('/cart/removeitem')}}<?php echo '/'.$cart_item->id;?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                        @empty
                            <div class="alert alert-danger text-center" role="alert" style="width: 100%">
                                There are no products to show!
                            </div>
                        @endforelse

                        @if(count($cart_items) > 0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">{{ Cart::getSubTotal() }} DT</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">{{ Cart::getTotal() - Cart::getSubTotal() }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>{{ Cart::getTotal() }} DT</strong></td>
                        </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6 text-center" >
                        <a href="{{ url('/shop')}}" style="text-decoration: none">
                            <button class="btn btn-lg btn-primary btn-block text-uppercase">
                                Continue Shopping
                            </button>
                        </a>

                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="{{ url('/checkout')}}" style="text-decoration: none">
                            <button class="btn btn-lg btn-block btn-success text-uppercase">
                                Checkout
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
   <script src="{{asset('bootstrap/js/popper.min.js')}}" ></script>
   <script src="{{asset('bootstrap/js/bootstrap.js')}}" ></script>
@endsection
