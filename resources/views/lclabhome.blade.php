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
                    
                        <div class="white-box">
                            <h1>{{ $lc->lab_name }}</h1>
                            <h4>{{ $lc->lab_desc }}</h4> 
                            <h4 class="box-title">{{ $lc->lab_loc }}</h4>
                        </div>
                   
                </div>

            </div>

        
            <div class="row">
                
                       <div class="col-lg-3 col-sm-6 col-xs-12">
                                <div class="white-box analytics-info">
                            <h3 class="box-title">BOOKING REQUESTS</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-down text-warning"></i> <span class="text-warning">{{ $c_booking }}</span></li>
                            </ul>
                        </div>

                            </div>
                    

                    <div class="col-lg-3 col-sm-6 col-xs-12">
                                  <div class="white-box analytics-info">
                            <h3 class="box-title">PENDING REQUESTS</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-down text-danger"></i> <span class="counter text-danger">{{ $c_pending }}</span></li>
                            </ul>
                        </div>

                            </div>

                    
                    
                     <div class="col-lg-3 col-sm-6 col-xs-12">
                               <div class="white-box analytics-info">
                            <h3 class="box-title">COMPLETED REQUESTS</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{ $c_complete }}</span></li>
                            </ul>
                        </div>

                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                               <div class="white-box analytics-info">
                             <h3 class="box-title">LAB TOTAL EARNINGS</h3>
                            <ul class="list-inline two-part">
                                <li><i class="ti-money text-info"></i></li>
                                <li class="text-right text-info"><span class="counter"> {{ $display }}</span></li>
                            </ul>
                        </div>

                            </div>

            </div>

        
             <div class="row">

                 <div class="col-lg-6 col-sm-12 col-xs-12">
                        <div class="row">

                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">Daily Sales</h3>
                                         <div class="text-right"> <span class="text-muted">Todays Income</span>
                                    <h1><sup><i class="ti-arrow-up text-success"></i></sup> $12,000</h1> </div> <span class="text-success">20%</span>
                                     <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">20% Complete</span> </div>
                           
                            </div>
                        </div>

                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="white-box">
                                   <h3 class="box-title">Weekly Sales</h3>
                            <div class="text-right"> <span class="text-muted">Weekly Income</span>
                                <h1><sup><i class="ti-arrow-down text-danger"></i></sup> $5,000</h1> </div> <span class="text-danger">30%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> <span class="sr-only">230% Complete</span> </div>

                                </div>
                            </div>
                        </div>


                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="white-box">
                                    <h3 class="box-title">Monthly Sales</h3>
                            <div class="text-right"> <span class="text-muted">Monthly Income</span>
                                <h1><sup><i class="ti-arrow-up text-info"></i></sup> $10,000</h1> </div> <span class="text-info">60%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">20% Complete</span> </div>

                                </div>
                            </div>
                        </div>

                            <div class="col-lg-6 col-sm-6 col-xs-12">
                                <div class="white-box">
                                   <h3 class="box-title">Yearly Sales</h3>
                            <div class="text-right"> <span class="text-muted">Yearly Income</span>
                                <h1><sup><i class="ti-arrow-up text-inverse"></i></sup> $9,000</h1> </div> <span class="text-inverse">80%</span>
                            <div class="progress m-b-0">
                                <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:80%;"> <span class="sr-only">230% Complete</span> </div>

                                </div>
                            </div>
                        </div>
                        </div>
                    </div>


                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Reviews</h3>
                            <div class="comment-center p-t-10">
                                <div class="comment-body">
                                    <div class="user-img"> <img src="plugins/images/mdlablogo.png" alt="user" class="img-circle"></div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5><span class="time">10:20 AM   20  may 2016</span>
                                        <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> </div>
                                </div>
                                <div class="comment-body">
                                    <div class="user-img"> <img src="plugins/images/mdlablogo.png" alt="user" class="img-circle"> </div>
                                    <div class="mail-contnet">
                                        <h5>Sonu Nigam</h5><span class="time">10:20 AM   20  may 2016</span> 
                                        <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> </div>
                                </div>
                                <div class="comment-body b-none">
                                    <div class="user-img"> <img src="plugins/images/mdlablogo.png" alt="user" class="img-circle"> </div>
                                    <div class="mail-contnet">
                                        <h5>Arijit singh</h5><span class="time">10:20 AM   20  may 2016</span> 
                                        <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                 

        </div>

    </div>
</div>
    <!-- /.container-fluid -->
