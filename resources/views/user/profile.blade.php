@extends('layouts.home')
@section('title')
User Profile
@stop

@section('content')
@include('layouts.menu')
 <form method='POST' action= '{{url("user/updateprofile")}}' enctype='multipart/form-data'>
{{csrf_field()}}
 <div class='form-group'>
 	<label class='img-responsive' for='image'> Image: </label>
 	<input type='file' name='image' class='form-control'>
    <div class='text-danger'>{{$errors->first('image')}}</div>
 </div>
 <button class='btn btn-primary' type='submit'>Upload Profile Image</button>

 </form>
@stop