<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category ;
use App\Recommends;
use Illuminate\Support\Facades\DB ;
use App\WishList ;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function shop()
    {
        $products=Product::all() ;
        $categories=Category::all() ;
        return view('front.shop', compact(['categories','products'])) ;
    }


    public function product_details($id)
    {

        $recommends = new Recommends() ;
        $recommends->product_id = $id ;
        $recommends->save() ;
        $product=Product::findOrFail($id) ;
        $wishlist_products = DB::table('wishlist')->join('products',
            'wishlist.product_id')->where('wishlist.product_id','=',$id) ;

        $count = WishList::where(['product_id'=>$product->id])->count() ;

        return view('front.product_details', compact('product','wishlist_products','count')) ;
    }
}
