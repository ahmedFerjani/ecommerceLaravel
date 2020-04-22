<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Session;
use Illuminate\Support\Facades\DB ;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products=Product::all();
        return view('admin.product.index',compact('products')) ;
        //return view('admin.product.editproduct', compact('products')) ;
    }


    public function destroy($id)
    {
        Product::findOrFail($id)->delete() ;
        $products=Product::all();
        return view('admin.product.index',compact('products')) ;
    }

    public function editform($id)
    {
        $product = Product::findOrFail($id) ;
        return view('admin.product.editform',compact('product')) ;
    }

    public function edit(request $request,$id)
    {

        $product_id = $id ;
        $product_code = $request->product_code ;
        $product_name = $request->product_name ;
        $product_price = $request->product_code ;
        $product_stock = $request->product_stock ;

        DB::table('products')->where('id', $product_id)->update(
            [
                'product_code' => $product_code,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'stock' => $product_stock
            ]
        );
        //return back() ;
        $products=Product::all();
       return view('admin.product.index',compact('products')) ;
    }

    public function create()
    {
        $categories = Category::all()->pluck('name','id') ;
        //$categories = Category::pluck('name','id') ;
        return view('admin.product.create',compact('categories')) ;
    }

    public function store(request $request)
    {
        $formInput=$request->except('image') ;

        $this->validate($request,[
            'product_name' => 'required',
            'product_code' => 'required',
            'product_price' => 'required',
            'product_info' => 'required',
            'stock' => 'required',
            'product_image' => 'image|mimes:png,jpg,jpeg|max:10000',
            'product_splprice' => 'required',

        ]);
        $categories = Category::all() ;
        $image=$request->product_image;
        if($image)
        {
            $imageName=$image->getClientOriginalName() ;
            $image->move('images',$imageName);
            $formInput['product_image']=$imageName;
        }

        //dd($request->product_image->store('images','public'));
        /*Product::create($formInput) ;*/
        /*add query before function create of findorfail to IDE know it*/
        Product::query()->create($formInput) ;
        //session()->flash('success','Post created successufully!');
        //session::flash('success','Post created successufully!');
        return redirect('admin/product') ;
    }

    public function show($id)
    {
        $product = Product::query()->findOrFail($id) ;
        return view('product.show',compact('products')) ;
    }

}
