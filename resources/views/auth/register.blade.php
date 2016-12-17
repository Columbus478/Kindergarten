@extends('layouts.layout')
@include('layouts.guestlayout')
@section('title')
 Registration
@stop

@section('body')
<div class="container">

      <form class="form-signin" method="POST" action="{{url('auth/register')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <h2 class="form-signin-heading">registration now</h2>
        <div class='text-success' id='result'>
        @if(Session::has('message'))
        {{Session::get('message')}}
        @endif
      </div>
        <div class="login-wrap">
            <p>Enter your personal details below</p>
            <div class='form-group'>      
            <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" autofocus>
             <div class='text-danger' id='error_name'>{{$errors->error_message->first('name')}}</div>
            </div>
            <div class='form-group'>
            <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address') }}" autofocus>
             <div class='text-danger' id='error_address'>{{$errors->error_message->first('address')}}</div>
            </div>
            <div class='form-group'>
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" autofocus>
             <div class='text-danger' id='error_email'>{{$errors->error_message->first('email')}}</div>
            </div>
            <div class='form-group'>
            <input type="text" name="city" class="form-control" placeholder="City/Town" value="{{ old('city') }}" autofocus>
             <div class='text-danger' id='error_city'>{{$errors->error_message->first('city')}}</div>
            </div>
            <div class="radios">
                <label class="label_radio col-lg-6 col-sm-6" for="male">
                    <input name="sex" id="male" value="male" type="radio" /> Male
                </label>
                <label class="label_radio col-lg-6 col-sm-6" for="female">
                    <input name="sex" id="female" value="famale" type="radio" /> Female
                </label>
                <div class='text-danger' id='error_sex'>{{$errors->error_message->first('sex')}}</div>
            </div>

            <p> Enter your account details below</p>
            <div class='form-group'>
            <input type="text" name="username" class="form-control" placeholder="User Name" value="{{ old('username') }}" autofocus>
             <div class='text-danger' id='error_username'>{{$errors->error_message->first('username')}}</div>
            </div>
            <div class='form-group'>
            <input type="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Password">
             <div class='text-danger' id='error_password'>{{$errors->error_message->first('passwrod')}}</div>
            </div>
            <div class='form-group'>
            <input type="password" name="confirmpassword" class="form-control" value="{{ old('confirmpassword') }}" placeholder="Re-type Password">
             <div class='text-danger' id='error_confirmpassword'>{{$errors->error_message->first('confirmpassword')}}</div>
            </div>
            <div class='form-group'>
            <label class="checkbox">
                <input type="checkbox" name="agree" value="1"> I agree to the Terms of Service and Privacy Policy
                 <div class='text-danger' id='error_agree'>{{$errors->error_message->first('agree')}}</div>
            </label>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
            <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>

            <div class="registration">
                Already Registered.
                <a class="" href="{{url('auth/login')}}">
                    Login
                </a>
            </div>

        </div>

      </form>

    </div>
@stop