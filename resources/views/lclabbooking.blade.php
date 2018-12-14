
@include('inc/main')
@include('inc/lcleftsidebar')
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
            <div class="col-sm-4 col-sm-12">
                    <div class="white-box" style="border-radius: 15px;">
                         <form method="POST" action="{{ url('/addLCBooking') }}" class="no-bg-addmon">
                                        {{ csrf_field() }}
                                      
                                                    <div class="form-group">
                                                        
                                                            <input type="hidden" id="booking_id" name="booking_id" />
                                                    
                                                            <input type="text" class="form-control" placeholder="Enter Patient Name" id="name" name="name" required> 
                                                    </div>
                                              
                                            
                                
                                                    <div class="form-group">
                                                    
                                                   
                                                            <select class="form-control" id="time" name="time">
                                                                  <option value="8:00 - 9:00">8:00 - 9:00</option>
                                                                <option value="9:00 - 10:00">9:00 - 10:00</option>
                                                                <option value="10:00 - 11:00">10:00 - 11:00</option>
                                                                <option value="11:00 - 12:00">11:00 - 12:00</option>
                                                                <option value="1:00 - 2:00">1:00 - 2:00</option>
                                                                <option value="2:00 - 3:00">2:00 - 3:00</option>
                                                                <option value="3:00 - 4:00">3:00 - 4:00</option>
                                                            </select> <span class="help-block"> Pick your time. </span>
                                                    </div>

                                                     <div class="form-group">
                                                    
                                                   
                                                            <input type="text" class="form-control" placeholder="Enter Date (dd/mm/yyyy)" id="date" name="date" required> 
                                                    </div>
           
                                              
                                                   
                                               
                                                    <div class="form-group">
                                                    
                                                            <select class="form-control" onchange="selectFunction(event)" id="labtest" name="labtest">
                                                                @foreach($services->all() as $service)
                                                                <option 
                                                                data-typeid="{{ $service->service_price }}" 
                                                                value="{{ $service->service_name}}">
                                                                {{ $service->service_name }}</option>
                                                                @endforeach
                                                            </select> <span class="help-block"> Select your Lab Test. </span> 

                                                    </div>
                                            
                                        
                                                    <div class="form-group">
                                                    
                                                

                                                     
                                        <script>
                                            function selectFunction(e) {
                                              var add = 150;
                                              var type_id = $('select option:selected').map(function() {
                                                  return $(this).attr('data-typeid');
                                                })
                                                .get().map(parseFloat).reduce(function(a, b) {
                                                  return a + b
                                                });
                                              console.log(type_id)
                                              $("#totalfee").val((type_id + add).toFixed(2 ));
                                            }
                                        </script>

                                                            <input type="text" class="form-control" id="totalfee" name="totalfee" placeholder="Total Fee" />
                                                            <span class="help-block">medtech fee: <b>100.00</b> <br>myMDLab   fee: <b>50.00</b></span>
                                                </div>
                                    
                                
                                                    <div class="form-group">
                                                     
                                                            <input type="text" class="form-control" placeholder="Enter Complete Home/Work address" id="address" name="address" required>
                                                    </div>

                                                     <div class="form-group">
                                                     
                                                            <input type="text" class="form-control" placeholder="Enter Patient Phone Number" id="phone" name="phone" required>
                                                    </div>
                                              
                                    
                                            
            
                                                            <button type="submit" class="btn btn-default">Book</button>
                                                        </form>
                                                    </div>
                                                </div>

                                                           
                                                 
           


            <div class="col-md-8 col-sm-12">

                <div class="white-box" style="border-radius: 15px;">
                  
                        <h3>Total Booking Requests: <span class="label label-success m-r-10">{{ $c_lcbook }}</span></h3>

                         <h5>
                            Pending: <span class="label label-inverse">{{ $c_pending }}</span> 
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
                                    <option value="PROCESSING">PROCESSING</option>  
                                    <option value="DELIVERED">DELIVERED</option>
                                    <option value="COMPLETED">COMPLETED</option>
                                   
                                
                                  </select>
                              </div>


                                  <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table table-hover manage-u-table order-table" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>No</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                                <th>Action</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>

                                           @if(count($sortedLCbook)>0)
                                                    @foreach($sortedLCbook as $lc_booking)
                                                        
                                                
                                                    <tr>
                                                        <td>{{ $lc_booking->id }}</td>
                                                        <td>{{ $lc_booking->request_no}}</td>
                                                     

                                                
                                                <td><span class="status">{{$lc_booking->status}}</span></td>
                                              
                                                <td><span class="pay">{{$lc_booking->payment}}</span></td>
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

                                                <td>
                                                    <button id="bookDetails" data-toggle="modal" data-target="#modal-view" data-id="{{$lc_booking->id}}" data-rno="{{$lc_booking->request_no}}" data-pname="{{$lc_booking->patient_name}}" data-padd="{{$lc_booking->patient_address}}" data-pno="{{$lc_booking->patient_phone}}" data-serv="{{$lc_booking->service}}" data-total="{{$lc_booking->totalfee}}" data-med="{{$lc_booking->medtech}}" data-stat="{{$lc_booking->status}}" data-pay="{{$lc_booking->payment}}" class="btn btn-default">View</button>

                                                            @if($lc_booking->status == 'PENDING')

                                                         
                                                             <button data-toggle="modal" data-target="#modal-confirm" data-id="{{$lc_booking->id}}" id="confirmButton" onclick="" class="btn btn-default">Confirm</button>

                                                           

                                                            @elseif($lc_booking->status == 'CONFIRMED') 


                                                            <a href='{{url("/process/{$lc_booking->id}")}}'><button class="btn btn-default">Process</button></a>

                                                        
                                                           
                                                            @elseif($lc_booking->status =='PROCESSING')

                                                             <button id="deliverButton" data-toggle="modal" data-target="#modal-deliver" data-id="{{ $lc_booking->id }}" data-payment="{{ $lc_booking->payment }}" data-no="{{ $lc_booking->request_no }}" data-total="{{ $lc_booking->totalfee }}" data-ass_medtech="{{ $lc_booking->medtech }}" data-patient="{{ $lc_booking->patient_name }}" class="btn btn-default">Deliver</button>

                                                             @elseif($lc_booking->payment == 'UNPAID' && $lc_booking->status == 'DELIVERED')
                                                             <button id="deliverButton" data-toggle="modal" data-target="#modal-deliver" data-id="{{ $lc_booking->id }}" data-payment="{{ $lc_booking->payment }}" data-no="{{ $lc_booking->request_no }}" data-total="{{ $lc_booking->totalfee }}" data-ass_medtech="{{ $lc_booking->medtech }}" data-patient="{{ $lc_booking->patient_name }}" class="btn btn-default">Deliver</button>

                                                             

                                                         

                                                            @elseif($lc_booking->payment == 'PAID' && $lc_booking->status == 'DELIVERED')
                                                             <a href='{{ url("/upload/{$lc_booking->id}") }}'><button id="uploadButton" class="btn btn-default">Upload</button></a>

                                                          

                                                        

                                                             @elseif($lc_booking->status == 'COMPLETED')
                                                            <a href='{{ url("/invoice/{$lc_booking->id}") }}'><button class="btn btn-default">Invoice</button></a>
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
           
            <div id="modal-deliver" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                         <div class="modal-header">
                                   
                                            <h4 class="modal-title">Lab Test Delivered</h4> </div>
                                        <div class="modal-body">

                                                    <label class="control-label">Req. No.</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold" id="request_no" name="request_no" value="" disabled/>
                                                    <br>

                                                    <label class="control-label">Patient Name</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold" id="patient_name" name="patient_name" value="" disabled/>
                                                    <br>

                                                    <label class="control-label">Assigned Medtech:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold;" name="ass_medtech" id="ass_medtech" value="" disabled/>
                                                    <br>
                                                <label class="control-label">Total Fee:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold;" name="total" id="total" value="" disabled/>
                                                    <br>

                                                    <label class="control-label">Current Payment Status:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold;" name="payment" id="payment" value="" disabled/>
                                                    
                                        <hr>
                      
                                            <form method="POST" action='{{ url("/deliver") }}'>
                                            
                                            {{ csrf_field() }}
                                             <input type="hidden" id="id" name="id" value=""/>
                                                <div class="form-group">

                                                    <label for="recipient-name" class="control-label"> Update Payment Status:</label>
                                                    <select class="form-control" id="payment" name="payment">
                                                           
                                                       
                                                            <option value="UNPAID">UNPAID</option>
                                                            <option value="PAID">PAID</option>
                                                       
                                                    <
                                                    </select>
                                                </div>


                                             <div class="modal-footer">
                                            <a href="{{url('/deliverunpaid')}}"><button class="btn btn-default waves-effect">Delivered but Not Paid</button></a>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Delivered and Paid</button>
                                            </div>

                                            </form>

                                   
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>




<div id="modal-confirm" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                         
                                      <form action="{{url('/confirm')}}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <input type="hidden" id="id" name="id" value=""/>
                                             <h4 class="modal-title" id="mySmallModalLabel">Confirm Booking?</h4>


                                           

                                           

                                           
                                        </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-inverse waves-effect waves-light">Confirm</button>
                                        </div>
                                    </form>
                                    </div>


                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>



<div id="modal-view" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                         <div class="modal-header">
                                          
                                            <h4 class="modal-title">Booking Details</h4> </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="id" name="id" value="" disabled/>
                                           
                                             <label class="control-label">Request #:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold" id="request_no" name="request_no" value="" disabled/>
                                                    <br>
                                               

                                                    <label class="control-label">Patient Name:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold" id="patient_name" name="patient_name" value="" disabled/>
                                                    <br>
                                            
                                                    <label class="control-label">Patient Address:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold;" name="patient_address" id="patient_address" value="" disabled/>
                                                    <br>

                                                     <label class="control-label">Patient Phone:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold;" name="patient_phone" id="patient_phone" value="" disabled/>
                                                    <br>

                                                    <label class="control-label">Service Availed:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold;" name="service" id="service" value="" disabled/>
                                                    <br>
                                              
                                                    <label class="control-label">Total Fee:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold;" name="total" id="total" value="" disabled/>
                                                    <br>

                                            
                                                    <label class="control-label">Medtech Assigned:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold;" name="medtech" id="medtech" value="" disabled/>
                                                    <br>

                                                     <label class="control-label">Status:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold;" name="status" id="status" value="" disabled/>
                                                    <br>

                                                     <label class="control-label">Payment Status:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold;" name="payment" id="payment" value="" disabled/>


                           
                                        </div>



                                             <div class="modal-footer">
                                           <button class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                           
                                            </div>

                                            </form>

                                   
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>

 