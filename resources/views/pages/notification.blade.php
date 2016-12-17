@extends('layouts.layout')
@include('layouts.header')
@include('layouts.sidemenu')


@section('title')
Notification
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
                              <h4 class="title">NOTIFICATIONS
                                <button type="button" rel="tooltip" title="Add new Notification" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#addNotification">
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
                  <th>NotificationID</th>
                  <th>Title</th>
                  <th class="hidden-phone">Detail</th>
                  <th class="hidden-phone">NotificationTimeDate</th>
                  <th class="hidden-phone">Status</th>
                  <th class="hidden-phone">ParentID</th>
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
                  <td><button type="button" rel="tooltip" title="Edit Baby" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#editNotification">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#deleteNotification">
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
  <div class="modal fade" tabindex="-1" role="dialog" id="addNotification" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Add New Notification</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('user/editcomment')}}">
                        <!--     {{csrf_field()}} -->  
                            <div class="form-group">
                             <label for="title">Title:</label>
                            <input name="title" rows="10" class="form-control"  placeholder="Enter Title..." />
                            </div>
                            <div class="form-group">
                             <label for="detail">Detail:</label>
                            <textarea name="detail" rows="10" class="form-control" ></textarea>
                            </div>
                            <div class="form-group">
                             <label for="notificationdatetime">NotificationDateTime:</label>
                            <input type="date" name="notificationdatetime" />
                            </div>                    
                                                   
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10"  title="if active or not." />
                            </div>
                            <div class="form-group">
                             <label for="parentname">ParentName:</label>
                           <select name="parentname" class="form-control">
                              <option value="">Parent A</option>
                              <option value="">Parent B</option>                              
                            </select>
                            </div>
                             <div class="form-group">
                             <label for="read">Read:</label>
                            <input type="checkbox" name="read" rows="10"  title="if read or not." />
                            </div>
                          <!--   <input type="hidden" name="id_comment" value="" /> -->
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
  <div class="modal fade" tabindex="-1" role="dialog" id="editNotification" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Edit Notification</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('user/editcomment')}}">
                          <!--   {{csrf_field()}} -->
                           <div class="form-group">
                            <label for="notificationID" >NotificationID:</label>
                            <input name="notificationID" rows="5" class="form-control col-md-5"  disabled />
                            </div>                                                  
                            
                            <div class="form-group">
                             <label for="title">Title:</label>
                            <input name="title" rows="10" class="form-control"  />
                            </div>
                            <div class="form-group">
                             <label for="detail">Detail:</label>
                            <textarea name="detail" rows="10" class="form-control" ></textarea>
                            </div>
                            <div class="form-group">
                             <label for="notificationdatetime">NotificationDateTime:</label>
                            <input type="date" name="notificationdatetime" />
                            </div>                    
                                                   
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10"  title="if active or not." />
                            </div>
                            <div class="form-group">
                             <label for="parentname">ParentName:</label>
                            <select name="parentname" class="form-control">
                              <option value="">Parent A</option>
                              <option value="">Parent B</option>                              
                            </select>
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
  <div class="modal fade" tabindex="-1" role="dialog" id ="deleteNotification" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title">Delete Notification </h4>
      </div>
      <div class="modal-body" >
        <h4>Are you sure you want to delete this Notification&hellip;??</h4>
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