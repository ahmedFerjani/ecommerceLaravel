<?php

namespace App\Http\Controllers;

use App\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart_items = \Cart::getContent();

        //number of items
        //number_items = Cart::getContent()->count() ;
        return view('cart.index', compact('cart_items'));
    }


    public function addItem($id)
    {
        $product = Product::find($id);
        if ((int)$product->stock > 0) {
            //Cart::add(455, 'Sample Item', 100.99, 2, array());
            \Cart::add($id, $product->product_name, $product->product_price, 1,
                array('image' => $product->product_image, 'stock' => $product->stock));

            return redirect('shop')->with(
                'status', '1'
            );
        } else {
            return redirect('shop')->with(
                'status', '0'
            );
        }
    }


    public function destroy($id)
    {
        //echo $id ;
        \Cart::remove($id);
        return redirect('cart');

    }

    public function updateplus($id)
    {

        $qty_cart = \Cart::get($id)->quantity;
        $qty_pro = \Cart::get($id)->attributes->stock;
        if ($qty_pro > $qty_cart) {
            \Cart::update($id, array(
                'quantity' => 1
            ));
            return redirect('cart')->with('status', '1');
        } else {
            return redirect('cart')->with('status', '0');
        }


    }

    public function updateminus($id)
    {

        $qty_cart = \Cart::get($id)->quantity;
        if ($qty_cart > 0) {
            \Cart::update($id, array(
                'quantity' => -1
            ));

            return redirect('cart')->with('status', '1');
        } else {
            return redirect('cart')->with('status', '0');

        }
    }

}
