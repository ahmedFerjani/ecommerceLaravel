<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>

<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">

    <a class="navbar-brand" href="#">
        <img src="{{URL::asset('img/shopping.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
    </a>
    <a class="navbar-brand" href="#">Affariyet</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
            aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">


        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/index')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/shop')}}">Shop</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"
                   id="DropDownMenuCategories" role="button"
                   data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="DropDownMenuCategories">
                    <a class="dropdown-item">Action</a>

                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{url('/contact')}}">Contact us</a>
            </li>

        </ul>

        @if(Auth::check())
            <li class="list-inline-item">
                <a href="{{url('/cart')}}">
                    <button type="button" class="btn btn-secondary fa fa-shopping-cart">
                        Cart
                        <span class="badge badge-light">({{ Cart::getContent()->count() }})</span>
                        <span class="badge badge-light">({{ Cart::getTotal() }}DT)</span>
                    </button>
                </a>
                @endif

            </li>
            <form class="form-inline my-2 my-md-0">

                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <li class="list-inline-item nav-item dropdown" style="margin-right: 45px;margin-left: 10px">

                <button class="nav-link btn btn-dark" href="#" id="dropdown04" data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                <!--
                    @if(Auth::check())
                    <span class="spinner-grow text-success" role="status">
            </span>
@else
                    <span class="spinner-grow text-danger" role="status">
            </span>
@endif
                    -->
                    Profile
                    &nbsp;&nbsp;
                    <span class="fa fa-user"></span></button>
                <div class="dropdown-menu text-left" aria-labelledby="dropdown04">

                    @if(Auth::check())
                        <a class="dropdown-item" href="{{url('/orders')}}"><span
                                class="fa fa-folder">&nbsp;&nbsp;&nbsp;</span>Orders</a>
                        <a class="dropdown-item" href="{{url('/WishList')}}"><span
                                class="fa fa-heart">&nbsp;&nbsp;&nbsp;</span>WishList</a>
                        <a class="dropdown-item" href="{{url('/password')}}"><span
                                class="fa fa-key">&nbsp;&nbsp;&nbsp;</span>Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{url('/logout')}}"><span class="fa fa-sign-out">&nbsp;&nbsp;&nbsp;</span>Logout</a>
                    @else
                        <a class="dropdown-item" href="{{url('/register')}}"><span class="fa fa-user-plus">&nbsp;&nbsp;&nbsp;</span>Register</a>
                        <a class="dropdown-item" href="{{url('/login')}}"><span
                                class="fa fa-sign-in">&nbsp;&nbsp;&nbsp;</span>Login</a>
                    @endif
                </div>
            </li>

    </div>
</nav>
