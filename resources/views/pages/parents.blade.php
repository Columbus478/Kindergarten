@extends('layouts.layout')
@include('layouts.header')
@include('layouts.sidemenu')


@section('title')
Parent
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
                               <h4 class="title">PARENTS.
                                <button type="button" rel="tooltip" title="Add new parent" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#addParent">
                                                    <i class="fa fa-plus"></i>
                                                </button> 
                                                <!-- <div class="form-group">
                            <label for="BirttDate">BirthDate:</label>
                            <div class='input-group date ' id='datetimepicker1'>
                                <input type='text' class="form-control datepicker" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar text-danger">{{$errors->error_message->first('birthdate')}}</span>
                                </span>
                            </div>
                            </div>              -->
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
                                              $('#addParent').modal('show');
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
                  <th>ParentID</th>
                  <th>ParentName</th>
                  <th class="hidden-phone">Address</th>
                  <th class="hidden-phone">Phone</th>
                  <th class="hidden-phone">Email</th>                 
                  <th class="hidden-phone">FacebookID</th>
                  <th class="hidden-phone">SkypeID</th>
                  <th class="hidden-phone">BirthDate</th>
                  <th class="hidden-phone">Status</th>
                  <th class="hidden-phone">LastLogon</th>
                  <th class="hidden-phone">SchoolID</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
                          <?php
            $parents = App\Parents::select()->orderBy('ParentID','desc')->paginate(3);
            $modal =0;
            foreach ($parents as $parent ):    # code...
             //$user = App\user::select()->where('id','=',$comment->id_user)->first();
            ?>
              <tr class="gradeX">
                  <td>{{$parent->ParentID}}</td>
                  <td>{{$parent->ParentName}}</td>
                  <td class="hidden-phone">{{$parent->Address}}</td>
                  <td class="center hidden-phone">{{$parent->Phone}}</td>
                  <td class="center hidden-phone">{{$parent->Email}}</td>
               
                  <td>{{$parent->FacebookId}}</td>
                  <td class="hidden-phone">{{$parent->SkypeId}}</td>
                  <td class="center hidden-phone">{{$parent->BirthDate}}</td>
                  <td class="center hidden-phone">{{$parent->Status}}</td>
                  <td class="center hidden-phone">{{$parent->LastLogon}}</td>
                  <td class="center hidden-phone">{{$parent->SchoolID}}</td>
                  <td> <button type="button" rel="tooltip" title="Edit Parent" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#editParent{{$modal}}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#deleteParent{{$modal}}">
                                                    <i class="fa fa-times"></i>
                                                </button></td>                                               
              </tr>             
              
              <!---                        Edit Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="editParent{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Edit Parent</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('pages/editparent')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                            <label for="parentID" >PrentID:</label>
                            <input name="parentID" rows="5" class="form-control col-md-5" disabled value="{{$parent->ParentID}}" />
                            </div>
                             <div class="form-group">
                            <label for="parentName" >ParentName:</label>
                            <input name="parentName" rows="5" class="form-control col-md-5" value="{{$parent->ParentName}}" />
                            </div>
                             <div class="form-group">
                            <label for="address" >Address:</label>
                            <input name="address" rows="5" class="form-control col-md-5" value="{{$parent->Address}}" />
                            </div>
                             <div class="form-group">
                            <label for="phone" >Phone:</label>
                            <input name="phone" rows="5" class="form-control col-md-5" value="{{$parent->Phone}}" />
                            </div>
                            <div class="form-group">
                            <label for="email" >Email:</label>
                            <input type="email" name="email" rows="5" class="form-control col-md-5" value="{{$parent->Email}}"  />
                            </div>                      
                            
                            <div class="form-group">
                            <label for="facebookd" >FacebookID:</label>
                            <input name="facebookid" rows="5" class="form-control col-md-5" autosave value="{{$parent->FacebookId}}"  />
                            </div>
                            <div class="form-group">
                            <label for="skypeid" >SkypeID:</label>
                            <input name="skypeid" rows="5" class="form-control col-md-5" value="{{$parent->SkypeId}}" />
                            </div>
                            <div class="form-group">
                            <label for="BirttDate">BirthDate:</label>
                            <div class='input-group date ' id='datetimepicker2'>
                                <input type='text' class="form-control  datetimepicker"
                                 data-date-format="DD/MM/YYYY" 
                                name="birthdate" value="{{$parent->BirthDate}}" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            
                            </div>            
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10"   title="if active or not."  value="{{$parent->Status}}" />
                            </div> 
                            <div class="form-group">
                             <label for="lastlogon">LastLogon:</label>
                            <input name="lastlogon" rows="10" class="form-control" value="{{$parent->LastLogon}}" disabled />
                            </div>
                            <div class="form-group">
                             <label for="schoolname">SchoolName:</label>
                            <select name="schoolname" class="form-control" >
                            <option>{{$parent->SchoolID}}</option>
                              <option value="">School A</option>
                              <option value="">School B</option>                              
                            </select>
                            </div>
                            <input type="hidden" name="id_parent" value="{{$parent->ParentID}}" />
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
  <div class="modal fade" tabindex="-1" role="dialog" id ="deleteParent{{$modal}}" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title">Delete Parent </h4>
      </div>
      <div class="modal-body" >
        <h4>Are you sure you want to delete this parent&hellip;??</h4>
        <form action="{{url('pages/deleteparent')}}" method="POST" role="form">
             {{csrf_field()}}                
                <input type="hidden" name='id_parent' class="form-control" value="{{$parent->ParentID}}" >            
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
  <div class="modal fade" tabindex="-1" role="dialog" id="addParent" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Add New Parent</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('pages/parents')}}">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            
                             <div class="form-group">
                            <label for="parentName" >ParentName:</label>
                            <input name="parentName" rows="5" class="form-control col-md-5" />
                            <span class="help-block text-danger">{{$errors->error_message->first('parentName')}}</span>
                            </div>
                             <div class="form-group">
                            <label for="address" >Address:</label>
                            <input name="address" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('address')}}</span>
                            </div>
                             <div class="form-group">
                            <label for="phone" >Phone:</label>
                            <input name="phone" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('phone')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="email" >Email:</label>
                            <input type="email" name="email" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('email')}}</span>
                            </div>                            
                            <div class="form-group">
                            <label for="password" >Password:</label>
                            <input type="password" name="password" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('password')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="facebookURL" >FacebookURL:</label>
                            <input name="facebookid" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('facebookURL')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="skypeid" >SkypeID:</label>
                            <input name="skypeid" rows="5" class="form-control col-md-5"  />
                            <span class="help-block text-danger">{{$errors->error_message->first('skypeid')}}</span>
                            </div>
                            <div class="form-group">
                            <label for="BirttDate">BirthDate:</label>
                            <div class='input-group date ' id='datetimepicker1'>
                                <input type='text' class="form-control datetimepicker" name="birthdate" data-date-format="DD/MM/YYYY" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            <span class="help-block text-danger">{{$errors->error_message->first('birthdate')}}</span>
                            </div>
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10"   title="if active or not."  />
                            </div> 
                            
                            <div class="form-group">
                             <label for="schoolname">SchoolName:</label>
                           <select name="schoolname" class="form-control">
                              <option value="2345">School A</option>
                              <option value="5432">School B</option>                              
                            </select>
                            <span class="help-block text-danger">{{$errors->error_message->first('schoolname')}}</span>
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
  @include('layouts.footer')