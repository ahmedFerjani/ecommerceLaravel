<?php

namespace App;
use Illuminate\Support\Facades\Auth ;
use Darryldecode\Cart\Cart ;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $fillable = ['total','status'] ;

    public function orderFields()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty','total') ;
    }

    public static function createOrder() {
       $user = Auth::user() ;
       $order = $user->orders()->create(['total'=>\Cart::getTotal(), 'status'=>'pending']) ;
       $cartItems = \Cart::getContent();
        foreach ($cartItems as $cartItem)
        {
            $order->orderFields()->attach($cartItem->id,
                ['qty'=>$cartItem->quantity,'tax'=>'0',
                    'total'=>$cartItem->quantity*$cartItem->price]) ;
        }
    }

}
