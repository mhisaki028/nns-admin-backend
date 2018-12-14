<!DOCTYPE html>
<html lang="en">

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
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
     <!-- Calendar CSS -->
    <link href="plugins/bower_components/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <link href="plugins/bower_components/owl.carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />

    <link href="plugins/bower_components/owl.carousel/owl.theme.default.css" rel="stylesheet" type="text/css" />
    <!-- animation CSS -->
    <link href="css/animate.css" rel="stylesheet">

  <link href="plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />


    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
      <!--alerts CSS -->
    <link href="plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- Footable CSS -->
    <link href="plugins/bower_components/footable/css/footable.core.css" rel="stylesheet">
    <link href="plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />

    <link href="plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- color CSS -->
    <link href="css/colors/green-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->

</head>
 
    <body style="font-family: Ubuntu">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">

      
    <!-- Sweet-Alert  -->
    <script src="plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>

    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
     <!--Counter js -->
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    
    <script src="js/custom.min.js"></script>
    
    <!-- Footable -->
    <script src="plugins/bower_components/footable/js/footable.all.min.js"></script>
    <script src="plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!--FooTable init-->
    <script src="js/footable-init.js"></script>
        <!-- jQuery for carousel -->
    <script src="plugins/bower_components/owl.carousel/owl.carousel.min.js"></script>
    <script src="plugins/bower_components/owl.carousel/owl.custom.js"></script>

    <script src="plugins/bower_components/datatables/jquery.dataTables.min.js"></script>


   


    
    <!--Style Switcher -->
    <script src="plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.10.0/firebase.js"></script>
    



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
   var database = firebase.database();


/////////////////Medtech
  $(document).on('show.bs.modal','#modal-editM', function (event) {

      console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var mtid = button.data('mtid')
      var mtname = button.data('mtname')
      var mtno = button.data('mtno')
      var mtlab = button.data('mtlab');
      var mttime = button.data('mttime')

      var modal = $(this)
      modal.find('.modal-body #medtech_id').val(mtid)
      modal.find('.modal-body #medtech_name').val(mtname)
      modal.find('.modal-body #medtech_no').val(mtno)
      modal.find('.modal-body #lab_designation').val(mtlab);
      modal.find('.modal-body #time_avail').val(mttime)
});


    //LCMedtech
  $(document).on('show.bs.modal','#modal-editLCM', function (event) {

      console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var mtid = button.data('mtid')
      var mtname = button.data('mtname')
      var mtno = button.data('mtno')
      var mttime = button.data('mttime')

      var modal = $(this)
      modal.find('.modal-body #medtech_id').val(mtid)
      modal.find('.modal-body #medtech_name').val(mtname)
      modal.find('.modal-body #medtech_no').val(mtno)
      modal.find('.modal-body #time_avail').val(mttime)
});

  ///////////////////Lab
   $(document).on('show.bs.modal','#modal-editL', function (event) {

      console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var lid = button.data('lid')
      var lname = button.data('lname')
      var lemail = button.data('lemail')
      

      var modal = $(this)
      modal.find('.modal-body #id').val(lid)
      modal.find('.modal-body #name').val(lname)
      modal.find('.modal-body #email').val(lemail)
     
});

   /////////////Services
    $(document).on('show.bs.modal','#modal-editLCS', function (event) {

      console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var sid = button.data('sid')
      var sname = button.data('sname')
      var sdesc = button.data('sdesc')
      var sprice = button.data('sprice')
      

      var modal = $(this)
      modal.find('.modal-body #service_id').val(sid)
      modal.find('.modal-body #service_name').val(sname)
      modal.find('.modal-body #service_desc').val(sdesc)
      modal.find('.modal-body #service_price').val(sprice)
     
});

//////Booking
 $(document).on('show.bs.modal','#modal-process', function (event) {

      console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var time = button.data('time')
      var no = button.data('no')
      var patient = button.data('patient')
      

      var modal = $(this)
      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #time').val(time)
      modal.find('.modal-body #request_no').val(no)
      modal.find('.modal-body #patient_name').val(patient)
     
     
});

 $(document).on('show.bs.modal','#modal-deliver', function (event) {

      console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var payment = button.data('payment')
      var total = button.data('total')
      var ass_medtech = button.data('ass_medtech')
      var no = button.data('no')
      var patient = button.data('patient')
      

      var modal = $(this)
      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #payment').val(payment)
      modal.find('.modal-body #total').val(total)
      modal.find('.modal-body #ass_medtech').val(ass_medtech)
      modal.find('.modal-body #request_no').val(no)
      modal.find('.modal-body #patient_name').val(patient)
     
     
});

$(document).on('show.bs.modal','#modal-view', function (event) {

      console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var rno = button.data('rno')
      var pname = button.data('pname')
      var padd = button.data('padd')
      var pno = button.data('pno')
      var serv = button.data('serv')
      var total = button.data('total')
      var med = button.data('med')
      var stat = button.data('stat')
      var pay = button.data('pay')
      

      var modal = $(this)
      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #request_no').val(rno)
      modal.find('.modal-body #patient_name').val(pname)
      modal.find('.modal-body #patient_address').val(padd)
      modal.find('.modal-body #patient_phone').val(pno)
      modal.find('.modal-body #service').val(serv)
      modal.find('.modal-body #total').val(total)
      modal.find('.modal-body #medtech').val(med)
      modal.find('.modal-body #status').val(stat)
      modal.find('.modal-body #payment').val(pay)
     
     
});



  $(document).on('show.bs.modal','#modal-delete', function (event) {

      console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var mid = button.data('mid')
   

      var modal = $(this)
      modal.find('.modal-body #medtech_id').val(mid)
   
    
     
});

   $(document).on('show.bs.modal','#modal-deleteServ', function (event) {

      console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var sid = button.data('sid')
   

      var modal = $(this)
      modal.find('.modal-body #service_id').val(sid)
   
    
     
});

   $(document).on('show.bs.modal','#modal-confirm', function (event) {

      console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var id = button.data('id')
   

      var modal = $(this)
      modal.find('.modal-body #id').val(id)
   
    
     
});

   $(document).on('show.bs.modal','#modal-upload', function (event) {

      console.log('Modal Opened');
      var button = $(event.relatedTarget)
      var rno = button.data('rno')
      var sname = button.data('sname')
      var total = button.data('total')
   

      var modal = $(this)
      modal.find('.modal-body #request_no').val(rno)
      modal.find('.modal-body #service').val(sname)
      modal.find('.modal-body #totalfee').val(total)
   
    
     
});

    (function(document) {
    'use strict';

    var LightTableFilter = (function(Arr) {

        var _input;
    var _select;

        function _onInputEvent(e) {
            _input = e.target;
            var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
                Arr.forEach.call(table.tBodies, function(tbody) {
                    Arr.forEach.call(tbody.rows, _filter);
                });
            });
        }
    
        function _onSelectEvent(e) {
            _select = e.target;
            var tables = document.getElementsByClassName(_select.getAttribute('data-table'));
            Arr.forEach.call(tables, function(table) {
                Arr.forEach.call(table.tBodies, function(tbody) {
                    Arr.forEach.call(tbody.rows, _filterSelect);
                });
            });
        }

        function _filter(row) {
      
            var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
            row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';

        }
    
        function _filterSelect(row) {
     
            var text_select = row.textContent.toLowerCase(), val_select = _select.options[_select.selectedIndex].value.toLowerCase();
            row.style.display = text_select.indexOf(val_select) === -1 ? 'none' : 'table-row';

        }

        return {
            init: function() {
                var inputs = document.getElementsByClassName('light-table-filter');
                var selects = document.getElementsByClassName('select-table-filter');
                Arr.forEach.call(inputs, function(input) {
                    input.oninput = _onInputEvent;
                });
                Arr.forEach.call(selects, function(select) {
         select.onchange  = _onSelectEvent;
                });
            }
        };
    })(Array.prototype);

    document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
            LightTableFilter.init();
        }
    });

})(document);


   









 

 
  </script>




</body>

</html>
