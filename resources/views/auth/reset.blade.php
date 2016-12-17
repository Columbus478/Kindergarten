@extends('layouts.home')
 Reset Password
@section('title')
@stop

@section('content')
<h1>Reset your Password.</h1>
@if(Session::has('status'))
 <div class='alert alert-success'>{{Session::get('status')}}</div>
@endif

@if(count($errors)>0)
 <div class='alert alert-danger'>Your Email or password is incorrect.</div>
@endif

<br>
<form method='POST' action='{{url("password/reset")}}'>
	{{csrf_field()}}
	{{ Form::hidden('token', $token) }}
	<div class='form-group'>
		<label for='email'>Email:</label>
        <input type="email" class='form-control' name="email" value="{{ old('email') }}">
         <div class='text-danger' id='error_email'>{{$errors->first('email')}}</div>
	</div>
	<div class='form-group'>
		<label for='password'>Password:</label>
        <input type="password" class='form-control' name="password" value="{{ old('password') }}">
         <div class='text-danger' id='error_password'>{{$errors->first('password')}}</div>
	</div>
	<div class='form-group'>
       <label for='confirm_password'> Confirm Password:</label>
        <input class='form-control' type="password" name="password_confirmation">
        <div class='text-danger' id='error_password_confirmation'>{{$errors->first('password_confirmation')}}</div>
    </div>
	 <button type="submit" class='btn btn-primary'>Save.</button>
</form>
@stop