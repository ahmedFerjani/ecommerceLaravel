@extends('front.master')
@section('title', 'Update Password')

@section('content')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<script src="{{asset('bootstrap/js/jquery-3.4.1.slim.min.js')}}"></script>
<script src="{{asset('bootstrap/js/popper.min.js')}}" ></script>
<script src="{{asset('bootstrap/js/bootstrap.js')}}" ></script>
<form class="form text-center" method="POST"  action="{{ url('/password')  }}">
@csrf
<!-- Form Name -->
    <section class="jumbotron text-center" style="background: linear-gradient(to right, #0062E6, #33AEFF);">
        <div class="container" >
            <h1 class="jumbotron-heading" style="color: white">Update password</h1>
        </div>
    </section>
        <br><br>
        <!-- Password input-->
        <div class="form-group row ">
            <div class="col-3"></div>
            <label class="col-2 col-form-label text-left" for="apassword">Actual Password</label>
            <div class="col-4">
                <input id="apassword" name="apassword" type="password"
                       placeholder="type your actual password"
                       class="form-control @error('apassword') is-invalid @enderror" required >
                @error('apassword')
                <<div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group row">
            <div class="col-3"></div>
            <label class="col-2 col-form-label text-left" for="npassword">New Password</label>
            <div class="col-4">
                <input id="npassword" name="npassword"
                       type="password" placeholder="type your new password"
                       class="form-control input-md @error('npassword') is-invalid @enderror" required>
                @error('npassword')
                <div class="invalid-feedback">
                    <p>new password must have a length between 5 and 20</p>
                </div>
                @enderror

            </div>
        </div>

        <!-- Password input-->
        <div class="form-group row">
            <div class="col-3"></div>
            <label class="col-2 col-form-label text-left" for="npassword2">New Password Again</label>
            <div class="col-4">
                <input id="npassword2" name="npassword2"
                       type="password" placeholder="retype your new password"
                       class="form-control input-md @error('apassword2') is-invalid @enderror" required>
                @error('npassword2')
                <div class="invalid-feedback">
                    <p>Must be the same as the new password</p>
                </div>
                @enderror
            </div>
        </div>
        <br>
        <!-- Button (Double) -->
        <div class="form-group row">
            <label class="col-5 control-label"></label>
            <div class="col-">
                <button id="cancel" name="cancel" class="btn btn-danger"
                        type="reset"
                        style="margin-right: 30px;"><span class="fa fa-trash">&nbsp;</span>Reset</button>
                <button id="save" name="save" class="btn btn-success" type="submit">
                    <span class="fa fa-save">&nbsp;</span>
                    Save new password</button>
            </div>
        </div>
    <br>
    @if(Session::has('msg'))
        <p class="alert {{ Session::get('alert') }}">{{ Session::get('msg') }}</p>
    @endif
</form>

@endsection
