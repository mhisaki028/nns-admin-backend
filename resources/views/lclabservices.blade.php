
@include('inc/main')
@include('inc/lcleftsidebar')
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
                      <div class="col-sm-4 col-sm 12">
                        <div class="white-box">
                            <form method="POST" action="{{ url('/addLCService') }}">
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

                                       
                                        
                                        
                                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Add Service</button>
                                        
                                    </form>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-12">
                        <div class="white-box">
                
                            <div class="table-responsive">
                                <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list color-table success-table" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                               
                                                <th>Price</th>
                                            
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
                                            @if(count($lc_services)>0)
                                                @foreach($lc_services->all() as $lc_service)


                                            
                                            <tr>
                                                <td>{{ $lc_service->service_id }}</td>
                                                <td> {{ $lc_service->service_name }}</td>
                                            
                                                <td> {{ $lc_service->service_price }}</td>
                                             
                                            
                                                <td>
                                                    <a class="btn btn-default btn-outline m-r-5"  
                                                    data-toggle="modal" data-target="#modal-editLCS"
                                                    data-sid="{{ $lc_service->service_id }}"
                                                    data-sname="{{ $lc_service->service_name }}"
                                                    data-sdesc="{{ $lc_service->service_desc }}"
                                                    data-sprice="{{ $lc_service->service_price }}"
                                                    ><i class="ti-pencil-alt text-warning m-r-5"></i>Edit</a>
                                                    
                    

                                                  <a href='{{ url("/deleteLCService/{$lc_service->service_id}") }}' class="btn btn-default btn-outline m-r-5"><i class="icon-trash text-danger m-r-5"></i>Delete</a>
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
                                     
                                               
                                                            
                                                           
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>


                                                 <div id="modal-editLCS" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="exampleModalLabel1">Edit Service</h4> </div>
                                                            <div class="modal-body">
                
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <form method="POST" action="{{ url('/editLCService') }}">

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