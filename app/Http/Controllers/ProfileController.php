<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session ;
class ProfileController extends Controller
{

    public function index(){
        return view('profile.index') ;
    }

    public function orders() {
        $user_id = Auth::user()->id ;

        /*
        $orders = DB::table('orders_product')->leftJoin('products','products.id',
            '=','orders_product.products_id')->leftJoin('orders','orders.id',
            '=','orders_product.orders_id')->where('orders.user_id','=',$user_id) ;


        $orders = DB::table('orders_product')->get()->all() ;
        */
        $orders = DB::table('orders_product')->join('orders',
            'orders_product.orders_id',
            '=',
            'orders.id')->join('products',
            'orders_product.product_id',
            '=',
            'products.id')->where('orders.user_id','=',$user_id)->get()->all() ;
        return view('profile.orders',compact(('orders'))) ;
    }


    public function updatepassword(Request $request){
        $apassword = $request->apassword ;
        $npassword = $request->npassword ;

        $this->validate($request,[
            'npassword'=>'min:5|max:20',
            'npassword2'=>'same:npassword'
        ]);



        if(!Hash::check($apassword,Auth::user()->password)) {
            $request->session()->flash('msg', 'Wrong password!, please try again');
            $request->session()->flash('alert', 'alert-danger');
            return back() ;
            //return back()->with('msg','Wrong password') ;
        }
        else {
            $request->user()->fill(['password'=>Hash::make($npassword)])->save() ;
            $request->session()->flash('msg', 'Password has been updated successfully');
            $request->session()->flash('alert', 'alert-success');
            return back() ;
            //return back()->with('msg','Password has been updated') ;
        }
    }

    public function password(){
        return view('profile.updatepassword') ;
    }
}
