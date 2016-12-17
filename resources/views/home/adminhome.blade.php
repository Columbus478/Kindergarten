@extends('layouts.layout')
@section('title')
Kindergarten
@stop 
@section('body')
@if(Auth::check())
@include('layouts.header')
@include('layouts.sidemenu')
@include('layouts.footer') 
@else
@extends('layouts.guestlayout')
@include('layouts.footer')
<div class="front-page">
<div class="webpage" >
<h2 style="padding-left: 100px; font-size: 50px;font-variant: small-caps; "><i>Welcome To Samuel Columbus Website</i> </h2>
<p class="" style="padding: 0 0 0 160px; ">..... A Guest??? Click <a href="{{url('auth/login')}}">Start Session
    </a>
     to login in.
    </p>
    <hr style="box-shadow: 0px 4px 5px #888888;" />   
    
</div>
</div>        

@endif
@stop
