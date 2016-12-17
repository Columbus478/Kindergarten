@extends('layouts.layout')
@include('layouts.footer')

@section('title')
 Profile Status
@stop
@section('content')
@include('layouts.menu')
<h1>Profile@ {{Auth::user()->name}}</h1>

@if(Session::has('status'))
<hr/>
<div class='text-success'>
  {{Session::get('status')}} 
</div>
<hr/>
@endif

        <hr>
<img src='{{url(Auth::user()->profiles)}}' class='img-responsive img-circle' style="max-width:250px; height:250px; width:250px;">
<hr>
<ul class='list-inline'>
<li class="sidebar-brand"> Content Menu: </li>
<li><a href="{{url('user/profile')}}">Change image</a></li>
	@if(Auth::user()->social == 0)
   <li><a href="{{url('user/password')}}">Change password</a></li>
@endif
	
	

</ul>
@stop