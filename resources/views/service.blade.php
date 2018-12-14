
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
                            <li><a href="javascript:void(0)">Lab Services</a></li>
                            <li class="active">myMDLab</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box" style="border-radius: 15px;">
                            <h1>Lab Services </h1> 
                           
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        <div class="white-box" style="border-radius: 15px;">
                
                           <h3>Total Available Services: <span class="label label-success m-r-10">{{ $c_service }}</span></h3>
                            <div class="text-right">
                           
                            <input type="text" placeholder="Search..." class="light-table-filter" data-table="order-table" style="border-width: 1px;border-radius: 10px; padding-left: 10px; height: 30px;">
                           
                              </div>

                                  <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table table-hover manage-u-table order-table" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if(count($services)>0)
                                                @foreach($services as $service)
                                            <tr>
                                                <td>{{$service->service_id}}</td>
                                                <td>{{$service->service_name}}</td>
                                                <td>{{$service->service_desc}}</td>
                                                <td>{{$service->service_price}}</td>
                                             
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
                                                    <!-- /.modal-dialog -->
                                                </div>


                                                 <div id="modal-editS" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="exampleModalLabel1">Edit Service</h4> </div>
                                                            <div class="modal-body">
                
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="POST" action="{{ url('/editService') }}">

                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" id="service_id" name="service_id" />
                                            <label for="service_name">Service Name</label>
                                            <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Enter Service Name" required> </div>
                                    
                                        <div class="form-group">
                                            <label for="contact_no">Description</label>
                                            <input type="text" class="form-control" id="service_desc" name="service_desc" placeholder="Enter Service Description"> </div>

                                        <div class="form-group">
                                        <label for="contact_no">Price</label>
                                        <input type="text" class="form-control" id="service_price" name="service_price" placeholder="Enter Price"> </div>


                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                                        <button type="button" data-dismiss="modal" class="btn btn-inverse waves-effect waves-light">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                
                                                 </div>
                                                        </div>

                                            

                    



                        </div>
                    </div>
                </div>
               
            </div>
            <!-- /.container-fluid -->