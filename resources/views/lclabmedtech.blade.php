
@include('inc/main')
@include('inc/lcleftsidebar')
@include('inc/rightsidebar')
@include('inc/footer')


   <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper" style="font-size: 14px">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                         <h4 class="page-title">
                                    <span href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></span>
                            </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0)">MedTechs</a></li>
                            <li class="active">myMDLab</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                  <div class="row">
                    <div class="col-md-12">
                        <div class="white-box" style="border-radius: 15px;">
                            <h1>Medical Technologists </h1> 
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                      <div class="col-sm-4 col-sm 12">
                        <div class="white-box" style="border-radius: 15px;">
                            <form method="POST" action="{{ url('/addLCMedtech') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" id="medtech_id" name="medtech_id" />
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" id="medtech_name" name="medtech_name" placeholder="Enter Full Name" required> </div>
                                    
                                        <div class="form-group">
                                            <label for="contact_no">Contact Number</label>
                                            <input type="text" class="form-control" id="medtech_no" name="medtech_no" placeholder="Enter Contact Number" required> </div>
                                    
                                        <div class="form-group">
                                            <label for="time_avail">Time Available</label>
                                                <select class="form-control" id="time_avail" name="time_avail">
                                                                <option value="8:00 - 9:00">8:00 - 9:00</option>
                                                                <option value="9:00 - 10:00">9:00 - 10:00</option>
                                                                <option value="10:00 - 11:00">10:00 - 11:00</option>
                                                                <option value="11:00 - 12:00">11:00 - 12:00</option>
                                                                <option value="1:00 - 2:00">1:00 - 2:00</option>
                                                                <option value="2:00 - 3:00">2:00 - 3:00</option>
                                                                <option value="3:00 - 4:00">3:00 - 4:00</option>
                                                            </select> 
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default waves-effect waves-light m-r-10">Add Medtech</button>
                                        
                                    </form>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-12">
                          
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box" style="border-radius: 15px;">
                            <h3>Total Medtechs: <span class="label label-success m-r-10">{{$c_lcmed}}</span></h3>
                                <div class="text-right">
                           
                            <input type="text" placeholder="Search..." class="light-table-filter" data-table="order-table" style="border-width: 1px;border-radius: 10px; padding-left: 10px; height: 30px;">
                           
                              </div>

                                  <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table table-hover manage-u-table order-table" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Contact Number</th>
                                                <th>Assignment</th>
                                                <th>Time Available</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                           @if(count($sortedLCmed)>0)
                                                @foreach($sortedLCmed as $lc_medtech)
                                            <tr>
                                                <td> {{ $lc_medtech->medtech_name }}</td>
                                                <td> {{ $lc_medtech->medtech_no }}</td>
                                                <td> {{ $lc_medtech->assignment }}</td>
                                                <td> {{ $lc_medtech->time_avail }}</td>
                                            
                                                <td>

                                                     <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" data-toggle="modal" data-target="#modal-editLCM"
                                                    data-mtid="{{ $lc_medtech->medtech_id }}"
                                                    data-mtname="{{ $lc_medtech->medtech_name }}"
                                                    data-mtno="{{ $lc_medtech->medtech_no }}"
                                                    data-mtlab="{{ $lc_medtech->lab_designation }}"
                                                    data-mttime="{{ $lc_medtech->time_avail }}"><i class="ti-pencil-alt"></i></button>
                                                    
                                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" data-toggle="modal" data-target="#modal-delete" data-mid="{{$lc_medtech->medtech_id}}"><i class="ti-trash"></i></button>

                                                  
                    

                                                </td>
                                            </tr>
                                                @endforeach
                                            @endif
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            
                                                     <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                
                                     
                                               
                                                            
                                                           
                        </div>
                    </div>
                                             
                </div>

                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>


                                                
                                            

                    



                        </div>
                    </div>
                </div>
               
            </div>
            <!-- /.container-fluid -->

 <div id="modal-editLCM" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="exampleModalLabel1">Edit MedTech</h4> </div>
                                                            <div class="modal-body">
                
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="POST" action="{{ url('/editLCMedtech') }}">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" id="medtech_id" name="medtech_id" />
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" id="medtech_name" name="medtech_name" placeholder="Juan Dela Cruz" required> </div>
                                    
                                        <div class="form-group">
                                            <label for="contact_no">Contact Number</label>
                                            <input type="text" class="form-control" id="medtech_no" name="medtech_no" placeholder="+639" required> </div>

                                    
                                        <div class="form-group">
                                            <label for="time_avail">Time Available</label>
                                                <select class="form-control" id="time_avail" name="time_avail">
                                                                <option value="8:00 - 9:00">8:00 - 9:00</option>
                                                                <option value="9:00 - 10:00">9:00 - 10:00</option>
                                                                <option value="10:00 - 11:00">10:00 - 11:00</option>
                                                                <option value="11:00 - 12:00">11:00 - 12:00</option>
                                                                <option value="1:00 - 2:00">1:00 - 2:00</option>
                                                                <option value="2:00 - 3:00">2:00 - 3:00</option>
                                                                <option value="3:00 - 4:00">3:00 - 4:00</option>
                                                            </select> 
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
 </div>
</div>

<div id="modal-delete" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                         
                                      <form action='{{url("/deleteLCMedtech")}}' method="POST">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <input type="hidden" id="medtech_id" name="medtech_id" value=""/>
                                            <h4 class="modal-title" id="mySmallModalLabel">Are you sure you want to delete this record?</h4>

                                           
                                        </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger waves-effect waves-light">Yes</button>
                                        </div>
                                    </form>
                                    </div>


                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
