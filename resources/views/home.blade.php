@include('inc/main')
@include('inc/leftsidebar')
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
           
                   <div class="col-lg-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <a href="{{url('/booking')}}">
                                <div class="white-box analytics-info" style="border-radius: 15px;background-color: #ff7676;">
                                    <h3 class="box-title" style="color: #FFF">BOOKING REQUESTS</h3>
                                    <ul class="list-inline two-part">
                                        <li>
                                            <div id="sparklinedash4"></div>
                                        </li>
                                        <li class="text-right"> <span class="counter text-white">{{ $c_booking }}</span></li>
                                    </ul>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-pending">
                                 <div class="white-box analytics-info" style="border-radius: 15px;background-color: #ffc36d;">
                                    <h3 class="box-title" style="color: #FFF">PENDING REQUESTS</h3>
                                    <ul class="list-inline two-part">
                                        <li>
                                            <div id="sparklinedash"></div>
                                        </li>
                                        <li class="text-right"> <span class="counter text-white">{{$c_pending}}</span></li>
                                    </ul>
                                 </div>
                             </a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-completed">
                                <div class="white-box analytics-info" style="border-radius: 15px;background-color: #3cd0cc;">
                                    <h3 class="box-title" style="color: #FFF">COMPLETED REQUESTS</h3>
                                    <ul class="list-inline two-part">
                                        <li>
                                            <div id="sparklinedash2"></div>
                                        </li>
                                        <li class="text-right"> <span class="counter text-white">{{$c_completed}}</span></li>
                                    </ul>
                                </div>
                            </a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-xs-12"> 
                                <div class="white-box analytics-info" style="border-radius: 15px;">
                                     <h3 class="box-title">myMDLab WALLET</h3>
                                    <ul class="list-inline two-part">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-unpaid"><li class="label label-inverse">Must</li></a>

                                        <li class="text-right text-muted"><span class="counter"> {{ $display_wallet }}</span></li>

                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-paid"><li class="label label-danger">Current</li></a>

                                        <li class="text-right text-danger"><span class="counter"> {{ $display_current }}</span></li>
                                    </ul>
                        </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="white-box" style="border-radius: 15px; ">
                            <h3 class="box-title">Data Summary</h3>
                            <ul class="feeds">
                                <li>
                                    <div class="bg-info"><i class="icon-people text-white"></i></div> You have {{$c_patient}} registered patients. <a href="{{url('/patient')}}"><span class="text-muted">View Now
                                    </span></a></li>
                                <li>
                                    <div class="bg-success"><i class="icon-user-female text-white"></i></div> {{$c_medtech}} medtechs.<a href="{{url('/medtech')}}"><span class="text-muted">View Now</span></a></li>
                                <li>
                                    <div class="bg-warning"><i class="icon-chemistry text-white"></i></div> {{$c_service}} services.<a href="{{url('/service')}}"><span class="text-muted">View Now</span></a></li>
                                
                                <li>
                                    <div class="bg-inverse"><i class="icon-briefcase text-white"></i></div> {{$c_lab}} available medical labs. <a href="{{url('/lab')}}"><span class="text-muted">View Now</span></a></li>
                               
                            </ul>
                        </div>
                    </div>

            </div>

            <div class="row">

               
                
                     

        

            </div>

        
             <div class="row">

                 <div class="col-md-6 col-lg-6 col-sm-6"">
                    <div class="white-box" style="border-radius: 15px;">
                    <div class="panel panel-default" >
                            <div class="panel-heading"> <h1>Medical Lab Earnings</h1> </div>

                    <div class="panel-body">
                                <ul class="nav nav-pills m-b-30 ">
                                    <li class="active"> <a href="#navpills-1" data-toggle="tab" aria-expanded="false">All</a> </li>
                                    <li class=""> <a href="#navpills-2" data-toggle="tab" aria-expanded="false">LC</a> </li>
                                    <li> <a href="#navpills-3" data-toggle="tab" aria-expanded="true">MMG</a> </li>
                                     <li> <a href="#navpills-4" data-toggle="tab" aria-expanded="true">LUDACS</a> </li>
                                </ul>
                                <div class="tab-content br-n pn">
                                    <div id="navpills-1" class="tab-pane active">
                                        <div class="row">
                                            <h1>Total Sales: <span class="label label-inverse">P {{$display_total}}</span></h1>
                                             <div class="inbox-center table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr class="read">
                                                    <td class="hidden-xs">LC Diagnostic Center</td>
                                                    <td class="max-texts"><span class="label label-danger m-r-10">{{$lc_total}}</span> </td>
                                                    
                                                </tr>
                                                 <tr class="read">
                                                    <td class="hidden-xs">Quezon MMG Plaza</td>
                                                    <td class="max-texts"><span class="label label-success m-r-10">{{$mmg_total}}</span> </td>
                                                    
                                                </tr>
                                                 <tr class="read">
                                                    <td class="hidden-xs">LUDACS</td>
                                                    <td class="max-texts"><span class="label label-info m-r-10">{{$ludacs_total}}</span> </td>
                                                    
                                                </tr>
                                               
                                               
                                            </tbody>
                                        </table>
                                    </div>

                                        </div>
                                    </div>
                                    <div id="navpills-2" class="tab-pane">
                                         <div class="row">
                                            <h1>LC Total Sales: <span class="label label-danger">P {{$lc_total}}</span></h1>
                                             <div class="inbox-center table-responsive">
                                        <table id="demo-foo-addrow" class="table table-hover" data-page-size="5">
                                            <tbody style="font-size: 14px;">
                                                @if(count($sortedLC) > 0)
                                                    @foreach($sortedLC as $lc_booking)
                                                <tr class="read">
                                                    <td class="hidden-xs">{{$lc_booking->request_no}}</td>
                                                    <td>{{$lc_booking->patient_name}}</td>
                                                    <td class="max-texts"><span class="label label-danger"> {{$lc_booking->totalfee}}</span></td>
                                                    
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
                                    <div id="navpills-3" class="tab-pane">
                                        <div class="row">
                                            <h1>MMG Total Sales: <span class="label label-success">P {{$mmg_total}}</span></h1>
                                             <div class="inbox-center table-responsive">
                                        <table id="demo-foo-addrow" class="table table-hover" data-page-size="5">
                                            <tbody style="font-size: 14px;">
                                                @if(count($mmg_bookings) > 0)
                                                    @foreach($mmg_bookings->all() as $mmg_booking)
                                                <tr class="read">
                                                    <td class="hidden-xs">{{$mmg_booking->request_no}}</td>
                                                    <td>{{$mmg_booking->patient_name}}</td>
                                                    <td class="max-texts"><span class="label label-danger"> {{$mmg_booking->totalfee}}</span></td>
                                                    
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
                                     <div id="navpills-4" class="tab-pane">
                                        <div class="row">
                                            <h1>LUDACS Total Sales: <span class="label label-info">P {{$ludacs_total}}</span></h1>
                                             <div class="inbox-center table-responsive">
                                        <table id="demo-foo-addrow" class="table table-hover" data-page-size="5">
                                            <tbody style="font-size: 14px;">
                                                @if(count($ludacs_bookings) > 0)
                                                    @foreach($ludacs_bookings->all() as $ludacs_booking)
                                                <tr class="read">
                                                    <td class="hidden-xs">{{$ludacs_booking->request_no}}</td>
                                                    <td>{{$ludacs_booking->patient_name}}</td>
                                                    <td class="max-texts"><span class="label label-danger"> {{$ludacs_booking->totalfee}}</span></td>
                                                    
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
                        </div>
                    </div>
        
                   
              
                </div>

                   
        

                    <div class="col-md-6 col-sm-6 col-lg-6">
                        <div class="white-box" style="border-radius: 15px;">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h1>Customer Reviews</h1></div>
                            <div class="panel-body">
                                 <div class="panel-wrapper p-b-10 collapse in">
                                                <div id="owl-demo" class="owl-carousel owl-theme">
                                                    @foreach($sortedReviews as $review)
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


                 
                
            
                <!-- /.row -->

                





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
                                   
                                    @foreach($completedBooks as $completed)
                                    <tr>
                                        <td>{{$completed->request_no}}</td>
                                        <td>{{$completed->patient_name}}</td>
                                        <td>{{$completed->totalfee}}</td>
                                        <td><span class="label label-table label-warning">{{$completed->status}}</span></td>
                                      
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




<div id="modal-paid" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                            <th>Payment</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                   
                                    @foreach($paid as $paidReq)
                                    <tr>
                                        <td>{{$paidReq->request_no}}</td>
                                        <td>{{$paidReq->patient_name}}</td>
                                        <td>{{$paidReq->totalfee}}</td>
                                        <td><span class="label label-table label-info">{{$paidReq->status}}</span></td>
                                        <td><span class="label label-table label-success">{{$paidReq->payment}}</td>
                                      
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
                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>





<div id="modal-unpaid" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                            <th>Payment</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                   
                                    @foreach($unpaid as $unpaidReq)
                                    <tr>
                                        <td>{{$unpaidReq->request_no}}</td>
                                        <td>{{$unpaidReq->patient_name}}</td>
                                        <td>{{$unpaidReq->totalfee}}</td>
                                        <td><span class="label label-table label-warning">{{$unpaidReq->status}}</span></td>
                                        <td><span class="label label-table label-danger">{{$unpaidReq->payment}}</td>
                                      
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

