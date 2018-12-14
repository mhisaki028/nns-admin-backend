 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/mdlablogo.png">
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
                      
                        <form class="form1" id="form-login" action="{{url('/assignMedtech')}}" method="POST">
                            {{ csrf_field() }}
                             <input type="hidden" id="id" name="id" value="{{$lc_bookings->id}}"/>

                                <center>
                                    <h2>Booking Request for Processing</h2>
                                    <br>
                                     <h3 style="text-align: center;">Choose Medtech for:</h3>
                                    <h4>Request No: <span class="label label-success">{{$lc_bookings->request_no}}</span></h4>

                                    <h4>Patient Name: <span class="label label-success">{{$lc_bookings->patient_name}}</span></h4>
                                    <br>
                                    
                                     <select class="form-control" id="chosen_medtech" name="chosen_medtech" style="display: block;margin-left: auto;margin-right: auto;border-width: 1px;border-radius: 10px;height: 30px;width: 200px; text-align: center;">
        @if($lc_bookings->time == '8:00 - 9:00')
            @foreach($medtechs_eight as $eight)
                    <option value="{{$eight->medtech_name}}">{{$eight->medtech_name}} {{$eight->medtech_name}} </option>
            @endforeach

        @elseif($lc_bookings->time == '9:00 - 10:00')
             @foreach($medtechs_nine as $nine)
                        <option value="{{$nine->medtech_name}}">{{$nine->medtech_name}} {{$nine->medtech_name}}</option>
             @endforeach

        @elseif($lc_bookings->time == '10:00 - 11:00')
             @foreach($medtechs_ten as $ten)
                        <option value="{{$ten->medtech_name}}">{{$ten->medtech_name}} {{$ten->assignment}}</option>
             @endforeach

        @elseif($lc_bookings->time == '11:00 - 12:00')
             @foreach($medtechs_eleven as $eleven)
                        <option value="{{$eleven->medtech_name}}">{{$eleven->medtech_name}} {{$eleven->assignment}}</option>
             @endforeach

        @elseif($lc_bookings->time == '1:00 - 2:00')
             @foreach($medtechs_one as $one)
                        <option value="{{$one->medtech_name}}">{{$one->medtech_name}} {{$one->assignment}}</option>
             @endforeach

        @elseif($lc_bookings->time == '2:00 - 3:00')
             @foreach($medtechs_two as $two)
                        <option value="{{$two->medtech_name}}">{{$two->medtech_name}} {{$two->assignment}}</option>
             @endforeach

        @elseif($lc_bookings->time == '3:00 - 4:00')
             @foreach($medtechs_three as $three)
                        <option value="{{$three->medtech_name}}">{{$three->medtech_name}} {{$three->assignment}}</option>
             @endforeach

        @endif   


      </select>
      <br><br>
  


      <button type="submit" class="btn btn-success">Assign Medtech</button>            


        <p type="button" class="btn btn-default"><a href="{{ url('/lclabbooking')}}" class="text-success">Back</a></p>
                                </center>
                            </form>
                                            

                                             
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
    <script src="https://www.gstatic.com/firebasejs/4.10.0/firebase.js"></script>
                                        </div>
                                    </div>
                                                        
                         
                                                
           


      </select>
  


     </body>