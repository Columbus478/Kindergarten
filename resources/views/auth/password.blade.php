@extends('layouts.home')
 Reset Password
@section('title')
@stop

@section('content')
<div class="container col-md-7">
<div class="jumbotron">
<h4>Reset your Password.</h4>
@if(Session::has('status'))
 <div class='alert alert-success'>{{Session::get('status')}}</div>
@endif

@if(count($errors)>0)
 <div class='alert alert-danger'>Your Email or password is incorrect.</div>
@endif

<br>
<form method='POST' action='{{url("password/email")}}'>
	{{csrf_field()}}
	<div class='form-group'>
		<label for='email'>Email:</label>
        <input type="email" class='form-control' name="email" value="{{ old('email') }}">
         <div class='text-danger' id='error_email'>{{$errors->first('email')}}</div>
	</div>
	 <button type="submit" class='btn btn-primary'>Submit your Email.</button>
</form>
</div>
</div>
@stop