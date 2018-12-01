@if(count($bookings)>0)
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
            <div class="col-sm-4 col-sm-12">
                    <div class="white-box">
                         <form method="POST" action="{{ url('/addBooking') }}" class="no-bg-addmon">
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
                                                     <script>
                                                         // Date Picker
                                                        jQuery('.mydatepicker, #datepicker').datepicker();
                                                        jQuery('#datepicker-autoclose').datepicker({
                                                            autoclose: true,
                                                            todayHighlight: true
                                                        });
                                                        jQuery('#date-range').datepicker({
                                                            toggleActive: true
                                                        });
                                                        jQuery('#datepicker-inline').datepicker({
                                                            todayHighlight: true
                                                        });
                                                     </script>
                                                   
                                                            <input type="text" class="form-control" placeholder="Enter Date (dd/mm/yyyy)" id="date" name="date" required> 
                                                    </div>
                                                
                                    
                                                    <div class="form-group">
                                                    
                                                        
                                                            <select class="form-control"id="lab" name="lab">
                                                                @foreach($labs->all() as $lab)
                                                                <option value="{{ $lab->lab_id }}">{{ $lab->lab_name }}
                                                                </option>
                                                                @endforeach
                                                            </select> <span class="help-block"> Select your medical lab. </span> 
                                             
                                              
                                                   
                                               
                                                    <div class="form-group">
                                                    
                                                            <select class="form-control" onchange="selectFunction(event)" id="labtest" name="labtest">
                                                                @foreach($services->all() as $service)
                                                                <option data-typeid="{{ $service->service_price }}" value="{{ $service->service_name}}">{{ $service->service_name }}</option>
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
                                                            <span class="help-block">medtech fee: <b>100.00</b> <br>myMDLab   fee: <b>50.00</b></span> </div>
 
    

  
                                                    </div>
                                    
                                
                                                    <div class="form-group">
                                                     
                                                            <input type="text" class="form-control" placeholder="Enter Complete Home/Work address" id="address" name="address" required>
                                                    </div>
                                              
                                    
                                            
                                  
                                        
                                                            <button type="submit" class="btn btn-success">Book</button>
                                                           
                                                 
                                             
                                              
                            
                                       
                                    </form>

                    </div>
              </div>
       


            <div class="col-md-8 col-sm-12">
                <div class="white-box">
                  
                                    <div class="table-responsive">
                                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list color-table success-table" data-page-size="7">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Patient Name</th>
                                                <th>Total Fee</th>
                                                <th>Status</th>
                                        
                                                <th>Action</th>
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
                                                @if(count($bookings)>0)
                                                    @foreach($bookings as $booking)
                                                
                                                    <tr>
                                                        <td>{{ $booking->request_no}}</td>
                                                        <td>{{ $booking->patient_name }}</td>
                                                        <td>{{ $booking->totalfee }}</td>
                                                        <td> <span class="label label-warning label-rounded">{{ $booking->status }}</span> </td>
                                                        <td>
                                                            <a class="btn btn-default btn-outline m-r-5" data-toggle="modal" data-target="#modal-view"><i class="ti-search text-inverse m-r-5"></i>View</a>

        

                                                            <a href='{{ url("/deleteBook/{$booking->id}") }}'' class="btn btn-default btn-outline m-r-5"><i class="icon-trash text-danger m-r-5"></i>Delete</a>
                                                        
                                                        
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
                                    <!-- row -->
                            </div>
                        </div>
                
          
        </div>
        
                    </div>
                </div>                                            
           
            <div id="modal-view" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="row">
                    <div class="col-md-12">
                        <div class="white-box printableArea">
                            <h3><b>Invoice</b> <span class="pull-right">{{ $booking->request_no}}</span></h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">{{ $booking->patient_name }}</b></h3>
                                            <p class="text-muted m-l-5">{{ $booking->patient_address }}</p>
                                             <p class="m-t-30"><b>Date of Lab Test :</b> <i class="fa fa-calendar"></i>{{ $booking->date}}</p>
                                              <p class="m-t-30"><b>Time of Lab Test :</b> <i class="fa fa-calendar"></i>{{ $booking->time }}</p>
                                        </address>
                                    </div>
                                
                                </div>
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Description</th>
                                                    <th class="text-right">Quantity</th>
                                                    <th class="text-right">Unit Cost</th>
                                                    <th class="text-right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>Milk Powder</td>
                                                    <td class="text-right">2 </td>
                                                    <td class="text-right"> $24 </td>
                                                    <td class="text-right"> $48 </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>Air Conditioner</td>
                                                    <td class="text-right"> 3 </td>
                                                    <td class="text-right"> $500 </td>
                                                    <td class="text-right"> $1500 </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>RC Cars</td>
                                                    <td class="text-right"> 20 </td>
                                                    <td class="text-right"> %600 </td>
                                                    <td class="text-right"> $12000 </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td>Down Coat</td>
                                                    <td class="text-right"> 60 </td>
                                                    <td class="text-right">$5 </td>
                                                    <td class="text-right"> $300 </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <p>Sub - Total amount: $13,848</p>
                                        <p>vat (10%) : $138 </p>
                                        <hr>
                                        <h3><b>Total :</b> $13,986</h3> </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                        <button id="print" onclick="printFunc()" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

          
    
    
        @else

            @include('inc/main')
        
                    
                    <section id="wrapper" class="error-page">
                      <div class="error-box">
                        <div class="error-body text-center">
                          <h1 class="text-danger">Error</h1>
                          <h3 class="text-uppercase">No Booking Requests Found !</h3>
                          <p class="text-muted m-t-30 m-b-30">DO YOU WANT TO BOOK?</p>
                          <button type="button" data-toggle="modal" data-target="#modal-add" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">YES</a> </div>
                        
                      </div>
                    </section>       

                    <div id="modal-add" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="exampleModalLabel1">New Booking</h4> </div>
                                                            <div class="modal-body">
                
                          <div class="panel-body">
                                    <form method="POST" action="{{ url('/addBooking') }}" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Full Name</label>
                                                        <div class="col-md-9">
                                                            <input type="hidden" id="booking_id" name="booking_id" />
                                                    
                                                            <input type="text" class="form-control" placeholder="John doe" id="name" name="name" required> </div>
                                                    </div>
                                                </div>
                                            
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Time</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" id="time" name="time">
                                                                <option value="7:00">7:00</option>
                                                                <option value="8:00">8:00</option>
                                                                <option value="9:00">9:00</option>
                                                                <option value="10:00">10:00</option>
                                                                <option value="11:00">11:00</option>
                                                                <option value="12:00">12:00</option>
                                                            </select> <span class="help-block"> Pick your time. </span> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Medical Lab</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control"id="lab" name="lab">
                                                                @foreach($labs->all() as $lab)
                                                                <option value="{{ $lab->lab_id }}">{{ $lab->lab_name }}
                                                                </option>
                                                                @endforeach
                                                            </select> <span class="help-block"> Select your medical lab. </span> </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Date</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="date" name="date" required> </div>
                                                    </div>
                                                </div>

                                                <!--/span-->
                                            </div>
                                            <!--/row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Lab Test</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control" onchange="selectFunction(event)" id="labtest" name="labtest">
                                                                <option data-typeid="110" value="FBS">FBS</option>
                                                                <option data-typeid="100" value="Cholesterol">Cholesterol</option>
                                                                <option data-typeid="110" value="Potassium">Potassium</option>
                                                                <option data-typeid="90" value="Urinalysis">Urinalysis</option>
                                                            </select> <span class="help-block"> Select your Lab Test. </span> </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Total Fee</label>
                                                        <div class="col-md-9">

                                                            <input type="hidden" class="form-control" id="status" name="status" value=""/>
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

                                                            <input type="text" class="form-control" id="totalfee" name="totalfee"/>
                                                            <span class="help-block">medtech fee: <b>100.00</b> <br>myMDLab   fee: <b>50.00</b></span> </div>
 
    

  
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                
                                                <!--/span-->
                                            </div>
                                           
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label style="margin-left: 20px;">Complete Address</label>
                                                        <div class="col-md-12">
                                                            <input type="text" class="form-control" placeholder="Enter your home/work address" id="address" name="address" required> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                            <button type="button" class="btn btn-inverse" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> </div>
                                            </div>
                                       
                                    </form>


                        </div>
                    </div>
                </div>                                            
            </div>

            @endif
       
       


       

