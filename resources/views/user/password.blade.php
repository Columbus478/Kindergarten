@extends('layouts.layout')
@include('layouts.guestlayout')


@section('title')
Update Password
@stop

@section('body')


@if(Session::has('message'))
 <div class='alert alert-success'>{{Session::get('message')}}</div>
@endif

<!-- @if(count($errors)>0)
 <div class='alert alert-danger'>Your Email or password is incorrect.</div>
@endif -->


<div class="form-signin" >
<hr>
<div class="login-wrap">
<h2 class="form-signin-heading" >Update your Password.</h2>
<hr><hr>
<form method='POST' action='{{url("user/updatepassword")}}'>
	{{csrf_field()}}
	<div class='form-group'>
		<label for='mypassword'>My Password:</label>
        <input type="password" class='form-control' name="mypassword" >
         <div class='text-danger' id='error_email'>{{$errors->first('mypassword')}}</div>
	</div>
	<div class='form-group'>
		<label for='password'>Password:</label>
        <input type="password" class='form-control' name="password" >
         <div class='text-danger' id='error_password'>{{$errors->first('password')}}</div>
	</div>
	<div class='form-group'>
		<label for='mypassword'>Confirm Password:</label>
        <input type="password" class='form-control' name="password_confirmation" >
         <div class='text-danger' id='error_password_confirmation'>{{$errors->first('password_confirmation')}}</div>
	</div>
	 <button type="submit" class='btn btn-primary'>Update Password.</button>
</form>
</div>
</div>

@stop