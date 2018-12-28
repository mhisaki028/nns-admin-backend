
@include('inc/main')
@include('inc/leftsidebar')
@include('inc/rightsidebar')
@include('inc/footer')



<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper" style="font-size: 14px;">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">
                    <span href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></span>
                </h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                
                <ol class="breadcrumb">
                    <li><a href="javascript:void(0)">Booking Requests</a></li>
                    <li class="active">myMDLab</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-md-12">
                    <div class="white-box" style="border-radius: 15px;">
                        <h1>Booking Requests</h1>
                    </div>
                </div>
        </div>
                 
       
        <div class="row">

            <div class="col-md-12">
                <div class="white-box" style="border-radius: 15px;">
                  
                        <h3>Total Booking Requests: <span class="label label-success m-r-10">{{ $c_booking }}</span></h3>

                         <h5>
                            Pending: <span class="label label-inverse">{{ $c_pending }}</span> 
                            Confirmed: <span class="label label-inverse">{{ $c_conf }}</span> 
                            Cancelled: <span class="label label-inverse">{{ $c_cancel }}</span> 
                            Processing:  <span class="label label-inverse">{{ $c_processing }}</span>
                            Delivered:  <span class="label label-inverse">{{ $c_delivered }}</span> 
                            Completed:  <span class="label label-inverse">{{ $c_completed }}</span>
                        </h5>
                         
                          
                             <div class="text-right">
                           
                            <input type="text" placeholder="Search..." class="light-table-filter" data-table="order-table" style="border-width: 1px;border-radius: 10px; padding-left: 10px; height: 30px;">
                            <select type="search" class="select-table-filter" data-table="order-table" style="border-width: 1px;border-radius: 10px; padding-left: 10px; height: 30px;">
                                    <option value="">All</option> 
                                    <option value="PENDING">PENDING</option>
                                    <option value="CONFIRMED">CONFIRMED</option> 
                                    <option value="CANCELLED">CANCELLED</option> 
                                    <option value="PROCESSING">PROCESSING</option>  
                                    <option value="DELIVERED">DELIVERED</option>
                                    <option value="COMPLETED">COMPLETED</option>
                                   
                                
                                  </select>
                              </div>


                                  <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table table-hover manage-u-table order-table" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>Request No.</th>
                                                <th>Patient Name</th>
                                                <th>Total Fee</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                                <th>Laboratory</th>
                                                <th>Assigned Medtech</th>
                                                <th>Show Invoice</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if(count($sortedBookings)>0)
                                                @foreach($sortedBookings as $booking)
                                            <tr>
                                                <td>{{$booking->request_no}}</td>
                                                <td>{{$booking->patient_name}}</td>
                                                <td>{{$booking->totalfee}}</td>

                                                
                                                <td><span class="status">{{$booking->status}}</span></td>
                                              
                                                <td><span class="pay">{{$booking->payment}}</span></td>
                                                <script>
                                                 $('.pay').each(function() {
                                                     if ($(this).text() == 'PAID') {
                                                        $(this).addClass('label label-success');
                                                    }
                                                    else if ($(this).text() == 'UNPAID') {
                                                     $(this).addClass('label label-danger');
                                                    }
                                                    }); 
                                                </script>

                                                <td>{{$booking->lab}}</td>
                                                 <script>
                                                   
                                                </script>
                                                <td>{{$booking->medtech}}</td>
                                                <td>
                                                    @if($booking->status == 'COMPLETED')
                                                    <a href='{{ url("/invoice/{$booking->id}") }}'><button class="btn btn-default">Invoice</button></a>
                                                    @endif
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
                </div>                                            
           
            <div id="modal-view" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="border-radius: 20px;">
                <div class="modal-dialog">
                     <div class="modal-content">
                        <div class="white-box">


                            
                        </div>

                    </div>
                </div>
            </div>
                   
   
          
    
    
       