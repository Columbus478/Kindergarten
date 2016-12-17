  @extends('layouts.layout')
@include('layouts.header')
@include('layouts.sidemenu')


@section('title')
School
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
                                <h4 class="title">SCHOOLS
                               <button type="button" rel="tooltip" title="Add new school" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#addSchool">
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
                          @if(!empty(Session::get('error_code')) && Session::get('error_code') == 4)
                                          <script>
                                          $(function() {
                                              $('#addSchool').modal('show');
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
                  <th>SchoolID</th>
                  <th>SchoolName</th>
                  <th class="hidden-phone">Email</th>
                  <th class="hidden-phone">Address</th>
                  <th class="hidden-phone">Website</th>
                  <th class="hidden-phone">Phone</th>
                  <th class="hidden-phone">ContactName</th>
                  <th class="hidden-phone">ContactPhone</th>
                  <th class="hidden-phone">Logo</th>
                  <th class="hidden-phone">Status</th>
                  <th></th>
              </tr>
              </thead>
                              <tbody>
                               <?php
                $schools = App\Schools::select()->orderBy('SchoolID','desc')->paginate(3);
                $modal =0;
                foreach ($schools as $school ):    # code...
                 //$user = App\user::select()->where('id','=',$comment->id_user)->first();
                ?>
              <tr class="gradeX">
                  <td>{{$school->SchoolID}}</td>
                  <td>{{$school->SchoolName}}</td>
                  <td class="hidden-phone">{{$school->Email}}</td>
                  <td class="center hidden-phone">{{$school->Address}}</td>
                  <td class="center hidden-phone">{{$school->Website}}</td>
                  <td>{{$school->Phone}}</td>
                  <td>{{$school->ContactName}}</td>
                  <td class="hidden-phone">{{$school->ContactPhone}}</td>
                  
                  <td class="center hidden-phone">{{$school->Logo}}</td>
                  <td class="hidden-phone">{{$school->Status}}</td>
                  <td><button type="button" rel="tooltip" title="Edit School" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#editSchool{{$modal}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#deleteSchool{{$modal}}">
                                                    <i class="fa fa-times"></i>
                                                </button></td>
                                               
              </tr>
<!---                        Edit Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="editSchool{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Edit School</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('pages/editschool')}}">
                            {{csrf_field()}}
                             <div class="form-group">
                            <label for="schoolID" >SchoolID:</label>
                            <input name="schoolID" rows="5" class="form-control col-md-5" value="{{$school->SchoolID}}" disabled  />
                            </div>
                             <div class="form-group">
                            <label for="schoolname" >SchoolName:</label>
                            <input name="schoolname" rows="5" value="{{$school->SchoolName}}" class="form-control col-md-5" />
                            </div>
                            <div class="form-group">
                            <label for="email" >Email:</label>
                            <input type="email" name="email" value="{{$school->Email}}" rows="5" class="form-control col-md-5"  />
                            </div>
                             <div class="form-group">
                            <label for="address" >Address:</label>
                            <input name="address" value="{{$school->Address}}" rows="5"  class="form-control col-md-5"  />
                            </div>
                            <div class="form-group">
                            <label for="website" >Website:</label>
                            <input  name="website" rows="5" value="{{$school->Website}}" class="form-control col-md-5"  />
                            </div>
                             <div class="form-group">
                            <label for="phone" >Phone:</label>
                            <input name="phone" rows="5" value="{{$school->Phone}}" class="form-control col-md-5"  />
                            </div>                                                        
                            <div class="form-group">
                            <label for="contactname" >ContactName:</label>
                            <input name="contactname" value="{{$school->ContactName}}" rows="5" class="form-control col-md-5"  />
                            </div> 
                            <div class="form-group">
                            <label for="contactphone" >ContactPhone:</label>
                            <input name="contactphone" value="{{$school->ContactPhone}}" rows="5" class="form-control col-md-5"  />
                            </div>                           
                            <div class="form-group">
                            <label for="logo" >Logo:</label>
                            <input name="logo" rows="5" value="{{$school->Logo}}" class="form-control col-md-5"  />
                            </div>
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="active" value="{{$school->Status}}" rows="10"   title="if active or not."  />
                            </div> 
                            <input type="hidden" name="id_school" value="{{$school->SchoolID}}" />
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
  <div class="modal fade" tabindex="-1" role="dialog" id ="deleteSchool{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title">Delete School </h4>
      </div>
      <div class="modal-body" >
        <h4>Are you sure you want to delete this school&hellip;??</h4>
        <form action="{{url('pages/deleteschool')}}" method="POST" role="form">
             {{csrf_field()}}                
                <input type="hidden" name='id_school' class="form-control" value="{{$school->SchoolID}}" >            
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
  <div class="modal fade" tabindex="-1" role="dialog" id="addSchool" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Add New School</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('pages/createschool')}}">
                            {{csrf_field()}}                            
                             <div class="form-group">
                            <label for="schoolname" >SchoolName:</label>
                            <input name="schoolname" rows="5" class="form-control col-md-5" />
                            <span class="help-block text-danger">{{$errors->error_message->first('schoolname')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="email" >Email:</label>
                            <input type="email" name="email" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('email')}}</span>
                            </div>
                             <div class="form-group">
                            <label for="address" >Address:</label>
                            <input name="address" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('address')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="website" >Website:</label>
                            <input  name="website" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('website')}}</span>
                            </div>
                             <div class="form-group">
                            <label for="phone" >Phone:</label>
                            <input name="phone" type="number" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('phone')}}</span>
                            </div>
                                                        
                            <div class="form-group">
                            <label for="contactname" >ContactName:</label>
                            <input name="contactname" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('contactname')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="contactphone" >ContactPhone:</label>
                            <input name="contactphone" type="number" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('contactphone')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="password" >Password:</label>
                            <input name="password" type="password" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('password')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="logo" >Logo:</label>
                            <input name="logo" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('logo')}}</span>
                            </div>
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10"   title="if active or not."  />
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