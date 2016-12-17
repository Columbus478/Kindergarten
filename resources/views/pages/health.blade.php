@extends('layouts.layout')
@include('layouts.header')
@include('layouts.sidemenu')


@section('title')
Health
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
                              <h4 class="title">HEALTHS
                               <button type="button" rel="tooltip" title="Add new Health" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#addHealth">
                                                    <i class="fa fa-plus"></i>
                                                </button>                                           </h4>
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
                                              $('#addHealth').modal('show');
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
                  <th>HealthID</th>
                  <th>ExamineDate</th>
                  <th >Height</th>
                  <th >Weight</th>
                  <th >Note</th>
                   <th >BabyID</th>
                   <th></th>
              </tr>
              </thead>
              <tbody>
               <?php
            $healths = App\Healths::select()->orderBy('HealthID','desc')->get();
            $modal =0;
            foreach ($healths as $health):    # code...
             //$user = App\user::select()->where('id','=',$comment->id_user)->first();
            ?>
              <tr class="gradeX">
                  <td>{{$health->HealthID}}</td>
                  <td>{{$health->ExamineDate}}</td>
                  <td>{{$health->Height}}</td>
                  <td>{{$health->Weight}}</td>
                  <td>{{$health->Note}}</td>
                  <td >{{$health->BabyID}}</td>
                  <td><button type="button" rel="tooltip" title="Edit Health" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#editHealth{{$modal}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#deleteHealth{{$modal}}">
                                                    <i class="fa fa-times"></i>
                                                </button></td>
                                               
              </tr>
              
<!---                        Edit Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="editHealth{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Edit Health</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('pages/edithealth')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                            <label for="healthID" >HealthID:</label>
                            <input name="healthID" rows="5" value="{{$health->HealthID}}" class="form-control col-md-5" disabled />
                            </div>               
                            <div class="form-group">
                             <label for="examinedate">ExamineDate:</label>
                            <input type="date" name="examinedate" value="{{$health->ExamineDate}}" rows="10" class="form-control" />
                            </div>
                            <div class="form-group">
                             <label for="height">Height:</label>
                            <input name="height" rows="10" value="{{$health->Height}}" class="form-control"  />
                            </div>
                             <div class="form-group">
                             <label for="weight">Weight:</label>
                            <input name="weight" rows="10" value="{{$health->Weight}}" class="form-control"   />
                            </div>
                            <div class="form-group">
                             <label for="note">Note:</label>
                            <textarea name="note" rows="10" class="form-control" >{{$health->Note}}</textarea>
                            </div>
                            <div class="form-group">
                             <label for="babyname">BabyName:</label>
                           <select name="babyname" class="form-control">
                           <option>{{$health->BabyID}}</option>
                              <option value="23456">Baby A</option>
                              <option value="65432">Baby B</option>                              
                            </select>
                            </div>
                            <input type="hidden" name="id_health" value="{{$health->HealthID}}" />
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
  <div class="modal fade" tabindex="-1" role="dialog" id ="deleteHealth{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title">Delete Health </h4>
      </div>
      <div class="modal-body" >
        <h4>Are you sure you want to delete this health&hellip;??</h4>
        <form action="{{url('pages/deletehealth')}}" method="POST" role="form">
             {{csrf_field()}}                
                <input type="hidden" name='id_health' class="form-control" value="{{$health->HealthID}}" >            
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
  <div class="modal fade" tabindex="-1" role="dialog" id="addHealth" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Add New Health</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('pages/health')}}">
                            {{csrf_field()}}                                          
                            <div class="form-group">
                             <label for="examinedate">ExamineDate:</label>
                            <input type="date" name="examinedate" rows="10" class="form-control" />
                            <span class="help-block text-danger">{{$errors->error_message->first('examinedate')}}</span>
                            </div>
                            <div class="form-group">
                             <label for="height">Height:</label>
                            <input name="height" rows="10" class="form-control"  placeholder="Enter height..." />
                            <span class="help-block text-danger">{{$errors->error_message->first('height')}}</span>
                            </div>
                             <div class="form-group">
                             <label for="weight">Weight:</label>
                            <input name="weight" rows="10" class="form-control"  placeholder="Enter weight..." />
                            <span class="help-block text-danger">{{$errors->error_message->first('weight')}}</span>
                            </div>
                            <div class="form-group">
                             <label for="note">Note:</label>
                            <textarea name="note" rows="10" class="form-control" placeholder="Note.."></textarea>
                            <span class="help-block text-danger">{{$errors->error_message->first('note')}}</span>
                            </div>
                            <div class="form-group">
                             <label for="babyname">BabyName:</label>
                            <select name="babyname" class="form-control">
                              <option value="23456">Baby A</option>
                              <option value="65432">Baby B</option>                              
                            </select>                            
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