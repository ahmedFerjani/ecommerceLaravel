<?php

namespace App\Http\Controllers;

use App\orders;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;


class CheckoutController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            //echo "checkout";
            return view('front.checkout') ;
        }

        else {
            //echo "not logged in ";
            return redirect('index') ;
        }
    }



    public function formvalidate(Request $request)
    {
       /* $this->validate($request,[
            'firstName' => 'required|min:3|max:15',
             'lastName' => 'required|min:3|max:15',
             'username' => 'required|min:3|max:10',
             'password' => 'required|min:6|max:20',
            'rpassword' => 'required|min:6|max:20|same:password',
            'email' => 'required|min:6|max:40',
            'address' => 'required|min:5|max:50',

            'country' => 'required',
            'zip' => 'required|min:3',
            'state' => 'required|min:3|max:50'
        ]);*/


        orders::createOrder() ;
        \Cart::clear() ;

        return redirect('/thankyou') ;
    }
}
