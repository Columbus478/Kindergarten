@extends('layouts.layout')

@section('title')
Registration Confirmation
@stop

@section('body')
<div class='container'>
<h1>Welcome@ {{$data['username']}}</h1>
<div class='text-success' id='result'>
  <a href="{{url('')}}/auth/confirm/email/{{$data['email']}}/confirmToken/{{$data['confirmToken']}}">Please confirm your Registration</a>
</div>
</div>
@stop