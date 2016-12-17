@extends('layouts.layout')
@include('layouts.header')
@include('layouts.sidemenu')
@include('layouts.footer')
@section('title')
Teacher
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
                                 <h4 class="title">TEACHERS
                               <button type="button" rel="tooltip" title="Add new Baby" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#addTeacher">
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
                        @if(!empty(Session::get('error_code')) && Session::get('error_code') == 3)
                                          <script>
                                          $(function() {
                                              $('#addTeacher').modal('show');
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
                  <th>TeacherID</th>
                  <th>TeacherName</th>
                  <th>Address</th>
                  <th>Email</th>                  
                  <th>BirthDate</th>
                  <th>FacebookID</th>
                  <th >SkypeID</th>
                  <th>ClassID</th>
                  <th>PublicInformation</th>
                  <th>Status</th>
                  <th></th>
                                    
              </tr>
              </thead>
              <tbody>
                <?php
            $teachers = App\Teachers::select()->orderBy('TeacherID','desc')->paginate(3);
            $modal =0;
            foreach ($teachers as $teacher):    # code...
             //$user = App\user::select()->where('id','=',$comment->id_user)->first();
            ?>
              <tr class="gradeX">
                  <td>{{$teacher->TeacherID}}</td>
                  <td>{{$teacher->TeacherName}}</td>
                  <td class="hidden-phone">{{$teacher->Address}}</td>
                  <td class="center hidden-phone">{{$teacher->Email}}</td>                  
                  <td>{{$teacher->BirthDate}}</td>
                  <td>{{$teacher->FacebookId}}
                    </td>
                  <td class="hidden-phone">{{$teacher->SkypeId}}</td>
                  <td class="center hidden-phone">{{$teacher->ClassID}}</td>
                  <td class="center hidden-phone">{{$teacher->PublicInformation}}</td>
                  <td class="center hidden-phone">{{$teacher->Status}}</td>
                  <td><button type="button" rel="tooltip" title="Edit Teacher" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#editTeacher{{$modal}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#deleteTeacher{{$modal}}">
                                                    <i class="fa fa-times"></i>
                                                </button></td>
                                               
              </tr>
              <!---                        Edit Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="editTeacher{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Edit Teacher</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('pages/editteacher')}}">
                            {{csrf_field()}}
                           <div class="form-group">
                            <label for="teacherID" >TeacherID:</label>
                            <input name="teacherID" rows="5" value="{{$teacher->TeacherID}}" class="form-control col-md-5" disabled  />
                            </div>
                             <div class="form-group">
                            <label for="teacherName" >TeacherName:</label>
                            <input name="teacherName" rows="5" value="{{$teacher->TeacherName}}" class="form-control col-md-5" />
                            </div>
                             <div class="form-group">
                            <label for="address" >Address:</label>
                            <input name="address" rows="5" value="{{$teacher->Address}}" class="form-control col-md-5"  />
                            </div>
                            <div class="form-group">
                            <label for="email" >Email:</label>
                            <input type="email" name="email" value="{{$teacher->Email}}" rows="5" class="form-control col-md-5"  />                            
                            </div>
                            <div class="form-group">
                             <label for="BirhtDate">BirthDate:</label>
                            <input type="date" name="birhtdate" value="{{$teacher->BirthDate}}" rows="10" class="form-control"  />
                            </div>
                            <div class="form-group">
                            <label for="facebookid" >FacebookURL:</label>
                            <input name="facebookid" rows="5" value="{{$teacher->FacebookId}}" class="form-control col-md-5"  />
                            </div>
                            <div class="form-group">
                            <label for="skypeid" >SkypeID:</label>
                            <input name="skypeid" rows="5" value="{{$teacher->SkypeId}}" class="form-control col-md-5"  />
                            </div>
                            <div class="form-group">
                             <label for="classname">ClassName:</label>
                            <select name="classname" class="form-control">
                            <option value="{{$teacher->ClassID}}" >{{$teacher->ClassID}}</option>
                              <option value="23456">Class A</option>
                              <option value="65432">Class B</option>                              
                            </select>
                            </div>           
                            <div class="form-group">
                             <label for="publicinformation">PublicInformation:</label>
                             <textarea name="publicinformation"  rows="10" class="form-control" >{{$teacher->PublicInformation}}</textarea>
                            </div>                      
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10" value="{{$teacher->Status}}"   title="if active or not."  />
                            </div>            
                            <input type="hidden" name="id_teacher" value="{{$teacher->TeacherID}}" />
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
  <div class="modal fade" tabindex="-1" role="dialog" id ="deleteTeacher{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title">Delete Teacher </h4>
      </div>
      <div class="modal-body" >
        <h4>Are you sure you want to delete this teacher&hellip;??</h4>
        <form action="{{url('pages/deleteteacher')}}" method="POST" role="form">
             {{csrf_field()}}                
                <input type="hidden" name='id_teacher' class="form-control" value="{{$teacher->TeacherID}}" >            
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
      <!-- Right Slidebar end -->
<!---                        Add Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="addTeacher" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Add New Teacher</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('pages/createteacher')}}">
                            {{csrf_field()}}                            
                             <div class="form-group">
                            <label for="teacherName" >TeacherName:</label>
                            <input name="teacherName" rows="5" class="form-control col-md-5" />
                            <span class="help-block text-danger">{{$errors->error_message->first('teacherName')}}</span>
                            </div>
                             <div class="form-group">
                            <label for="address" >Address:</label>
                            <input name="address" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('address')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="email" >Email:</label>
                            <input type="email" name="email" rows="5" class="form-control col-md-5"  />  
                            <span class="help-block text-danger">{{$errors->error_message->first('email')}}</span>                          
                            </div>
                            <div class="form-group">
                            <label for="password" >Password:</label>
                            <input name="password" type="password" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('password')}}</span>
                            </div>
                             <div class="form-group">
                             <label for="BirhtDate">BirthDate:</label>
                            <input type="date" name="birthdate" rows="10" class="form-control"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('birthdate')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="facebookid" >FacebookURL:</label>
                            <input name="facebookid" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('facebookid')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="skypeid" >SkypeID:</label>
                            <input name="skypeid" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('skypeid')}}</span>
                            </div>
                            <div class="form-group">
                             <label for="classname">ClassName:</label>
                          <select name="classname" class="form-control">
                              <option value="23456">Class A</option>
                              <option value="65432">Class B</option>                              
                            </select>
                            <span class="help-block text-danger">{{$errors->error_message->first('classname')}}</span>
                            </div>           
                            <div class="form-group">
                             <label for="publicinformation">PublicInformation:</label>
                            <textarea name="publicinformation" rows="10" class="form-control"></textarea>
                            <span class="help-block text-danger">{{$errors->error_message->first('publicinformation')}}</span>
                            </div>                      
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10"   title="if active or not."  />
                            </div>                         
                            
                           <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
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