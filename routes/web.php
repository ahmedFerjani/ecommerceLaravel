<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('front.home') ;
});

Route::get('/logout','Auth\LoginController@logout') ;


Route::get('/index', function () {
    return view('front.home');
});


Route::get('/contact', function () {
    return view('front.contact');
});


Route::get('/product_details/{id}', 'HomeController@product_details');

Route::get('/adminpage', function () {
    return view('admin.index');
});

Route::get('/products', 'HomeController@shop');

Route::get('/shop', 'HomeController@shop');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],
    function () {
    Route::get('/',function ()
    {
        return view('admin.index') ;
    })->name('admin.index') ;

    Route::post('admin/store','AdminController@store') ;

    Route::get('/admin','AdminController@index') ;

    Route::resource('product','ProductsController');

    //Route::post('product/store','ProductsController@store') ;

    Route::get('/createproduct', 'ProductsController@create');

    Route::get('/editform/{id}','ProductsController@editform') ;



    Route::post('/editproduct/{id}','ProductsController@edit') ;

    Route::get('/delete/{id}','ProductsController@destroy') ;

    Route::resource('category','CategoriesController') ;

    }
    );

Route::get('/cart', 'CartController@index');

//Route::get('/cart/addItem/{id}', 'HomeController@product_details');

Route::get('/cart/additem/{id}', 'CartController@addItem');

Route::get('/cart/removeitem/{id}', 'CartController@destroy');

Route::get('/cart/updateplus/{id}', 'CartController@updateplus') ;

Route::get('/cart/updateminus/{id}', 'CartController@updateminus') ;

//Route::get('/checkout', 'CheckoutController@index') ;

//Route::post('formvalidate','CheckoutController@formvalidate') ;

Route::group(['middleware'=>'auth'], function () {
        Route::get('/thankyou',function ()
        {
            return view('profile.thankyou') ;
        });

    Route::post('formvalidate','CheckoutController@formvalidate') ;

    Route::get('/checkout', 'CheckoutController@index') ;

    Route::get('/orders','ProfileController@orders') ;

    Route::get('/profile', function ()
    {
       return view('profile.index') ;
    });

    Route::get('/password','ProfileController@password') ;

    Route::post('password','ProfileController@updatepassword') ;

});


Route::post('addtowhishlist','WishlistController@add_wishlist') ;

Route::get('/WishList','WishlistController@see_wishlist')->name('wishlist') ;

Route::get('/removewishlist/{id}','WishlistController@remove_wishlist') ;

