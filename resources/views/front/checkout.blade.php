@extends('front.master')
@section('title', 'Chekout')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/form-validation.css') }}" >
    <script src="{{asset('js/form-validation.js')}}" ></script>

    <div class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="" alt="" width="72" height="72">
            <h2>Checkout form</h2>
            <p class="lead">controls. Each required  group has a validation state that can be triggered by attempting to submit the  without completing it.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{  \Cart::getContent()->count() }}</span>
                </h4>
                <ul class="list-group mb-3">

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Subtotal (D.T)</span>
                        <strong>{{  \Cart::getSubTotal() }}</strong>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tax</span>
                        <strong>{{ \Cart::getTotal() -  \Cart::getSubTotal() }}</strong>
                    </li>


                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (D.T)</span>
                        <strong>{{\Cart::getTotal()}}</strong>
                    </li>


                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Customer Info</h4>
               <form action="{{ url('/')  }}/formvalidate" method="post">
               <!--    <form action="{{ url('checkout.formvalidate')  }}" method="post"> -->

                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control @error('firstName') is-invalid @enderror" id="firstName" name="firstName"
                                   placeholder="Enter first name" value="{{old('firstName')}}">
                            @error('firstName')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control @error('lastName') is-invalid @enderror" id="lastName" name="lastName"
                                   placeholder="Enter last name" value="{{old('lastName')}}">
                            @error('lastName')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                                   id="username" placeholder="Username" value="{{old('username')}}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                                   placeholder="Enter your password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="rpassword">Retype Password</label>
                            <input type="password" class="form-control @error('rpassword') is-invalid  @enderror"
                                   id="rpassword" name="rpassword"
                                   placeholder="Retype your password">
                            @error('rpassword')
                            <div class="invalid-feedback">
                                Please retype the password
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" placeholder="you@example.com" value="{{old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <?php

                    $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

                    ?>
                    <hr>
                   <h4 class="mb-3">Shipping Address</h4>
                   <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100 @error('country') is-invalid @enderror" id="country" name="country">
                                <option value="">Choose...</option>
                                @foreach($countries as $countrie)
                                <option>{{ $countrie }}</option>
                                    @endforeach
                            </select>
                            @error('country')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>


                        <div class="col-md-4 mb-3">
                            <label for="state">State</label>
                            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror"
                                   id="state" placeholder="your state" value="{{old('state')}}">
                            @error('state')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" name="zip" class="form-control @error('zip') is-invalid @enderror"
                                   id="zip" placeholder="eg: 1145">
                            @error('zip')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>



                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                               id="address" placeholder="1234 Main St" value="{{old('address')}}">
                        @error('address')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control"
                               id="address2" placeholder="Apartment or suite"
                               name="address2" value="{{old('address2')}}">
                    </div>

                   <hr>
                   <h4 class="mb-3">Billing Address</h4>

                    <hr class="mb-4">
                    <div class="text-center">
                        <button class="btn btn-outline-success btn-lg btn-block" type="submit">Continue</button>
                    </div>
                </form>
                <br>
                <br>
            </div>
        </div>

    </div>


    @endsection
