<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="/admin/public/plugins/images/mdlablogo.png">
    <title>myMDLab</title>
    <!-- Bootstrap Core CSS -->
    <link href="/admin/public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="/admin/public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
     <!-- Calendar CSS -->
    <link href="/admin/public/plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <link href="/admin/public/plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />

    <link href="/admin/public/plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <!-- animation CSS -->
    <link href="/admin/public/css/animate.css" rel="stylesheet">

  <link href="/admin/public/plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />


    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
      <!--alerts CSS -->
    <link href="/admin/public/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Footable CSS -->
    <link href="/admin/public/plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
    <link href="/admin/public/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />

    <link href="/admin/public/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- color CSS -->
    <link href="/admin/public/css/colors/green-light.css" id="theme" rel="stylesheet">

</head>
 
    <body style="font-family: Ubuntu">

<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper" style="font-size: 14px;">
    <div class="container-fluid">
      
                    <div class="white-box" style="background-color: #FFFFFF;box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);margin-left: 400px;margin-right: 400px; margin-top: 100px;border-radius: 20px;padding: 20px">
                      <input type="hidden" id="service" name="service" value="{{$lc_bookings->service}}"/>
                      <input type="hidden" id="lab" name="lab" value="{{$lc_bookings->lab}}"/>

                                <center>
                                    <h2>Upload Lab Test Result</h2>
                                    <br>
                                    <h4>Request No: <span class="label label-success">{{$lc_bookings->request_no}}</span></h4>

                                    <h4>Patient Name: <span class="label label-success">{{$lc_bookings->patient_name}}</span></h4>
                                    <br>
                                                           
                                                            <label id="selectfile" class="btn btn-default btn-outline m-r-5">
                                                                Get Lab Test Result
                                                            <input type="file" onchange="showButton(event)" class="upload-group" id="file" style="width: 0.1px;height: 0.1px;position: absolute;z-index: -1">
                                                            </label>
                                                            <button type="button" onclick="uploadFile(event)" class="btn btn-success m-r-5">Upload Result</button>

                                                            <br><br><br>

                                                            <a href='{{ url("/complete/{$lc_bookings->id}")}}'><button type="button" class="btn btn-success">Finish</button></a>


                                         <p type="button" class="btn btn-default"><a href="{{ url('/lclabbooking')}}" class="text-success">Back</a></p>
                                </center>
                                            

                                                    
                                                     
                                                      <script src="https://www.gstatic.com/firebasejs/live/3.0/firebase.js"></script>

                                                <script>

                                                  var config = {
                                                    apiKey: "AIzaSyD2eTvpZDkoytuO7lrIF5VvwfWjalbCRTc",
                                                    authDomain: "androidpatientapp.firebaseapp.com",
                                                    databaseURL: "https://androidpatientapp.firebaseio.com",
                                                    projectId: "androidpatientapp",
                                                    storageBucket: "androidpatientapp.appspot.com",
                                                    messagingSenderId: "232015587990"
                                                  };

                                                  



                                                   firebase.initializeApp(config);
                                            

                                                    function showButton(){
                                                        $("#uploadButton").show();
                                                      
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
                                                              var timestamp = new Date().toLocaleString();
                                                              var medlab = $("#lab").val();
                                                              var lab;
                                                              if(medlab == 1){
                                                                lab = 'LC Diagnostic Center';
                                                              }
                                                              else if(medlab == 1){
                                                                lab = 'MMG Plaza'
                                                              }
                                                              else if(medlab == 1){
                                                                lab = 'LUDACS';
                                                              }
                                                              var resultData = {
                                                                url:downloadURL,
                                                                service_name: $("#service").val(),
                                                                uploaded_by: lab,
                                                                uploaded_at: timestamp
                                                              };
                                                              updates['/Results/'+resultKey] = resultData;
                                                              firebase.database().ref().update(updates);


                                                        $("#uploadButton").hide();
                                                        }); 




                                                    }



  
                                                    
                                                </script>
                                            </div>



    <!-- jQuery -->
    <script src="/admin/public/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/admin/public/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="/admin/public/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
     <!--Counter js -->
    <script src="/admin/public/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="/admin/public/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="/admin/public/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/admin/public/js/waves.js"></script>
    
    <script src="/admin/public/js/custom.min.js"></script>
    
    <script src="/admin/public/plugins/bower_components/footable/js/footable.all.min.js"></script>
    <script src="/admin/public/plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
 

   


    
    <!--Style Switcher -->
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
                                        </div>
                                    </div>
                                                        
                         
                                                
           