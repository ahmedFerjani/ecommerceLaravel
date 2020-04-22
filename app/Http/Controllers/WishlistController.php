<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WishList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function add_wishlist(Request $request)
    {
        $wishlist = new WishList();
        $wishlist->user_id = Auth::user()->id ;
        $wishlist->product_id = $request->product_id ;
        $wishlist->save() ;

        //$product = DB::table('products')->where('id',$request->product_id)->get() ;

        //return view('front.product_details',compact('product')) ;
        return back() ;
    }

    public function see_wishlist()
    {
        $products = DB::table('wishlist')->join('products'
            ,'wishlist.product_id','products.id')->get() ;

        return view('front.wishlist', compact('products')) ;
    }



    public function remove_wishlist($id)
    {

        DB::table('wishlist')->where('wishlist.product_id',$id)->delete() ;
        return back()->with('msg','Product successfully removed from your wishlist”') ;
    }
}
