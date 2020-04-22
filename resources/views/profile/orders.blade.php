@extends('front.master')
@section('title', 'Orders')
@section('content')


    <section class="jumbotron text-center" style="background: linear-gradient(to right, #0062E6, #33AEFF);">
        <div class="container" >
            <h1 class="jumbotron-heading" style="color: white">My Orders</h1>
        </div>
    </section>

    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive table-bordered">
                    <table class="table table-striped center">
                        @if(!empty($orders))
                            <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">Date</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Code</th>
                                <th scope="col">Order Total</th>
                                <th scope="col">order Status</th>
                                <th scope="col">Details</th>
                            </tr>
                            </thead>

                        <tbody>
                        @endif

                        @forelse($orders as $order)


                            <tr>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>{{ $order->product_code }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->status }}</td>
                                <td>view</td>
                            </tr>
                        @empty
                            <div class="alert alert-danger text-center" role="alert" style="width: 100%">
                                There is no order to show!
                            </div>
                        @endforelse


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
                    @if(!empty($orders))
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="{{ url('/checkout')}}" style="text-decoration: none">
                            <button class="btn btn-lg btn-block btn-success text-uppercase">
                                Checkout
                            </button>
                        </a>
                    </div>
                        @endif
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}" ></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}" ></script>
@endsection
