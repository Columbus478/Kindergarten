@extends('layouts.layout')
@section('body')
@if(Session::has('errors'))
<div class='text-danger' style="padding:20px;">
  {{Session::get('errors')}} 
</div>
<hr/>
@endif
@if(Auth::check())
@include('layouts.menu')
<h2 style="font-style:italic">Welcome to My Sample laravel Application </h2>
@if(Session::has('status'))
<hr/>
<div class='text-success'>
  {{Session::get('status')}} 
</div>
<hr/>
@endif
<form  method='POST' action="{{url('user/createcomment')}}" id='form'>
{{csrf_field()}}
    
    <div class='form-group'>
    <div class='row'>
    <div class="col-md-1">
    <img src="{{url(Auth::user()->profiles)}}" class="img-responsive" style="max-width:60px;">
      <strong><a href="{{url('home/user/'.Auth::user()->id)}}">{{Auth::user()->name}}</a></strong>  
    </div>
   
    <div class='col-md-12'>
        <textarea class="form-control" name="comment" style="height:100px;"></textarea>
        <br>
        <button type='submit' class='btn btn-primary'>Publish</button>
    </div>
       </div>
       </div>
</form>
<hr>
<?php
$comments = App\comments::select()->orderBy('id','desc')->paginate(3);
$modal =0;
foreach ($comments as $comment ):    # code...
 $user = App\user::select()->where('id','=',$comment->id_user)->first();
?>
 <div class="row">
     <div class="col-md-1">
         <img src="{{url($user->profiles)}}" class="img-responsive" style="max-width:60px;"/>
         <strong><a href="{{url('home/user/'.Auth::user()->id)}}">{{$user->name}}</a></strong>         
     </div>
     <br>
     <div class="col-md-6">
             {{$comment->comment}} <br>          
             <i>Date: {{$comment->date}}  Time: {{$comment->time}}</i>
             @if($comment->id_user = Auth::user()->id)
             
                 <button type="button" class="btn btn-danger" data-toggle='modal' 
                 data-target ="#deleteComment{{$modal}}"> Delete
                 </button>
<!---                        Delete Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id ="deleteComment{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title"> </h4>
      </div>
      <div class="modal-body" >
        <h4>Are you sure you want to delete the Comment&hellip;??</h4>
        <form action="{{url('user/deletecomment')}}" method="POST" role="form">
             {{csrf_field()}}                
                <input type="hidden" name='id_comment' class="form-control" value="{{$comment->id}}" >            
                 <button type="submit" class="btn btn-danger" >Delete</button>
                  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


                 <button type="button" class="btn btn-success" data-toggle='modal' 
                 data-target ="#editComment{{$modal}}"> Edit
                 </button>
<!---                        Edit Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="editComment{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Edit this comment</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('user/editcomment')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                            <textarea name="comment" rows="10" class="form-control">{{$comment->comment}}</textarea>
                            </div>
                            <input type="hidden" name="id_comment" value="{{$comment->id}}" />
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
            <?php $modal++ ?>
             @endif
         </div>
 </div>
 <hr>
<?php endforeach ?>
<div class='text-center'>
<?php $comments->setPath(''); ?>
<?php echo $comments->render() ?>
   <p>Paging {{$comments->currentPage()}} of {{$comments->lastPage()}}</p>
</div>
@else
<div class="webpage">
<h2><i>Welcome To Kindergarten Nobi.vn '</i> </h2>
    <hr />
    <p class="bg-info" style="padding: 10px;">A Guest??? Click <a href="{{url('auth/login')}}">Start Session
    </a>
     to login in.
    </p>
    <hr />
</div>

        
@endif
@stop