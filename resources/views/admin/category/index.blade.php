@extends('admin.master')
@section('title', 'Categories')

@section('content')
    <nav class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="{{url('admin/product')}}">All Products</a>
        <a class="nav-item nav-link" href="{{url('admin/createproduct')}}">Create Product</a>
        <a class="nav-item nav-link active" href="{{ url('admin/category') }}">Categories</a>
    </nav>
    <br><br><br>
    <div class="list-group">
        <h3>Available categories</h3>
        @if(!empty($categories))
            @forelse($categories as $category)
                <a href="#" class="list-group-item list-group-item-action">
                    {{$category->name}}
                </a>
            @empty
                <div class="alert alert-warning" role="alert">
                    There are no categories to show!
                </div>
            @endforelse
        @endif
    </div>
<hr>

    <form method="POST" action="{{route('category.store')}}" class="text-center">
        <h3>Create new category</h3>
        <hr>
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Category Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <button id="cancel" name="cancel" class="btn btn-danger"
                type="reset"
        ><span class="fa fa-trash">&nbsp;</span>Reset
        </button>
        <button id="save" name="save" class="btn btn-success" type="submit">
            <span class="fa fa-save">&nbsp;</span>
            Save Changes
        </button>
    </form>

    <!-- products -->
<hr>

    <div class="list-group">
        @if(!empty($products))
            @forelse($products as $product)
                <a href="#" class="list-group-item list-group-item-action">
                    {{$product->product_name}}
                </a>
            @empty
                <div class="alert alert-warning" role="alert">
                    There are no products to show!
                </div>
            @endforelse
        @endif
    </div>
    <script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}" ></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}" ></script>
@endsection
