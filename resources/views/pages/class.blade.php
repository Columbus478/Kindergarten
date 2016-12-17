@extends('layouts.layout')
@include('layouts.header')
@include('layouts.sidemenu')
@include('layouts.footer')

@section('title')
Class
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
                               <h4 class="title">CLASSES.
                               <button type="button" rel="tooltip" title="Add new Baby" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#addClass">
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
                        @if(!empty(Session::get('error_code')) && Session::get('error_code') == 2)
                                          <script>
                                          $(function() {
                                              $('#addClass').modal('show');
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
                  <th>ClassID</th>
                  <th>ClassName</th>
                  <th class="hidden-phone">Description</th>
                  <th class="hidden-phone">LinkIPCam</th>
                  <th class="hidden-phone">School</th>
                  <th class="hidden-phone">Status</th>
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
                  <td class="center hidden-phone">X</td>
                  <td align="center"> <button type="button" rel="tooltip" title="Edit Baby" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#editClass">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#deleteClass">
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
  <div class="modal fade" tabindex="-1" role="dialog" id="addClass" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Add New Class</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('user/editcomment')}}">
                            <!-- {{csrf_field()}} -->
                            <div class="form-group">
                             <label for="className">ClassName:</label>
                            <input name="classname" rows="10" class="form-control"  placeholder="Enter class name.." />
                            </div>
                             <div class="form-group">
                             <label for="description">Description:</label>
                            <textarea name="description" rows="10" class="form-control" placeholder="Description.."></textarea>
                            </div>
                            <div class="form-group">
                             <label for="linkipcam">LinkIPCam:</label>
                            <input name="linkipcam" rows="10" class="form-control"  placeholder="Enter link IP Cam..." />
                            </div>
                            <div class="form-group">
                             <label for="school">School:</label>
                            <input name="school" rows="10" class="form-control"  placeholder="Enter school..." />
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


<!---                        Edit Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="editClass" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Edit Class</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('user/editcomment')}}">
                           <!--  {{csrf_field()}} -->
                            <div class="form-group">
                            <label for="classID" >ClassID:</label>
                            <input name="classID" rows="5" class="form-control col-md-5"  disabled />
                            </div>
                             <div class="form-group">
                             <label for="className">ClassName:</label>
                            <input name="classname" rows="10" class="form-control"   />
                            </div>
                             <div class="form-group">
                             <label for="description">Description:</label>
                            <textarea name="description" rows="10" class="form-control" ></textarea>
                            </div>
                            <div class="form-group">
                             <label for="linkipcam">LinkIPCam:</label>
                            <input name="linkipcam" rows="10" class="form-control"  />
                            </div>
                            <div class="form-group">
                             <label for="school">School:</label>
                            <input name="school" rows="10" class="form-control"   />
                            </div>
                             <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10"  title="if active or not." />
                            </div>
                            <input type="hidden" name="id_comment" value="" />
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
  <div class="modal fade" tabindex="-1" role="dialog" id ="deleteClass" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title">Delete Class </h4>
      </div>
      <div class="modal-body" >
        <h4>Are you sure you want to delete this class&hellip;??</h4>
        <form action="{{url('user/deletecomment')}}" method="POST" role="form">
            <!--  {{csrf_field()}}   -->              
                <input type="hidden" name='id_comment' class="form-control" value="" >            
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


  @stop