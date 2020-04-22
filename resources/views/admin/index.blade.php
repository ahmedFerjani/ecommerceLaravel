@extends('admin.master')
@section('title', 'Admin Dashboard')

@section('content')
    <nav class="nav nav-pills nav-justified">
        <a class="nav-item nav-link" href="{{url('admin/product')}}">All Products</a>
        <a class="nav-item nav-link" href="{{url('admin/createproduct')}}">Create Product</a>
        <a class="nav-item nav-link" href="{{ url('admin/category') }}">Categories</a>
    </nav>

    @endsection
