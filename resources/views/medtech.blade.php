
@include('inc/main')
@include('inc/leftsidebar')
@include('inc/rightsidebar')
@include('inc/footer')


   <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper" style="font-size: 14px">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                         <h4 class="page-title">
                                    <span href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></span>
                            </h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="javascript:void(0)">MedTechs</a></li>
                            <li class="active">myMDLab</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                 <div class="row">
                    <div class="col-md-12">
                        <div class="white-box" style="border-radius: 15px;">
                            <h1>Medical Technologists </h1> 
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box" style="border-radius: 15px;">
                            <h3>Total Medtechs: <span class="label label-success m-r-10">{{ $c_medtech }}</span></h3>
                            <h3>Lab Designation</h3>
                              <h5>
                            <span class="label label-danger">1</span> LC Diagnostic Center
                            <span class="label label-success">2</span> Quezon MMG Plaza
                            <span class="label label-info">3</span> LUDACS
                        
                            </h5>
                                <div class="text-right">
                           
                            <input type="text" placeholder="Search..." class="light-table-filter" data-table="order-table" style="border-width: 1px;border-radius: 10px; padding-left: 10px; height: 30px;">
                            <select type="search" class="select-table-filter" data-table="order-table" style="border-width: 1px;border-radius: 10px; padding-left: 10px; height: 30px;">
                                    <option value="">All</option> 
                                    <option value="1">LC Diagnostic Center</option> 
                                    <option value="2">MMG Plaza</option>  
                                    <option value="3">LUDACS</option>
                                   
                                
                                  </select>
                              </div>

                                  <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table table-hover manage-u-table order-table" data-page-size="10">
                                        <thead>
                                            <tr>
                                            
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Assignment</th>
                                                <th>Status</th>
                                                <th>Time Available</th>
                                                <th>Lab Designation</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if(count($medtechs)>0)
                                                @foreach($medtechs->all() as $medtech)
                                            <tr>
                                        
                                                <td>{{$medtech->medtech_name}}</td>
                                                <td>{{$medtech->medtech_no}}</td>
                                                <td>{{$medtech->assignment}}</td>
                                                <td></td>
                                                <td>{{$medtech->time_avail}}</td>
                                                <td>{{$medtech->lab_designation}}</td>
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
    </div>
               
 </div>
     
