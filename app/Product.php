<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products' ;
    protected $primaryKey='id' ;
    protected $fillable=['product_name','product_code','product_price','product_info','stock',
        'product_image','product_splprice','category_name'];

    /*
    public function categories() {
        return $this->belongsToMany('Category','categories');
        //return $this->belongsToMany('App/Category') ;
    }

    public function category() {
        return $this->belongsTo(Category::class) ;
    }*/

}
