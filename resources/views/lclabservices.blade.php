
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
                        <div class="white-box" style="border-radius: 15px;">
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

                                       
                                        
                                        
                                        <button type="submit" class="btn btn-default waves-effect waves-light m-r-10">Add Service</button>
                                        
                                    </form>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-12">
                        <div class="white-box" style="border-radius: 15px;">
                            <h3>Total Services: <span class="label label-success m-r-10">{{$c_service}}</span></h3>
                                <div class="text-right">
                           
                            <input type="text" placeholder="Search..." class="light-table-filter" data-table="order-table" style="border-width: 1px;border-radius: 10px; padding-left: 10px; height: 30px;">
                           
                              </div>

                                  <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table table-hover manage-u-table order-table" data-page-size="10">
                                        <thead>
                                            <tr>
                                               <th>ID</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                             @if(count($lc_services)>0)
                                                @foreach($lc_services as $lc_service)


                                            
                                            <tr>
                                                <td>{{ $lc_service->service_id }}</td>
                                                <td> {{ $lc_service->service_name }}</td>
                                            
                                                <td> {{ $lc_service->service_price }}</td>
                                             
                                            
                                                <td>

                                                     <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" data-toggle="modal" data-target="#modal-editLCS"
                                                    data-sid="{{ $lc_service->service_id }}"
                                                    data-sname="{{ $lc_service->service_name }}"
                                                    data-sdesc="{{ $lc_service->service_desc }}"
                                                    data-sprice="{{ $lc_service->service_price }}"><i class="ti-pencil-alt"></i></button>
                                                    
                                                    <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" data-toggle="modal" data-target="#modal-deleteServ" data-sid="{{$lc_service->service_id}}"><i class="ti-trash"></i></button>

                                
                                                    
        
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


                                               

                                            

                    



                        </div>
                    </div>
                </div>
               
            </div>
            <!-- /.container-fluid -->
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

<div id="modal-deleteServ" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                         
                                      <form action='{{url("/deleteLCService")}}' method="POST">
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                            <input type="hidden" id="service_id" name="service_id" value=""/>
                                            <h4 class="modal-title" id="mySmallModalLabel">Are you sure you want to delete this record?</h4>

                                           
                                        </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger waves-effect waves-light">Yes</button>
                                        </div>
                                    </form>
                                    </div>


                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>