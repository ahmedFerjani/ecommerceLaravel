<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        $categories = Category::all() ;
        $products = Product::all() ;
        return view('admin.category.index',compact('categories','products')) ;
    }

    public function create() {

    }

    public function store(Request $request) {
        Category::create($request->all());
        return back() ;
    }

    public function show($id){
        $product=Category::find($id)->products ;

        $categories=Category::all() ;
        return view('admin.category.index',compact('categories','products')) ;
    }

    public function edit($id) {

    }

    public function update(Request $request,$id) {

    }

    public function destroy($id) {

    }
}
