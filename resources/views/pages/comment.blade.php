@extends('layouts.layout')
@include('layouts.header')
@include('layouts.sidemenu')


@section('title')
Comment
@stop
@section('body')

     <section id="container" >
 <!--main content start-->
      <section id="main-content">
      <div class="content">
 <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-posts">
                            <div class="card-header">
                             <h4 class="title">COMMENTS
                               <button type="button" rel="tooltip" title="Add new comment" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#addComment">
                                                    <i class="fa fa-plus"></i>
                                                </button>                 
                                               </h4>
                                           

                                <div class="row">
                                <div class="col-md-6">
                                    
                                </div>                                    
                                    <div class="col-md-6">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="content table-responsive table-full-width">

  <div class="col-sm-12">
              <section class="panel">
              <header class="panel-heading">               
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
              <div class="panel-body">
              <div class="adv-table">
              <table class="display table table-bordered" id="hidden-table-info">
              <thead>
              <tr>
                  <th>CommentID</th>
                  <th>Detail</th>
                  <th class="hidden-phone">ImagesList</th>
                  <th class="hidden-phone">CommentDateTime</th>
                  <th class="hidden-phone">DiaryID</th>
                  <th class="hidden-phone">ReplyName</th>
                  <th class="hidden-phone">Read</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              <tr class="gradeX">
                  <td>Trident</td>
                  <td>Internet
                      Explorer 4.0</td>
                  <td class="hidden-phone">Win 95+</td>
                  <td class="center hidden-phone">4</td>
                  <td class="center hidden-phone">X</td>
                  <td class="center hidden-phone">4</td>
                  <td class="center hidden-phone">X</td>
                  <td> <button type="button" rel="tooltip" title="Edit Baby" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#editComment">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#deleteComment">
                                                    <i class="fa fa-times"></i>
                                                </button></td>
                                               
              </tr>              
             
              </tbody>
              </table>

              </div>
              </div>
              </section>
              </div>                             

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
      <!-- Right Slidebar end -->
<!---                        Add Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="addComment" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Add New Comment</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('user/editcomment')}}">
                           <!--  {{csrf_field()}} -->
                            <div class="form-group">
                             <label for="detail">Detail:</label>
                            <textarea name="detail" rows="10" class="form-control" placeholder="Detail.."></textarea>
                            </div>
                                                      
                            <div class="form-group">
                            <label for="commentDateTime">CommentDateTime:</label>
                            <div class='input-group date ' id='datetimepicker1'>
                                <input type='text' class="form-control datetimepicker" name="commentDateTime" data-date-format="DD/MM/YYYY" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <span class="help-block text-danger">{{$errors->error_message->first('commentDateTime')}}</span>
                            </div>
                            <div class="form-group">
                             <label for="dairyname">DiaryName:</label>
                           <select name="diaryname" class="form-control">
                              <option value="">Diary A</option>
                              <option value="">Diary B</option>                              
                            </select>
                            </div>
                             <div class="form-group">
                             <label for="replyname">ReplyName:</label>
                            <input name="replyname" rows="10" class="form-control"  placeholder="Enter reply name..." />
                            </div>
                            <div class="form-group">
                             <label for="read">Read:</label>
                            <input type="checkbox" name="read" rows="10"  title="if read or not." />
                            </div>
                            <!-- <input type="hidden" name="id_comment" value="" /> -->
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<!---                        Edit Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="editComment" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Edit Comment</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('user/editcomment')}}">
                           <!--  {{csrf_field()}} -->
                            <div class="form-group">
                            <label for="commentID" >CommentID:</label>
                            <input name="commentID" rows="5" class="form-control col-md-5" disabled />
                            </div>
                             <div class="form-group">
                             <label for="detail">Detail:</label>
                            <textarea name="detail" rows="10" class="form-control" ></textarea>
                            </div>
                             
                           <div class="form-group">
                            <label for="commentDateTime">CommentDateTime:</label>
                            <div class='input-group date ' id='datetimepicker1'>
                                <input type='text' class="form-control datetimepicker" name="commentDateTime" data-date-format="DD/MM/YYYY" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            
                            </div>
                            <div class="form-group">
                             <label for="diaryname">DiaryName:</label>
                           <select name="diaryname" class="form-control">
                              <option value="">Diary A</option>
                              <option value="">Diary B</option>                              
                            </select>
                            </div>
                             <div class="form-group">
                             <label for="replyname">ReplyName:</label>
                            <input name="replyname" rows="10" class="form-control"   />
                            </div>
                            <div class="form-group">
                             <label for="read">Read:</label>
                            <input type="checkbox" name="read" rows="10"  title="if read or not." />
                            </div>
                           <!--  <input type="hidden" name="id_comment" value="" /> -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!---                        Delete Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id ="deleteComment" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title">Delete Baby </h4>
      </div>
      <div class="modal-body" >
        <h4>Are you sure you want to delete this comment&hellip;??</h4>
        <form action="{{url('user/deletecomment')}}" method="POST" role="form">
             <!-- {{csrf_field()}}                
                <input type="hidden" name='id_comment' class="form-control" value="" > -->            
                 <button type="submit" class="btn btn-danger" >Delete</button>
                  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</div>
</section>
</section>
  @stop
  @include('layouts.footer')