@extends('layouts.layout')
@include('layouts.header')
@include('layouts.sidemenu')


@section('title')
Diaries
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
                             <h4 class="title">DIARIES
                                <button type="button" rel="tooltip" title="Add new Diary" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#addDiary">
                                                    <i class="fa fa-plus"></i>
                                                </button> 
                                                </h4>
                                                 @if(Session::has('status'))
                                          <div class='text-success'>
                                            {{Session::get('status')}} 
                                          </div>
                                          <hr/>
                                          @endif
                                        
                                           @if(Session::has('error')) 
                                          <div class='text-danger'>
                                            {{Session::get('error')}} 
                                          </div>
                                          <hr/>
                                          @endif
                           @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
                                          <script>
                                          $(function() {
                                              $('#addDiary').modal('show');
                                          });
                                          </script>
                                          @endif                                   

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
                  <th>DiaryID</th>
                  <th>DiaryDateTime</th>
                  <th >BabyID</th>
                  <th>Detail</th>
                  <th>Notice</th>
                  <th>Read</th>
                  <th>ImagesList</th>
                  <th>Status</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
               <?php
            $diaries = App\Diaries::select()->orderBy('DiaryID','desc')->get();
            $modal =0;
            $checkbox_data = array();
            foreach ($diaries as $diary):    # code...
             //$user = App\user::select()->where('id','=',$comment->id_user)->first();
            $checkbox_data = array($diary->Read,$diary->Status);
            $val = in_array($diary->Read, $checkbox_data);
            ?>
              <tr class="gradeX">
                  <td>{{$diary->DiaryID}}</td>
                  <td>{{$diary->DiaryDateTime}}</td>
                  <td>{{$diary->BabyID}}</td>
                  <td class="center hidden-phone">{{$diary->Detail}}</td>
                  <td class="center hidden-phone">{{$diary->Notice}}</td>
                  <td class="hidden-phone">{{$diary->Read}}</td>
                  <td >
                   <img src="{{$diary->ImageList}}}" alt="" class="img-responsive" style=" min-width:60px min-height:60px;">
                   </td>
                  <td class="center hidden-phone">{{$diary->Status}}</td>
                  <td><button type="button" rel="tooltip" title="Edit Baby" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#editDiary{{$modal}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#deleteDiary{{$modal}}">
                                                    <i class="fa fa-times"></i>
                                                </button></td>
                                               
              </tr>  
              <!---                        Edit Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="editDiary{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Edit Diary</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('pages/editdiary')}}" enctype='multipart/form-data'>
                            {{csrf_field()}}
                             <div class="form-group">
                            <label for="diaryID" >DiaryID:</label>
                            <input name="diaryID" value="{{$diary->DiaryID}}" rows="5" class="form-control col-md-5" disabled />
                            </div>
                            <div class="form-group">
                            <label for="diaryDateTime">DiaryDateTime:</label>
                            <div class='input-group date ' id='datetimepicker1'>
                                <input type='text' class="form-control datetimepicker" name="diaryDateTime" data-date-format="DD/MM/YYYY H:i:s" value="{{$diary->DiaryDateTime}}" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <span class="help-block text-danger">{{$errors->error_message->first('diaryDateTime')}}</span>
                            </div>
                            <div class="form-group">
                             <label for="babyname">BabyName:</label>
                            <select name="babyname" class="form-control">
                              <option>{{$diary->BabyID}}</option>
                              <option value="">Baby A</option>
                              <option value="">Baby B</option>                              
                            </select>
                            </div>
                             <div class="form-group">
                             <label for="detail">Detail:</label>
                            <textarea name="detail" rows="10" class="form-control" >{{$diary->Detail}}</textarea>
                            </div>       
                            
                             <div class="form-group">
                             <label for="notice">Notice:</label>
                             <textarea name="notice" rows="10" class="form-control" >{{$diary->Notice}}</textarea>    
                             </div>
                            <div class="form-group">
                             <label for="read">Read:</label>
                            <input type="checkbox" name="read" rows="10" value="{{$val}}"  title="if read or not." />
                            </div>
                            <div class="form-group">
                             <label for="imagelist">Change Image:</label>
                             <label class="btn btn-primary btn-file">
                              Browse <input type="file" name="image" style="display: none;">
                                </label>                  
                            </div>
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" value="{{$diary->Status}}" rows="10" title="if active or not" />
                            </div>
                            <input type="hidden" name="id_diary" value="{{$diary->DiaryID}}" />
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
  <div class="modal fade" tabindex="-1" role="dialog" id ="deleteDiary{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title">Delete Diary </h4>
      </div>
      <div class="modal-body" >
        <h4>Are you sure you want to delete this diary&hellip;??</h4>
        <form action="{{url('pages/deletediary')}}" method="POST" role="form">
             {{csrf_field()}}                
              <input type="hidden" name='id_diary' class="form-control" value="{{$diary->DiaryID}}" >            
                 <button type="submit" class="btn btn-danger" >Delete</button>
                  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $modal++ ?>
              <?php endforeach ?>            
             
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
  <div class="modal fade" tabindex="-1" role="dialog" id="addDiary" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Add New Diary</h4>
      </div>
      <div class="modal-body">
                        <form method="POST" action="{{url('pages/diaries')}}" enctype='multipart/form-data'>
                            {{csrf_field()}}                           
                            <div class="form-group">
                            <label for="diaryDateTime">DiaryDateTime:</label>
                            <div class='input-group date ' id='datetimepicker1'>
                                <input type='text' class="form-control datetimepicker" name="diaryDateTime" data-date-format="DD/MM/YYYY" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <span class="help-block text-danger">{{$errors->error_message->first('diaryDateTime')}}</span>
                            </div>
                            <div class="form-group">
                             <label for="babyname">BabyName:</label>
                           <select name="babyname" class="form-control">
                              <option value="">Baby A</option>
                              <option value="">Baby B</option>                              
                            </select>

                            </div>
                             <div class="form-group">
                             <label for="detail">Detail:</label>
                            <textarea name="detail" rows="10" class="form-control" ></textarea>
                             <span class="help-block text-danger">{{$errors->error_message->first('detail')}}</span>
                            </div>                      
                             <div class="form-group">
                             <label for="notice">Notice:</label>
                             <textarea class="form-control" name="notice" row="10"></textarea>
                              <span class="help-block text-danger">{{$errors->error_message->first('notice')}}</span>
                            </div>
                            <div class="form-group">
                             <label for="read">Read:</label>
                            <input type="checkbox" name="read" rows="10"  title="if read or not." />
                            </div>
                            <div class="form-group">
                             <label for="imagelist">Add Image:</label>
                             <label class="btn btn-primary btn-file">
                              Browse <input type="file" name="image" style="display:none;">
                                </label>                      
                            <span class="help-block text-danger">{{$errors->error_message->first('image')}}</span>
                            </div>
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10" title="if active or not" />
                            </div>
                            <input type="hidden" name="id_comment" value="" />
                            <button type="submit" class="btn btn-primary">Save</button>
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