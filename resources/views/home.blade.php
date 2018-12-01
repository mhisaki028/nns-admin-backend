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
           
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">PATIENTS</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-people text-info"></i></li>
                                <li class="text-right"><span class="counter">{{ $c_patient }}</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">MEDICAL LABS</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-home text-inverse"></i></li>
                                <li class="text-right"><span class="counter">{{ $c_lab }}</span></li>
                            </ul>
                        </div>
                    </div>

                    
                    
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">MEDTECHS</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-user-female text-purple"></i></li>
                                <li class="text-right"><span class="counter">{{ $c_medtech }}</span></li>
                            </ul>
                        </div>
                    </div>

                     <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">SERVICES</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-chemistry text-purple"></i></li>
                                <li class="text-right"><span class="counter">{{ $c_service }}</span></li>
                            </ul>
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
                                <li class="text-right"><i class="ti-arrow-down text-danger"></i> <span class="text-danger">{{ $c_booking }}</span></li>
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
                                <li class="text-right"><i class="ti-arrow-up text-warning"></i> <span class="counter text-warning">659</span></li>
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
                                <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-info">869</span></li>
                            </ul>
                        </div>

                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                               <div class="white-box analytics-info">
                             <h3 class="box-title">myMDLab WALLET</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-wallet text-info"></i></li>
                                <li class="text-right text-success"><span class="counter">{{ $display_wallet }}</span></li>
                            </ul>
                        </div>

                            </div>

            </div>

        
             <div class="row">

                 <div class="col-md-12 col-lg-6">
                        <div class="white-box bg-theme-alt m-b-0">
                            <h3 class="box-title text-white">TOTAL EARNINGS</h3>
                            <div class="demo-container" style="height:140px;">
                                <div id="placeholder" class="demo-placeholder"></div>
                            </div>
                        </div>
                        <div class="white-box p-b-0">
                            <div class="row">
                                <div class="col-xs-8">
                                    <h2 class="font-medium m-t-0">Php {{ $display }}</h2>
                                    <h5 class="text-muted m-t-0"></h5>
                                </div>
                                <div class="col-xs-4">
                                    <div class="circle-md pull-right circle bg-danger"><i class="ti-shopping-cart"></i></div>
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

                 

                 <div class="row">
                   
                    
                    <!-- col-md-3 -->

            
                   
                   
                </div>

                
                    </div>
                    
                <!-- /.row -->

                





            </div>
        </div>

    </div>
</div>
    <!-- /.container-fluid -->

 <!-- Flot Charts JavaScript -->
    <script src="plugins/bower_components/flot/jquery.flot.js"></script>
    <script src="plugins/bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
