@extends('layouts.layout')
@include('layouts.guestlayout')
@section('title')
 Login
@stop

@section('body')
  
    <div class="container">
<div class='text-success'>
    @if(Session::has('status'))
     {{Session::get('status')}}
     @endif
</div>
<div class='text-success'>
    @if(Session::has('success'))
     {{Session::get('success')}}
     @endif
</div>
<div class='text-danger'>
  @if(Session::has('message'))
   {{Session::get('message')}}
   @endif
</div>
      <form class="form-signin" method="POST" action="/auth/login">
        <h2 class="form-signin-heading">sign in now to Kindergarten</h2>
        <div class="login-wrap">
           <div>
            <input type="email" class="form-control" value="{{ old('email') }}" placeholder="User email" autofocus>
            <div class='text-danger' id='error_email'>{{$errors->error_message->first('email')}}</div>
            </div>
            <div>
            <input type="password" class="form-control" placeholder="Password" autofocus>
             <div class='text-danger' id='error_password'>{{$errors->error_message->first('password')}}</div>
            </div>
            <div>
            <label class="checkbox">
                <input type="checkbox" name="remember" > Remember me
                <span class="pull-right">
                   <a href="{{url('auth/password')}}"> Forgot Password?</a>

                </span>
            </label>
            </div>            
            <div>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            </div>
            <p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="{{url('social/facebook')}}" class="facebook">
                    <i class="fa fa-facebook"></i>
                    Facebook
                </a>
                <a href="{{url('social/google')}}" class="google">
                    <i class="fa fa-google" ></i>
                    Google
                </a>
            </div>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="{{url('auth/register')}}">
                    Create an account
                </a>
            </div>
            
        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Forgot Password ?</h4>
                      </div>
                      <div class="modal-body">
                       <form method="post" action='{{url("password/email")}}'>
                            {{csrf_field()}}
                          <p>Enter your e-mail address below to reset your password.</p>
                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                          <button class="btn btn-success" type="submit">Submit</button>
                      </div>

                  </div>
              </div>
          </div>
          <!-- modal -->

      </form>

    </div>
@stop
