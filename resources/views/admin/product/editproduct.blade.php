@extends('admin.master')
@section('title', 'Products')

@section('content')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <section class="jumbotron text-center" style="background: linear-gradient(to right, #0062E6, #33AEFF);">
        <div class="container" >
            <h1 class="jumbotron-heading" style="color: white">view all products</h1>
        </div>
    </section>


    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive table-bordered">
                    <table class="table table-striped center">
                            <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">Picture</th>
                                <th scope="col">Product Id</th>
                                <th scope="col">Product Code</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>

                        <tbody>
                        @forelse($products as $product)

                            <tr>
                                <td><img src="{{ url('images',$product->product_image) }}" width="50px"/></td>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td class="text-right">{{ $product->product_price }}</td>
                                <td class="text-center">
                                    <a href="{{route('ProductEditForm',$product->id)}}" class="btn btn-primary btn-sm">
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger text-center" role="alert" style="width: 100%">
                                There are no products to show!
                            </div>
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}" ></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}" ></script>
@endsection
