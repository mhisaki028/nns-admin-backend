@include('inc/main')
@include('inc/lcleftsidebar')
@include('inc/rightsidebar')
@include('inc/footer')


<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">


                <h4 class="page-title">
                    <span href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></span>
                </h4>

            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
               
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="active">myMDLab</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                    
                        <div class="white-box" style="border-radius: 15px;">
                            <h1>{{ $lc->lab_name }}</h1>
                            <h4>{{ $lc->lab_desc }}</h4> 
                            <h4 class="box-title">{{ $lc->lab_loc }}</h4>
                        </div>
                   
                </div>

            </div>

        
            <div class="row">
                
                       <a href="javascript:void()"data-toggle="modal" data-target="#modal-pending"><div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="white-box analytics-info" style="border-radius: 15px;background-color: #ff7676;">
                            <h3 class="box-title" style="color: #FFF">PENDING REQUESTS</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right"><span class="counter text-white">{{ $c_pending }}</span></li>
                            </ul>
                        </div>


                            </div>
                        </a>


                            <a href="javascript:void()"data-toggle="modal" data-target="#modal-processing"><div class="col-lg-3 col-sm-6 col-xs-12">
                               <div class="white-box analytics-info" style="border-radius: 15px;background-color: #313131;">
                            <h3 class="box-title" style="color: #FFF">PROCESSING REQUESTS</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right"><span class="counter text-white">{{ $c_processing }}</span></li>
                            </ul>
                        </div>

                            </div>
                        </a>
                    

                      <a href="javascript:void()"data-toggle="modal" data-target="#modal-delivered"><div class="col-lg-3 col-sm-6 col-xs-12">
                                  <div class="white-box analytics-info" style="border-radius: 15px;background-color: #41b3f9;">
                            <h3 class="box-title" style="color: #FFF">DELIVERED REQUESTS</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><span class="counter text-white">{{ $c_delivered }}</span></li>
                            </ul>
                        </div>

                            </div>
                        </a>

                    
                    
                       <a href="javascript:void()"data-toggle="modal" data-target="#modal-completed"><div class="col-lg-3 col-sm-6 col-xs-12">
                               <div class="white-box analytics-info" style="border-radius: 15px;background-color: #3cd0cc;">
                            <h3 class="box-title" style="color: #FFF">COMPLETED REQUESTS</h3>
                            <ul class="list-inline two-part" style="color: #FFF">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><span class="counter text-white">{{ $c_completed }}</span></li>
                            </ul>
                        </div>

                            </div>
                        </a>


            </div>

        
             <div class="row">

                 <div class="col-lg-6 col-sm-12 col-xs-12">
                    <div class="white-box">
                            <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                                <select type="search" class="select-table-filter" data-table="order-table" style="border-width: 1px;border-radius: 10px; padding-left: 10px; height: 30px;">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                   
                                
                                  </select>
                               
                            </div>
                            <h3 class="box-title">Sales Report</h3>
                            <div class="row sales-report">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <p>Total Sales</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 ">
                                    <h1 class="text-right text-info m-t-20">P {{$lcsales}}</h1> </div>
                            </div>
                            <div class="table-responsive">
                                <table id="demo-foo-pagination" class="table m-b-0 toggle-arrow-tiny order-table" data-page-size="7" >
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Patient</th>
                                            <th>Date</th>
                                            <th>Total Fee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($lc_bookings as $lc_booking)
                                        <tr>
                                         
                                            <td class="txt-oflo">{{$lc_booking->request_no}}</td>
                                            <td class="txt-oflo">{{$lc_booking->patient_name}}</td>
                                            <td>{{$lc_booking->date}}</td>
                                            <td><span class="text-inverse">{{$lc_booking->totalfee}}</span></td>
                                        </tr>
                                        @endforeach
                                     
                                    </tbody>
                                       <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-right">
                                                <ul class="pagination pagination-split m-t-30"> </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                                </table>
                            </div>
                        </div>

                       
                        </div>

                        <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box" style="border-radius: 15px;">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h1>Customer Reviews</h1></div>
                            <div class="panel-body">
                                 <div class="panel-wrapper p-b-10 collapse in">
                                                <div id="owl-demo" class="owl-carousel owl-theme">
                                                    @foreach($sortedlcrev as $review)
                                                    <div class="item">
                                                        <div class="comment-center p-t-10">
                                                            <div class="comment-body">
                                                    
                                                                 <div class="mail-contnet">
                                                                    <h5>{{$review['patient_name']}}</h5>
                                                                    <span class="time">{{$review['txtTime']}}   {{$review['txtDay']}}</span>
                                                                    <span class="label label-rouded label-success">{{$review['rating']}} {{$review['stars']}}</span>
                                                                    <br/>
                                                                    <span class="mail-desc">{{$review['txtBody']}}</span> 
                                                                </div>
                                                            </div>
                                                         </div>
                                                    </div>
                                                    @endforeach
                                                   
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
</div>
    <!-- /.container-fluid -->
<div id="modal-pending" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                              <table id="demo-foo-pagination" class="table m-b-0 toggle-arrow-tiny" data-page-size="7">
                          
                                <thead>
                                        <tr>
                                            <th>Request No.</th>
                                            <th>Patient</th>
                                            <th>Total Fee</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                   
                                    @foreach($pendingBooks as $pending)
                                    <tr>
                                        <td>{{$pending->request_no}}</td>
                                        <td>{{$pending->patient_name}}</td>
                                        <td>{{$pending->totalfee}}</td>
                                        <td><span class="label label-table label-warning">{{$pending->status}}</span></td>
                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-right">
                                                <ul class="pagination pagination-split m-t-30"> </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


    <div id="modal-processing" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                              <table id="demo-foo-pagination" class="table m-b-0 toggle-arrow-tiny" data-page-size="7">
                          
                                <thead>
                                        <tr>
                                            <th>Request No.</th>
                                            <th>Patient</th>
                                            <th>Total Fee</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                   
                                    @foreach($processingBooks as $process)
                                    <tr>
                                        <td>{{$process->request_no}}</td>
                                        <td>{{$process->patient_name}}</td>
                                        <td>{{$process->totalfee}}</td>
                                        <td><span class="label label-table label-inverse">{{$process->status}}</span></td>
                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-right">
                                                <ul class="pagination pagination-split m-t-30"> </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-inverse waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>


 <div id="modal-delivered" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                              <table id="demo-foo-pagination" class="table m-b-0 toggle-arrow-tiny" data-page-size="7">
                          
                                <thead>
                                        <tr>
                                            <th>Request No.</th>
                                            <th>Patient</th>
                                            <th>Total Fee</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                   
                                    @foreach($deliveredBooks as $deliver)
                                    <tr>
                                        <td>{{$deliver->request_no}}</td>
                                        <td>{{$deliver->patient_name}}</td>
                                        <td>{{$deliver->totalfee}}</td>
                                        <td><span class="label label-table label-info">{{$deliver->status}}</span></td>
                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-right">
                                                <ul class="pagination pagination-split m-t-30"> </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>




<div id="modal-completed" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                              <table id="demo-foo-pagination" class="table m-b-0 toggle-arrow-tiny" data-page-size="7">
                          
                                <thead>
                                        <tr>
                                            <th>Request No.</th>
                                            <th>Patient</th>
                                            <th>Total Fee</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                   
                                    @foreach($completedBooks as $complete)
                                    <tr>
                                        <td>{{$complete->request_no}}</td>
                                        <td>{{$complete->patient_name}}</td>
                                        <td>{{$complete->totalfee}}</td>
                                        <td><span class="label label-table label-success">{{$complete->status}}</span></td>
                                      
                                    </tr>
                                    @endforeach
                                
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-right">
                                                <ul class="pagination pagination-split m-t-30"> </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>