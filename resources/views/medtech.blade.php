
@include('inc/main')
@include('inc/leftsidebar')
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
                        <div class="white-box">
                
                            <div class="table-responsive">
                                <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list color-table success-table" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Contact Number</th>
                                                <th>Designation</th>
                                                <th>Time Available</th>
                                               
                                            </tr>
                                        </thead>
                                        <div class="form-inline padding-bottom-15">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-right m-b-20">
                                            <div class="form-group">
                                                <input id="demo-input-search2" type="text" placeholder="Search" class="form-control" autocomplete="off"> </div>
                                        </div>
                                    </div>
                                </div>
                                        <tbody>
                                            @if(count($medtechs)>0)
                                                @foreach($medtechs->all() as $medtech)


                                            
                                            <tr>
                                                <td> {{ $medtech->medtech_name }}</td>
                                                <td> {{ $medtech->medtech_no }}</td>
                                                <td> {{ $medtech->lab_name }}</td>
                                                <td> {{ $medtech->time_avail }}</td>
                                            
                                               
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
                                                    <!-- /.modal-dialog -->
                                                </div>


                                                 <div id="modal-editM" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="exampleModalLabel1">Edit MedTech</h4> </div>
                                                            <div class="modal-body">
                
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="POST" action="{{ url('/editMedtech') }}">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" id="medtech_id" name="medtech_id" />
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" id="medtech_name" name="medtech_name" placeholder="Juan Dela Cruz" required> </div>
                                    
                                        <div class="form-group">
                                            <label for="contact_no">Contact Number</label>
                                            <input type="text" class="form-control" id="medtech_no" name="medtech_no" placeholder="+639" required> </div>

                                        <div class="form-group">
                                            <label for="lab">Lab Designation</label>
                                                <select class="form-control" id="lab_designation" name="lab_designation">
                                                    @foreach($labs->all() as $lab)
                                                                <option value="{{ $lab->lab_id }}">{{ $lab->lab_name }}</option>
                                                    @endforeach
                                                            </select>
                                                        </div>
                                    
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

                                            

                    



                        </div>
                    </div>
                </div>
               
            </div>
            <!-- /.container-fluid -->

        