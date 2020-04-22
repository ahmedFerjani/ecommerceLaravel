@extends('admin.master')
@section('title', 'Products')

@section('content')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <nav class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="{{url('admin/product')}}">All Products</a>
        <a class="nav-item nav-link active" href="#" >Edit Product</a>
        <a class="nav-item nav-link" href="#">Categories</a>
    </nav>
    <br><br><br>
    <section class="jumbotron text-center" style="background: linear-gradient(to right, #0062E6, #33AEFF);">
        <div class="container" >
            <h1 class="jumbotron-heading" style="color: white">Edit Product</h1>
        </div>
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <form method="POST" action="{{url('/admin/editproduct/')}}<?php echo '/'.$product->id?>">
                    @csrf
                    <h3 class="text-center">Edit Product</h3>
                    <br>


                    <div class="form-group row">
                        <label for="product_code" class="col-sm-2 col-form-label">Product Code</label>
                        <input id="product_code" name="product_code" type="text" value="{{ $product->product_code }}"
                               class="form-control col-sm-10 @error('product_code') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('product_code')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                        <input id="product_name" name="product_name" type="text" value="{{ $product->product_name }}"
                               class="form-control col-sm-10 @error('product_name') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('product_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
                        <input id="product_price" name="product_price" type="text" value="{{ $product->product_price }}"
                               class="form-control col-sm-10 @error('product_price') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('product_price')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_stock" class="col-sm-2 col-form-label">Stock</label>
                        <input id="product_stock" name="product_stock" type="text" value="{{ $product->stock }}"
                               class="form-control col-sm-10 @error('product_stock') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('product_stock')
                            The stock field is required.
                            @enderror
                        </div>
                    </div>

                    <br>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg btn-primary ">
                            <span class="fa fa-edit"></span>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}" ></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}" ></script>
@endsection
