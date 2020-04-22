<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table = 'wishlist' ;
    protected $primaryKey = 'id' ;
    protected $fillable = ['user_id','product_id'] ;
}
