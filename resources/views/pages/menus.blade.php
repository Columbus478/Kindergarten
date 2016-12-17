@extends('layouts.layout')
@include('layouts.header')
@include('layouts.sidemenu')
@include('layouts.footer')

@section('title')
Menus
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
                                <h4 class="title">MENUS.
                                <button type="button" rel="tooltip" title="Add new Menus" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#addMenus">
                                                    <i class="fa fa-plus"></i>
                                                </button>                    
                                         <div class="col-sm-10">
                                        <button id="chart" type="button" rel="tooltip" title="Menus Pie-chart" class="btn btn-info btn-simple btn-xs"  data-toggle='modal' 
                                                 data-target ="#menus-chart"><i class="fa fa-pie-chart" aria-hidden="true"></i>Menus chart</button>
                                    </div>
                                                </h4>
                                           

                                <div class="row">
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
                  <th>MenuID</th>
                  <th>MenuDate</th>
                  <th >Breakfast</th>
                  <th>BreakfastSub</th>
                  <th>Lunch</th>
                  <th >Afternoon</th>
                  <th>Status</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              <tr class="gradeX">
                  <td>Trident</td>
                  <td>Internet
                      Explorer 4.0</td>
                  <td >Win 95+</td>
                  <td >4</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td><button type="button" rel="tooltip" title="Edit Baby" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#editMenus">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#deleteMenus">
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

    <!-- Right Slidebar end -->
<!---                        Add Modal-->
  <div class="modal fade" tabindex="-1" role="dialog" id="addMenus" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Add New Menu</h4>
      </div>
      <div class="modal-body">
                        <form method="POST" action="{{url('pages/menus')}}">
                            {{csrf_field()}}                                                                                   
                            <div class="form-group">
                             <label for="menuDate">MenuDate:</label>
                            <input type="date" name="menuDate" rows="10" class="form-control" />
                            </div>
                            <div class="form-group">
                             <label for="breakfast">Breakfast:</label>
                            <input name="breakfast" rows="10" class="form-control"  placeholder="Enter breakfast..." />
                            </div>
                             <div class="form-group">
                             <label for="breakfastsub">BreakfastSub:</label>
                            <input name="breakfastsub" rows="10" class="form-control"  placeholder="Enter breakfastsub..." />
                            </div>
                             <div class="form-group">
                             <label for="lunch">Lunch:</label>
                            <input name="lunch" rows="10" class="form-control"  placeholder="Enter lunch..." />
                            </div>
                             <div class="form-group">
                             <label for="afternoon">Afternoon:</label>
                            <input name="afternoon" rows="10" class="form-control"  placeholder="Enter afternoon..." />
                            </div>
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10"  title="if active or not." />
                            </div>
                          <input type="hidden" name="id_comment" value="" /> -->
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
  <div class="modal fade" tabindex="-1" role="dialog" id="editMenus" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Edit Menu</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('user/editcomment')}}">
                           <!--  {{csrf_field()}} -->
                            <div class="form-group">
                            <label for="menuID" >MenuID:</label>
                            <input name="menuID" rows="5" class="form-control col-md-5" disabled />
                           </div>                                                        
                            <div class="form-group">
                             <label for="menuDate">MenuDate:</label>
                            <input type="date" name="menuDate" rows="10" class="form-control" />
                            </div>
                            <div class="form-group">
                             <label for="breakfast">Breakfast:</label>
                            <input name="breakfast" rows="10" class="form-control"  />
                            </div>
                             <div class="form-group">
                             <label for="breakfastsub">BreakfastSub:</label>
                            <input name="breakfastsub" rows="10" class="form-control"   />
                            </div>
                             <div class="form-group">
                             <label for="lunch">Lunch:</label>
                            <input name="lunch" rows="10" class="form-control"   />
                            </div>
                             <div class="form-group">
                             <label for="afternoon">Afternoon:</label>
                            <input name="afternoon" rows="10" class="form-control"  />
                            </div>
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10"  title="if active or not." />
                            </div>
                          <!--   <input type="hidden" name="id_comment" value="" /> -->
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
  <div class="modal fade" tabindex="-1" role="dialog" id ="deleteMenus" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title">Delete Menu </h4>
      </div>
      <div class="modal-body" >
        <h4>Are you sure you want to delete this menu&hellip;??</h4>
        <form action="{{url('user/deletecomment')}}" method="POST" role="form">
             <!-- {{csrf_field()}}                
                <input type="hidden" name='id_comment' class="form-control" value="{" > -->            
                 <button type="submit" class="btn btn-danger" >Delete</button>
                  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  
  <!-- Menus Chart -->
<div class="modal fade" tabindex="-1" role="dialog" id ="menus-chart" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title">Menus Chart </h4>
      </div>
      <div class="modal-body" >
      
                          <!-- <section class="panel">
                              <header class="panel-heading">
                                  Pie
                              </header>
                              <div class="panel-body text-center">
                                  <canvas id="pie" height="300" width="400"></canvas>
                              </div>
                          </section> -->
                     
      <div class="">
       <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
      <i><p>This helps you to see a chart detail of the kindergarten's menus </p></i>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!--  <canvas id="canvas" onload="pieFunction()" height="450" width="570" style="background-color: #ccc"></canvas> -->
<div class="col-lg-6">
                          <section class="panel">
                              <header class="panel-heading">
                                  Pie
                              </header>
                              <div class="panel-body text-center">
                             
                                  <canvas id="pie" height="300" width="400"></canvas>
                              </div>
                          </section>
                      </div> 

  @stop