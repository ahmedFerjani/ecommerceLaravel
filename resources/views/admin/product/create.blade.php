@extends('admin.master')
@section('title', 'Create Product')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <nav class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="{{url('admin/product')}}">All Products</a>
        <a class="nav-item nav-link active" href="{{url('admin/createproduct')}}">Create Product</a>
        <a class="nav-item nav-link"  href="{{ url('admin/category') }}">Categories</a>
    </nav>
    <br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-center">Create a new Product</h3>
                    <br>
                    <div class="form-group row">
                        <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                        <input id="product_name" name="product_name" type="text"
                               class="form-control col-sm-10 @error('product_name') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('product_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_code" class="col-sm-2 col-form-label">Product Code</label>
                        <input id="product_code" name="product_code" type="text"
                               class="form-control col-sm-10 @error('product_code') is-invalid @enderror">
                        @error('product_code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
                        <input id="product_price" name="product_price" type="text"
                               class="form-control col-sm-10 @error('product_price') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('product_price')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_info" class="col-sm-2 col-form-label">Product Information</label>
                        <textarea class="form-control col-sm-10" rows="3" id="comment" id="product_info"
                                  name="product_info" @error('product_info') is-invalid @enderror"></textarea>
                        <div class="invalid-feedback">
                            @error('product_info')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_image" class="col-sm-2 col-form-label">Product Image</label>
                        <input id="product_image" name="product_image" type="file"
                               class="col-sm-10 @error('product_image') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('product_image')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="product_splprice" class="col-sm-2 col-form-label">Product Sale Price</label>
                        <input id="product_splprice" name="product_splprice" type="text"
                               class="form-control col-sm-10 @error('product_splprice') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('product_splprice')
                            The Sale Price field is required.
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category_name" class="col-sm-2 col-form-label">Categories</label>
                        <select class="form-control col-sm-10" id="category_name" name="category_name">
                        @foreach($categories as $category)
                            <option >{{$category}}</option>
                        @endforeach
                        </select>
                    </div>


                    <div class="form-group row">
                        <label for="stock" class="col-sm-2 col-form-label">Stock</label>
                        <input id="stock" name="stock" type="text"
                               class="form-control col-sm-10 @error('stock') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('stock')
                            The stock field is required.
                            @enderror
                        </div>
                    </div>


                    <br>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-lg btn-primary ">
                            <span class="fa fa-plus-circle"></span>
                            Create Product
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
