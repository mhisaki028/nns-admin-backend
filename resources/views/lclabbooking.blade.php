
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
                    <div class="white-box">
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
                                                <th>ID</th>
                                                <th>No</th>
                                                <th>Status</th>
                                                <th>Payment</th>
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
                                                @if(count($lc_bookings)>0)
                                                    @foreach($lc_bookings as $lc_booking)
                                                        
                                                
                                                    <tr>
                                                        <td>{{ $lc_booking->id }}</td>
                                                        <td>{{ $lc_booking->request_no}}</td>
                                                        <td> {{ $lc_booking->status }} </td>
                                                        <td> {{ $lc_booking->payment }}</td>
                                                        <td>
                                                            <a href='{{ url("/sendNotification/{$fcm_users->Token}/{$message}") }}' class="btn btn-default btn-outline m-r-5"><i class="ti-search text-inverse m-r-5"></i>View</a>

    
                                                            <a href='{{ url("/deleteLCBook/{$lc_booking->id}") }}'' class="btn btn-default btn-outline m-r-5"><i class="icon-trash text-danger m-r-5"></i>Delete</a>

                                                            @if($lc_booking->status == 'PENDING')

                                                         
                                                             <a href='{{ url("/confirm/{$lc_booking->id}") }}''><button id="confirmButton" onclick="" class="btn btn-success m-r-5">Confirm</button></a>

                                                           

                                                            @elseif($lc_booking->status == 'CONFIRMED') 


                                                            <button id="processButton" data-toggle="modal" data-target="#modal-process" data-id="{{ $lc_booking->id }}" data-time="{{ $lc_booking->time }}" data-no="{{ $lc_booking->request_no }}" data-patient="{{ $lc_booking->patient_name }}" class="btn btn-warning m-r-5">Process</button>

                                                        
                                                           
                                                            @elseif($lc_booking->status =='PROCESSING')

                                                             <button id="deliverButton" data-toggle="modal" data-target="#modal-deliver" data-id="{{ $lc_booking->id }}" data-payment="{{ $lc_booking->payment }}" data-no="{{ $lc_booking->request_no }}" data-total="{{ $lc_booking->totalfee }}" data-ass_medtech="{{ $lc_booking->medtech }}" data-patient="{{ $lc_booking->patient_name }}" class="btn btn-info m-r-5">Deliver</button>
                                                             

                                                         

                                                            @elseif($lc_booking->status == 'DELIVERED')

                                                            <label id="selectfile" class="btn btn-default btn-outline m-r-5">
                                                                Lab Test Result
                                                            <input type="file" onchange="showButton(event)" class="upload-group" id="file" style="width: 0.1px;height: 0.1px;position: absolute;z-index: -1">
                                                            </label>
                                                            <button type="button" onclick="uploadFile(event)" class="btn btn-success m-r-5">Upload Result</button>

                                                            @endif
                                                            

                                                        </td>


                                                    </tr>

                                                      <script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>

                                                <script>
                                                    //Initialize Firebase
                                                    var config = {
                                                        apiKey: "AIzaSyD2eTvpZDkoytuO7lrIF5VvwfWjalbCRTc",
                                                        authDomain: "androidpatientapp.firebaseapp.com",
                                                        databaseURL: "https://androidpatientapp.firebaseio.com",
                                                
                                                        storageBucket: "androidpatientapp.appspot.com",

                                                    };
                                                    firebase.initializeApp(config);

                                            

                                                    function showButton(){
                                                        $("#uploadButton").show();
                                                        $("#selectfile").hide();
                                                        selectedFile = event.target.files[0];
                                                        
                                                    }

                                                    function uploadFile(){
                                                        var filename = selectedFile.name;
                                                        var storageRef = firebase.storage().ref('/labtest_results/' + filename);
                                                        var uploadTask = storageRef.put(selectedFile);
                                                        
                                                        uploadTask.on('state_changed', function(snapshot){

                                                        }, function (error){

                                                        }, function(){
                                                            var resultKey = firebase.database().ref('Results/').push().key;
                                                              var downloadURL = uploadTask.snapshot.downloadURL;
                                                              var updates = {};
                                                              var resultData = {
                                                                url:downloadURL
                                                              };
                                                              updates['/Results/'+resultKey] = resultData;
                                                              firebase.database().ref().update(updates);
                                                                   
                                                        }); 

                                                     



                                                    }



  
                                                    
                                                </script>
                                                        
                                                        
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
           
            <div id="modal-deliver" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                         <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
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
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Delivered but Not Paid</button>
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Delivered and Paid</button>
                                            </div>

                                            </form>

                                   
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>

 <div id="modal-process" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                            <h4 class="modal-title">For Processing</h4> </div>
                                        <div class="modal-body">

                                                    
                                                 <label class="control-label">Req. No.</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold"id="request_no" name="request_no" value="" disabled/>
                                                    <br>

                                                    <label class="control-label">Patient Name</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold"id="patient_name" name="patient_name" value="" disabled/>
                                                    <br>
                                                <label class="control-label">Scheduled Time:</label>
                                                    <input style="border: none;background-color: #FFF;font-weight: bold"name="time" id="time" value="" disabled/>
                                        <hr>
                      
                                            <form method="POST" action='{{ url("/assignMedtech") }}'>
                                            
                                            {{ csrf_field() }}
                                             <input type="hidden" id="id" name="id" value=""/>
                                                <div class="form-group">
                                                     <h4 class="modal-title">

                                                    
                                                    <label for="recipient-name" class="control-label">Choose Medtech:</label>
                                                    <input style="border-radius: 5px; padding-left: 10px " name="chosen_medtech" id="chosen_medtech" placeholder="Enter Medtech Name"/>
                                                </h4>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                    @if($lc_booking->time = "8:00 - 9:00")
                                                    <h4><span class="label label-info label-rouded">8:00 - 9:00 AM</span></h4>
                                                   <select class="form-control" id="medtech" name="medtech">
                                                           
                                                        @foreach($medtechs_eight->all() as $medtech_eight)
                                                            <option value="{{ $medtech_eight->medtech_id}}">{{ $medtech_eight->medtech_name }} {{ $medtech_eight->assignment }}</option>
                                                         @endforeach
                                                    <
                                                    </select>
                                                   @endif
                                               </div>
                                                    <div class="col-md-6">
                                                   <h4><span class="label label-info label-rouded">1:00 - 2:00 PM</span></h4>
                                                     @if($lc_booking->time = "1:00 - 2:00")
                                                    <select class="form-control" id="medtech" name="medtech">
                                                          
                                                        @foreach($medtechs_one->all() as $medtech_one)
                                                            <option value="{{ $medtech_one->medtech_id}}">{{ $medtech_one->medtech_name }} {{ $medtech_one->assignment }}</option>
                                                         @endforeach
                                                     
                                                    </select>
                                                    @endif
                                                </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                    <h4><span class="label label-info label-rouded">9:00 - 10:00 AM</span></h4>
                                                    @if($lc_booking->time = "9:00 - 10:00")  
                                                    <select class="form-control" id="medtech" name="medtech">

                                                        
                                                        @foreach($medtechs_nine->all() as $medtech_nine)
                                                            <option value="{{ $medtech_nine->medtech_id}}">{{ $medtech_nine->medtech_name }} {{ $medtech_nine->assignment }}</option>
                                                         @endforeach
                                                   
                                                    </select>
                                                     @endif
                                                 </div>
                                                    <div class="col-md-6">
                                                      <h4><span class="label label-info label-rouded">2:00 - 3:00 PM</span></h4>
                                                    @if($lc_booking->time = "2:00 - 3:00")  
                                                    <select class="form-control" id="medtech" name="medtech">
                                                         
                                                        @foreach($medtechs_two->all() as $medtech_two)
                                                            <option value="{{ $medtech_two->medtech_id}}">{{ $medtech_two->medtech_name }} {{ $medtech_two->assignment }}</option>
                                                         @endforeach
                                                   
                                                    </select>
                                                    @endif
                                                </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                      <h4><span class="label label-info label-rouded">10:00 - 11:00 AM</span></h4>
                                                       @if($lc_booking->time = "10:00 - 11:00")  
                                                    <select class="form-control" id="medtech" name="medtech">
                                                       
                                                        @foreach($medtechs_ten->all() as $medtech_ten)
                                                            <option value="{{ $medtech_ten->medtech_id}}">{{ $medtech_ten->medtech_name }} {{ $medtech_ten->assignment}}
                                                         </option>
                                                         @endforeach
                                                   
                                                    </select>
                                                    @endif
                                                </div>
                                                    <div class="col-md-6">
                                                     <h4><span class="label label-info label-rouded">3:00 - 4:00 PM</span></h4>
                                                      @if($lc_booking->time = "3:00 - 4:00") 
                                                    <select class="form-control" id="medtech" name="medtech">
                                                         
                                                        @foreach($medtechs_three->all() as $medtech_three)
                                                            <option value="{{ $medtech_three->medtech_id}}">{{ $medtech_three->medtech_name }} {{ $medtech_three->assignment }}</option>
                                                         @endforeach
                                                   
                                                    </select>
                                                     @endif
                                                 </div>
                                                 </div>

                                                 <div class="row">
                                                    <div class="col-md-6">
                                                     <h4><span class="label label-info label-rouded">11:00 - 12:00 AM</span></h4>
                                                      @if($lc_booking->time = "11:00 - 12:00") 
                                                    <select class="form-control" id="medtech" name="medtech">
                                                         
                                                        @foreach($medtechs_eleven->all() as $medtech_eleven)
                                                            <option value="{{ $medtech_eleven->medtech_id}}">{{ $medtech_eleven->medtech_name }} {{ $medtech_eleven->assignment }}</option>
                                                         @endforeach
                                                   
                                                    </select>
                                                   @endif
                                               </div>
                                                    </div>



                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning waves-effect waves-light">Assign Medtech</button>
                                            </div>

                                                     
                                              
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div> 

