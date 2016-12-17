@extends('layouts.layout')
@include('layouts.header')
@include('layouts.sidemenu')
@include('layouts.footer')

@section('title')
Babies
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
                                <h4 class="title">Baby.
                                <button type="button" rel="tooltip" title="Add new Baby" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#addBaby">
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
                  <th>BabyID</th>
                  <th>BabyName</th>
                  <th class="hidden-phone">BabyNickname</th>
                  <th class="hidden-phone">BirhtDate</th>
                  <th class="hidden-phone">Image</th>
                  <th class="hidden-phone">ClassID</th>
                  <th class="hidden-phone">ParentName</th>
                  <th class="hidden-phone">Hobby</th>
                  <th class="hidden-phone">Strength</th>
                  <th class="hidden-phone">Weakness</th>
                  <th class="hidden-phone">Status</th>
                  <th class="hidden-phone">SearchCode</th>
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
                   <td class="hidden-phone">Win 95+</td>
                  <td class="center hidden-phone">4</td>
                  <td class="center hidden-phone">X</td>
                   <td class="hidden-phone">Win 95+</td>
                  <td class="center hidden-phone">4</td>
                  <td class="center hidden-phone">X</td>
                  <td class="hidden-phone">Win 95+</td>                  
                  <td><button type="button" rel="tooltip" title="Edit Baby" class="btn btn-info btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#editBaby">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Trash" class="btn btn-danger btn-simple btn-xs"
                                                 data-toggle='modal' 
                                                 data-target ="#deleteBaby">
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
  <div class="modal fade" tabindex="-1" role="dialog" id="addBaby" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Add New Baby</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('user/editcomment')}}">
                            <div class="form-group">
                            <label for="babyName" >BabyName:</label>
                            <input name="babyName" rows="5" class="form-control col-md-5"  placeholder="Enter Baby's Name.." />
                            </div>
                             <div class="form-group">
                            <label for="babyNickname" >BabyNickname:</label>
                            <input name="babyNickname" rows="5" class="form-control col-md-5"  placeholder="Enter baby's nickname" />
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
                             <label for="image">Add Image:</label>
                             <label class="btn btn-primary btn-file">
                              Browse <input type="file" style="display: none;">
                                </label>                  
                            </div>
                             <div class="form-group">
                             <label for="classname">ClassName:</label>
                             <select name="classname" class="form-control">
                              <option value="">Class A</option>
                              <option value="">Class B</option>                              
                            </select>
                            
                            <div class="form-group">
                             <label for="parentname">parentName:</label>
                            <select name="parentname" class="form-control">
                              <option value="">Parent A</option>
                              <option value="">Parent B</option>                              
                            </select>
                            </div>
                            <div class="form-group">
                             <label for="hobby">Hobby:</label>
                            <input name="hobby" rows="10" class="form-control"  placeholder="Enter hobby..." />
                            </div>
                            <div class="form-group">
                             <label for="strenght">Strenght:</label>
                            <input name="strenght" rows="10" class="form-control"  placeholder="Enter strenght..." />
                            </div>
                            <div class="form-group">
                             <label for="weakness">Weakness:</label>
                            <input name="weakness" rows="10" class="form-control"  placeholder="Enter classID..." />
                            </div>
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10"  title="if active or not." />
                            </div>
                            <div class="form-group">
                             <label for="searchcode">SearchCode:</label>
                            <input name="searchcode" rows="10" class="form-control"  placeholder="Enter searchcode..." />
                            </div>

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
  <div class="modal fade" tabindex="-1" role="dialog" id="editBaby" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4  id='myModalLabel' class="modal-title">Edit Baby</h4>
      </div>
      <div class="modal-body">
                        <form method="post" action="{{url('user/editcomment')}}">
                          <!--   {{csrf_field()}} -->
                             <div class="form-group">
                            <label for="babyID" >BabyID:</label>
                            <input name="babyID" rows="5" class="form-control col-md-5" disabled />
                            </div>
                             <div class="form-group">
                            <label for="babyName" >BabyName:</label>
                            <input name="babyName" rows="5" class="form-control col-md-5" />
                            </div>
                             <div class="form-group">
                            <label for="babyNickname" >BabyNickname:</label>
                            <input name="babyNickname" rows="5" class="form-control col-md-5"  />
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
                             <label for="image">Change Image:</label>
                             <label class="btn btn-primary btn-file">
                              Browse <input type="file" style="display: none;">
                                </label>                  
                            </div>
                             <div class="form-group">
                             <label for="classID">ClassID:</label>
                            <input name="classID" rows="10" class="form-control"  />
                            </div>
                            <div class="form-group">
                             <label for="parentname">parentName:</label>
                           <select name="parentname" class="form-control">
                              <option value="">Parent A</option>
                              <option value="">Parent B</option>                              
                            </select>
                            </div>
                            <div class="form-group">
                             <label for="hobby">Hobby:</label>
                            <input name="hobby" rows="10" class="form-control"  />
                            </div>
                            <div class="form-group">
                             <label for="strenght">Strenght:</label>
                            <input name="strenght" rows="10" class="form-control"  />
                            </div>
                            <div class="form-group">
                             <label for="weakness">Weakness:</label>
                            <input name="weakness" rows="10" class="form-control"  />
                            </div>
                            <div class="form-group">
                             <label for="status">Active:</label>
                            <input type="checkbox" name="status" rows="10"   title="if active or not."  />
                            </div>
                            <div class="form-group">
                             <label for="searchcode">SearchCode:</label>
                            <input name="searchcode" rows="10" class="form-control"  />
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
  <div class="modal fade" tabindex="-1" role="dialog" id ="deleteBaby" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role='document'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id='myModalLabel' class="modal-title">Delete Baby </h4>
      </div>
      <div class="modal-body" >
        <h4>Are you sure you want to delete this baby&hellip;??</h4>
        <form action="{{url('user/deletecomment')}}" method="POST" role="form">
         <!--     {{csrf_field()}}     -->            
              <!--   <input type="hidden" name='id_comment' class="form-control" value="" > -->            
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