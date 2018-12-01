@include('inc/main')
@include('inc/mmgleftsidebar')
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

                <!-- ============================================================== -->
                <!-- Other sales widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
            
                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <h1>{{ $mmg->lab_name }}</h1>
                            <h4>{{ $mmg->lab_desc }}</h4> 
                            <h4 class="box-title">{{ $mmg->lab_loc }}</h4>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">BOOKING REQUEST</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-bubble text-success"></i></li>
                                <li class="text-right"><span class=""></span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">TOTAL EARNINGS</h3>
                            <ul class="list-inline two-part">
                                <li><i class="fa fa-dollar text-success"></i></li>
                                <li class="text-right"><span class=""></span></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">MEDTECHS</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-user-female text-success"></i></li>
                                <li class="text-right"><span class="counter"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">LAB SERVICES</h3>
                            <ul class="list-inline two-part">
                                <li><i class="icon-chemistry text-success"></i></li>
                                <li class="text-right"><span class=""></span></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <!-- /.row -->


            </div>
        </div>

    </div>
</div>
    <!-- /.container-fluid -->
